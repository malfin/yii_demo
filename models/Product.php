<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $category_id
 * @property string|null $image
 * @property int|null $price
 * @property string|null $country
 * @property int|null $year
 * @property string|null $model
 * @property int|null $counts
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Basket[] $baskets
 * @property Category $category
 * @property Order[] $orders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'price', 'year', 'counts'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'image', 'country', 'model'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название товара'),
            'category_id' => Yii::t('app', 'Название категории'),
            'image' => Yii::t('app', 'Изображение'),
            'price' => Yii::t('app', 'Цена'),
            'country' => Yii::t('app', 'Город-производитель'),
            'year' => Yii::t('app', 'Год выпуска'),
            'model' => Yii::t('app', 'Модель'),
            'counts' => Yii::t('app', 'Количество'),
            'created_at' => Yii::t('app', 'Создано'),
            'updated_at' => Yii::t('app', 'Обновлено'),
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['product_id' => 'id']);
    }
}
