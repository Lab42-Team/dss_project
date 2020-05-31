<?php

use yii\db\Migration;

/**
 * Class m200530_113721_criteria
 */
class m200530_113721_criteria extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%criteria}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'task_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx_criteria_name', '{{%criteria}}', 'name');

        $this->addForeignKey("criteria_task_fk", "{{%criteria}}", "task_id",
            "{{%task}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%criteria}}');
    }
}