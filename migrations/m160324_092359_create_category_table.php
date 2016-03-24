<?php

use yii\db\Migration;

class m160324_092359_create_category_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'parent_id' => $this->integer(),
        ]);

        $this->createIndex('idx-category-parent_id', '{{%category}}', 'parent_id');

        $this->addForeignKey('fk-category-parent', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'SET NULL', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
