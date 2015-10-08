<?php
/**
 * EmailQueueFixture
 *
 */
class EmailQueueFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'email_queue';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'ascii_general_ci', 'charset' => 'ascii'),
		'to_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'to_email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'subject' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'config' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'template' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'layout' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'format' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'template_vars' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sent' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'sent_content' => array('type' => 'text', 'default' => null),
		'locked' => array('type' => 'boolean', 'null' => false, 'default' => 0),
		'send_tries' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'send_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 'email-1',
			'to_email' => 'example@example.com',
			'to_name' => 'Jon Doe',
			'subject' => 'Free dealz',
			'config' => 'default',
			'template' => 'default',
			'layout' => 'default',
			'format' => 'both',
			'template_vars' => '{"a":1,"b":2}',
			'sent' => 0,
			'sent_content' => NULL,
			'locked' => 0,
			'send_tries' => 1,
			'send_at' => '2011-06-20 13:50:48',
			'created' => '2011-06-20 13:50:48',
			'modified' => '2011-06-20 13:50:48'
		),
		array(
			'id' => 'email-2',
			'to_email' => 'example2@example.com',
			'to_name' => 'Jon Doe',
			'subject' => 'Free dealz',
			'config' => 'default',
			'template' => 'default',
			'layout' => 'default',
			'format' => 'both',
			'template_vars' => '{"a":1,"b":2}',
			'sent' => 0,
			'sent_content' => NULL,
			'locked' => 0,
			'send_tries' => 2,
			'send_at' => '2011-06-20 13:50:48',
			'created' => '2011-06-20 13:50:48',
			'modified' => '2011-06-20 13:50:48'
		),
		array(
			'id' => 'email-3',
			'to_email' => 'example3@example.com',
			'to_name' => 'Jon Doe',
			'subject' => 'Free dealz',
			'config' => 'default',
			'template' => 'default',
			'layout' => 'default',
			'format' => 'both',
			'template_vars' => '{"a":1,"b":2}',
			'sent' => 0,
			'sent_content' => NULL,
			'locked' => 0,
			'send_tries' => 3,
			'send_at' => '2011-06-20 13:50:48',
			'created' => '2011-06-20 13:50:48',
			'modified' => '2011-06-20 13:50:48'
		),
		array(
			'id' => 'email-4',
			'to_email' => 'example@example.com',
			'to_name' => 'Jon Doe',
			'subject' => 'Free dealz',
			'config' => 'default',
			'template' => 'default',
			'layout' => 'default',
			'format' => 'both',
			'template_vars' => '{"a":1,"b":2}',
			'sent' => 1,
			'sent_content' => 'From: someone@example.com Message: This is a test message.',
			'locked' => 0,
			'send_tries' => 0,
			'send_at' => '2011-06-20 13:50:48',
			'created' => '2011-06-20 13:50:48',
			'modified' => '2011-06-20 13:50:48'
		),
		array(
			'id' => 'email-5',
			'to_email' => 'example@example.com',
			'to_name' => 'Jon Doe',
			'subject' => 'Free dealz',
			'config' => 'default',
			'template' => 'default',
			'layout' => 'default',
			'format' => 'both',
			'template_vars' => '{"a":1,"b":2}',
			'sent' => 0,
			'sent_content' => NULL,
			'locked' => 1,
			'send_tries' => 0,
			'send_at' => '2011-06-20 13:50:48',
			'created' => '2011-06-20 13:50:48',
			'modified' => '2011-06-20 13:50:48'
		),
		array(
			'id' => 'email-6',
			'to_email' => 'example@example.com',
			'to_name' => 'Jon Doe',
			'subject' => 'Free dealz',
			'config' => 'default',
			'template' => 'default',
			'layout' => 'default',
			'format' => 'both',
			'template_vars' => '{"a":1,"b":2}',
			'sent' => 0,
			'sent_content' => NULL,
			'locked' => 0,
			'send_tries' => 0,
			'send_at' => '2020-06-20 13:50:48',
			'created' => '2011-06-20 13:50:48',
			'modified' => '2011-06-20 13:50:48'
		),
	);

}
