<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m200201_094707_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
        $this->batchInsert('{{%category}}', ['title'], [
            ['Адреналин'],
            ['Красота и здоровье'],
            ['Романтика'],
            ['Гурман'],
            ['Стиль'],
            ['Выходные'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
