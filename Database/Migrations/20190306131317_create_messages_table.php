<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Database\Migrations;

class Migration_create_messages_table extends \BasicApp\Core\Migration
{

	public $tableName = 'messages';

	public function up()
	{
		$this->forge->addField([
			'message_id' => $this->primaryColumn(),
			'message_uid' => $this->stringColumn([
				'unique' => true
			]),
			'message_is_html' => $this->boolColumn(),
			'message_enabled' => $this->boolColumn(),			
			'message_subject' => $this->stringColumn(),
			'message_body' => $this->textColumn()
		]);

		$this->forge->addKey('message_id', true);

		$this->forge->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName);
	}

}