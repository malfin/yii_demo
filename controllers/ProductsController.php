<?php

namespace app\controllers;

use app\models\Basket;
use app\models\Category;
use app\models\Product;
use Yii;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $category = Category::find()->all();

        if ($id = Yii::$app->request->get('category')) {
            $category_id = Category::findOne($id);

            $product = Product::find()->where('counts!=0')->andWhere(['category_id' => $category_id])->all();
        } elseif ($year = Yii::$app->request->get('year')) {
            if ($year == 'DESC') {
                $product = Product::find()->where('counts!=0')->orderBy(['year' => SORT_DESC])->all();
            } else {
                $product = Product::find()->where('counts!=0')->orderBy(['year' => SORT_ASC])->all();
            }
        } elseif ($name = Yii::$app->request->get('name')) {
            if ($name == 'DESC') {
                $product = Product::find()->where('counts!=0')->orderBy(['year' => SORT_DESC])->all();
            } else {
                $product = Product::find()->where('counts!=0')->orderBy(['year' => SORT_ASC])->all();
            }
        } elseif ($price = Yii::$app->request->get('price')) {
            if ($price == 'DESC') {
                $product = Product::find()->where('counts!=0')->orderBy(['price' => SORT_DESC])->all();
            } else {
                $product = Product::find()->where('counts!=0')->orderBy(['price' => SORT_ASC])->all();
            }
        } else {
            $product = Product::find()->where('counts!=0')->orderBy(['created_at' => SORT_DESC])->all();
        }

        $context = [
            'product' => $product,
            'category' => $category,
        ];
        return $this->render('index', $context);
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        $context = [
            'product' => $product
        ];
        return $this->render('view', $context);
    }

    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');

        $product_id = Product::findOne($id);
        $user_id = Yii::$app->user->id;

        $basket_id = Basket::find()->where(['product_id' => $product_id])->andWhere(['user_id' => $user_id])->all();
        if ($product_id->counts != 0) {
            if ($basket_id) {
                foreach ($basket_id as $item) {
                    $basket = Basket::findOne($item['id']);
                    $basket->counts = $basket->counts + 1;
                    $product_id->counts = $product_id['counts'] - 1;
                    $product_id->save();
                    $basket->save();
                    Yii::$app->session->setFlash('success', 'Товар успешно добавлен в корзину!');
                }
            } else {
                $basket = new Basket();

                $basket->product_id = $product_id['id'];
                $basket->user_id = $user_id;

                $basket->counts = +1;
                $basket->save();

                $product_id->counts = $product_id['counts'] - 1;
                $product_id->save();
                Yii::$app->session->setFlash('success', 'Товар успешно добавлен в корзину!');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Нету в наличии!');
        }

        return $this->redirect('/');
    }

}
