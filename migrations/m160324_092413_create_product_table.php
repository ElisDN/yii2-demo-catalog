<?php

use yii\db\Migration;

class m160324_092413_create_product_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'content' => $this->text(),
            'price' => $this->integer()->notNull(),
            'active' => $this->smallInteger(1)->notNull()->defaultValue(0),
        ]);

        $this->createIndex('idx-product-category_id', '{{%product}}', 'category_id');
        $this->createIndex('idx-product-active', '{{%product}}', 'active');

        $this->addForeignKey('fk-product-category', '{{%product}}', 'category_id', '{{%category}}', 'id', 'SET NULL', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
