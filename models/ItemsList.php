<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items_list".
 *
 * @property int $id
 * @property int $category_id
 * @property int $item_count
 * @property int $price
 * @property string|null $name
 * @property string|null $history
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
            [['about','history'], 'string'],
            [['active','category_id','price','item_count'], 'integer'],
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
            'item_count' => 'Количество',
            'category_id' => 'Категория',
            'price' => 'Закупочная цена',
            'history' => 'История перемещений',
            'active' => 'Статус',
        ];
    }

    public function getCategoryName(){
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    public function getAllCategory(){
        return Categories::find()->where(['active'=>0])->all();
    }
}
