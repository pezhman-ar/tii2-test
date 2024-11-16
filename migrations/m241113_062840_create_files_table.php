<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files}}`.
 */
class m241113_062840_create_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%files}}', [
            'id' => $this->primaryKey(),
            'post_id'=>$this->integer()->notNull(),
            'address'=>$this->string()->notNull(),
        ]);

        $this->createIndex(
            'idx-files-post_id',
            'files',
            'post_id'
        );

        $this->addForeignKey(
            'fk-files-post_id',
            'files',
            'post_id',
            'post',
            'id',
            'CASCADE',
        );


    }

   

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%files}}');
    }
}
