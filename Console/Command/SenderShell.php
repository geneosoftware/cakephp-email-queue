<?php

App::uses('Shell', 'Console');

class SenderShell extends Shell {

	public function getOptionParser() {
		$parser = parent::getOptionParser();
		$parser
			->description('Sends queued emails in a batch')
			->addOption('limit', array(
				'short' => 'l',
				'help' => 'How many emails should be sent in this batch?',
				'default' => 50
			))
			->addOption('template', array(
				'short' => 't',
				'help' => 'Name of the template to be used to render email',
				'default' => 'default'
			))
			->addOption('layout', array(
				'short' => 'w',
				'help' => 'Name of the layout to be used to wrap template',
				'default' => 'default'
			))
			->addSubCommand('clearLocks', array(
				'help' => 'Clears all locked emails in the queue, useful for recovering from crashes'
			));
		return $parser;
	}

/**
 * Sends queued emails
 *
 * @access public
 */
	public function main() {
		Configure::write('App.baseUrl', '/');
		$emailQueue = ClassRegistry::init('EmailQueue.EmailQueue');

		$emails = $emailQueue->getBatch($this->params['limit']);
		foreach ($emails as $e) {
			$configName = $e['EmailQueue']['config'] === 'default' ? $this->params['config'] : $e['EmailQueue']['config'];
			$template = $e['EmailQueue']['template'] === 'default' ? $this->params['template'] : $e['EmailQueue']['template'];
			$layout = $e['EmailQueue']['layout'] === 'default' ? $this->params['layout'] : $e['EmailQueue']['layout'];

			try {
				$email = new CakeEmail($configName);
				$sent = $email
					->to($e['EmailQueue']['to'])
					->template($template, $layout)
					->viewVars($e['EmailQueue']['template_vars'])
					->send();
			} catch (SocketException $e) {
				$this->err($e->getMessage());
				$sent = false;
			}


			if ($sent) {
				$emailQueue->success($e['EmailQueue']['id']);
				$this->out('<sucess>Email ' . $e['EmailQueue']['id'] . ' was sent</sucess>');
			} else {
				$emailQueue->fail($e['EmailQueue']['id']);
				$this->out('<error>Email ' . $e['EmailQueue']['id'] . ' was not sent</error>');
			}

		}
		$emailQueue->releaseLocks(Set::extract('{n}.EmailQueue.id', $emails));
	}

/**
 * Clears all locked emails in the queue, useful for recovering from crashes
 *
 * @return void
 **/
	public function clearLocks() {
		 ClassRegistry::init('EmailQueue.EmailQueue')->clearLocks();
	}

}
