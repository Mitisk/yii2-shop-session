<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200201_103021_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->null(),
            'price' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull()
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '1',
            'title' => 'Чистый адреналин',
            'description' => 'Спуск в зорбе, дайвинг, скалолазание и другие экстремальные программы',
            'price' => '3000',
            'quantity' => '7',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '1',
            'title' => 'С драйвом по жизни',
            'description' => 'Катание на квадроцикле, рафтинг, полет на паралете и другие способы получить адреналин',
            'price' => '4400',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '1',
            'title' => 'Экстрим клуб',
            'description' => 'У нас есть несколько отличных способов наполнить жизнь адреналином - активный отдых на пределе Ваших мечтаний становится реальностью!',
            'price' => '5800',
            'quantity' => '3',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '1',
            'title' => 'Планета Экстрим',
            'description' => 'Полет на флайборде, экстремальное вождение, стрельба, полет на вертолете и многое другое для настоящих любителей приключений',
            'price' => '8950',
            'quantity' => '2',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '1',
            'title' => 'Прыжок в небо',
            'description' => 'Прыжок с парашютом в тандеме',
            'price' => '10760',
            'quantity' => '8',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '1',
            'title' => 'Мир на ладони',
            'description' => 'Полет на вертолете',
            'price' => '19990',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '2',
            'title' => 'Мисс совершенство',
            'description' => 'Салонные процедуры на выбор',
            'price' => '2500',
            'quantity' => '63',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '2',
            'title' => 'Аква вита',
            'description' => 'Флоатинг, SPA-капсула, подводный душ-массаж',
            'price' => '2900',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '2',
            'title' => 'Рай на земле',
            'description' => 'Экзотические массажи на выбор',
            'price' => '3050',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '3',
            'title' => 'Чего хотят женщины?',
            'description' => 'Танцы, йога, салон красоты и другие увлекательные программы для прекрасной половины человечества',
            'price' => '1550',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '3',
            'title' => 'Мир на двоих',
            'description' => 'Целый мир впечатлений, созданный для двух влюбленных',
            'price' => '3050',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '3',
            'title' => 'Незабываемый день',
            'description' => 'Конная прогулка, сигвей, массаж, погружение с аквалангом',
            'price' => '3050',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '3',
            'title' => 'Мелодия любви',
            'description' => 'Несколько вариантов романтического свидания',
            'price' => '3050',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '4',
            'title' => 'Коктейльная вечеринка',
            'description' => 'Изготовление и дегустация алкогольных коктейлей',
            'price' => '4550',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '5',
            'title' => 'Статус и стиль',
            'description' => 'Индивидуальный пошив мужской рубашки',
            'price' => '8990',
            'quantity' => '6',
        ]);
        $this->insert('{{%product}}', [
            'category_id' => '6',
            'title' => 'Идеальный уикенд',
            'description' => 'Несколько безупречных способов провести выходные с комфортом ',
            'price' => '25000',
            'quantity' => '6',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
