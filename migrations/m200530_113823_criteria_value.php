<?php

use yii\db\Migration;

/**
 * Class m200530_113823_criteria_value
 */
class m200530_113823_criteria_value extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%criteria_value}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'priority' => $this->integer()->notNull(),
            'value' => $this->text()->notNull(),
            'criteria_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("criteria_value_criteria_fk", "{{%criteria_value}}", "criteria_id",
            "{{%criteria}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%criteria_value}}');
    }
}