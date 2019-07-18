<?php

use yii\db\Migration;

/**
 * Class m190718_153346_bodyMassIndexes
 */
class m190718_153346_bodyMassIndexes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('body_mass_index', [
            'id' => $this->primaryKey(),
            'registration_date' => $this->dateTime()->notNull(),
            'weight' => $this->decimal(6,3)->notNull(),
            'height' => $this->decimal(6,3)->notNull(),
            'BMI' => $this->decimal(6,3)->notNull(),
            'classification' => $this->string()->notNull(),
            'id_user' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-body_mass_index-id_user',
            'body_mass_index',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('body_mass_index');
    
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190718_153346_bodyMassIndexes cannot be reverted.\n";

        return false;
    }
    */
}
