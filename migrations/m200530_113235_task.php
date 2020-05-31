<?php

use yii\db\Migration;

/**
 * Class m200530_113235_task
 */
class m200530_113235_task extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx_task_name', '{{%task}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%task}}');
    }
}