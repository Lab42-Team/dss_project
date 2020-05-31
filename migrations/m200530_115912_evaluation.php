<?php

use yii\db\Migration;

/**
 * Class m200530_115912_evaluation
 */
class m200530_115912_evaluation extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%evaluation}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'evaluation' => $this->text()->notNull(),
            'decision_id' => $this->integer()->notNull(),
            'specific_alternative_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("evaluation_decision_fk", "{{%evaluation}}", "decision_id",
            "{{%decision}}", "id", 'CASCADE');
        $this->addForeignKey("evaluation_specific_alternative_fk", "{{%evaluation}}",
            "specific_alternative_id", "{{%specific_alternative}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%evaluation}}');
    }
}