<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m221102_033729_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(256)->unique(),
            'name' => $this->string(256),
            'surname' => $this->string(256),
            'patronymic' => $this->string(256),
            'email' => $this->string(256)->unique(),
            'password' => $this->string(256),
            'is_admin' => $this->integer()->defaultValue(0),
            'authKey' => $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
