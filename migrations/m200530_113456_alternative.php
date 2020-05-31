<?php

use yii\db\Migration;

/**
 * Class m200530_113456_alternative
 */
class m200530_113456_alternative extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%alternative}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'task_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx_alternative_name', '{{%alternative}}', 'name');

        $this->addForeignKey("alternative_task_fk", "{{%alternative}}", "task_id",
            "{{%task}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%alternative}}');
    }
}