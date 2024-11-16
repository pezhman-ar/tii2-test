<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_post}}`.
 */
class m241116_072100_create_category_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_post}}', [
            'id' => $this->primaryKey(),
            'category_id'=>$this->integer()->notNull(),
            'post_id'=>$this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-category_post-category_id',
            'category_post',
            'category_id'
        );

        $this->addForeignKey(
            'fk-category_post-category_id',
            'category_post',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-category_post-post_id',
            'category_post',
            'post_id'
        );

        $this->addForeignKey(
            'fk-category_post-post_id',
            'category_post',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_post}}');
    }
}
