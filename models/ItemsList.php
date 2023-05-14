<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items_list".
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $name
 * @property string|null $about
 * @property string|null $photo
 * @property int $active
 */
class ItemsList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about'], 'string'],
            [['active','category_id'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['photo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'name' => 'Название',
            'about' => 'Описание',
            'photo' => 'Фото',
            'category_id' => 'Фото',
            'active' => 'Статус',
        ];
    }

    public function getCategoryName(){
        return $this->hasOne(Categories::class, ['id' => 'parent_id']);
    }
}
