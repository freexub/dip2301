<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property int $active
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'active'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'parent_id' => 'Родительская категория',
            'name' => 'Название категории',
            'active' => 'Статус',
        ];
    }

    public function getParents(){
        return Categories::find()->where(['parent_id'=>null])->all();
    }

    public function getParent1(){
        return $this->hasOne(Categories::class, ['id' => 'parent_id']);
    }

}
