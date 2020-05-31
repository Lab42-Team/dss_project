<?php

use yii\db\Migration;

/**
 * Class m200530_115744_decision
 */
class m200530_115744_decision extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%decision}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'task_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("decision_task_fk", "{{%decision}}", "task_id",
            "{{%task}}", "id", 'CASCADE');
        $this->addForeignKey("decision_user_fk", "{{%decision}}", "user_id",
            "{{%user}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%decision}}');
    }
}