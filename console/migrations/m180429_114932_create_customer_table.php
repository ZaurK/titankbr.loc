<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer`.
 */
class m180429_114932_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'ctitle' => $this->string(256),
            'cimg_path' => $this->string(256),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customer');
    }
}
