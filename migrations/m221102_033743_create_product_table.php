<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m221102_033743_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
            'category_id' => $this->integer(),
            'image' => $this->string(256),
            'price' => $this->integer()->defaultValue(100),
            'country' => $this->string(256)->defaultValue('Россия'),
            'year' => $this->integer()->defaultValue(2022),
            'model' => $this->string(256)->defaultValue('123'),
            'counts' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()->defaultValue(null),
        ]);

        $this->addForeignKey(
            'category_id_product',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
