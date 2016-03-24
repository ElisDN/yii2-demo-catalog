<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class AttributeFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Attribute';
    public $dataFile = '@app/fixtures/data/attribute.php';
} 