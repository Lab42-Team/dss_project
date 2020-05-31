<?php

use yii\db\Migration;

/**
 * Class m200530_115530_specific_alternative
 */
class m200530_115530_specific_alternative extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%specific_alternative}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'alternative_id' => $this->integer()->notNull(),
            'criteria_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("specific_alternative_alternative_fk", "{{%specific_alternative}}",
            "alternative_id", "{{%alternative}}", "id", 'CASCADE');
        $this->addForeignKey("specific_alternative_criteria_fk", "{{%specific_alternative}}",
            "criteria_id", "{{%criteria}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%specific_alternative}}');
    }
}