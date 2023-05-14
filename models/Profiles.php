<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property int $user_id
 * @property string $sname
 * @property string $name
 * @property string $fname
 * @property string $birthday
 * @property string $adress
 * @property int $type_id
 * @property int $gender
 * @property string $iin
 * @property string $photo
 * @property string $date_update
 * @property string $date_create
 *
 * @property ProfilesType $type
 * @property User $user
 * @property StudentsClassrooms $user0
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gender', 'sname', 'name', 'birthday', 'adress', 'type_id', 'iin'], 'required'],
            [['user_id', 'type_id', 'gender'], 'integer'],
            [['birthday', 'date_update', 'date_create'], 'safe'],
            [['adress'], 'string'],
            [['photo', 'sname', 'name', 'fname'], 'string', 'max' => 50],
            [['iin'], 'string', 'max' => 20],
//            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProfilesType::class, 'targetAttribute' => ['type_id' => 'id']],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentsClassrooms::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'sname' => 'Фамилия',
            'name' => 'Имя',
            'fname' => 'Отчество',
            'birthday' => 'Дата рождения',
            'adress' => 'Адрес',
            'type_id' => 'Тип профиля',
            'gender' => 'Пол',
            'iin' => 'ИИН',
            'photo' => 'Фото',
            'date_update' => 'Дата редактирования',
            'date_create' => 'Дата регистрации',
        ];
    }

    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            $this->birthday = Yii::$app->formatter->asDate($this->birthday, 'yyyy-MM-dd');
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ProfilesType::class, ['id' => 'type_id']);
    }

    public function getAllType()
    {
        return ProfilesType::find()->all();
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[User0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(StudentsClassrooms::class, ['user_id' => 'user_id']);
    }

    public function getFullName(){
        return $this->sname . ' ' . $this->name;
    }

    public function getPhoto(){
        if (empty($this->photo)){
            return 'no-photo.png';
        }else{
            if (file_exists(Yii::$app->basePath.'/web/photo/'.$this->photo)){
                return $this->photo;
            }else{
                return 'no-photo.png';
            }
        }
    }
}
