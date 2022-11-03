<?php

namespace app\controllers;

use app\models\Basket;
use app\models\Order;
use app\models\PasswordForm;
use Yii;

class BasketController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
        $basket = Basket::find()->where(['user_id' => $user_id])->all();

        $model = new PasswordForm();

        if ($model->load(Yii::$app->request->post())) {
            $user_password = Yii::$app->user->identity->validatePassword($model->password);
            if ($user_password) {
                foreach ($basket as $item) {
                    $order = new Order();
                    $order->product_id = $item['product']['id'];
                    $order->user_id = $user_id;
                    $order->counts = $item['counts'];

                    $order->save();
                    $item->delete();
                }
                Yii::$app->session->setFlash('success', 'Вы успешно сделали заказ!');
            } else {
                Yii::$app->session->setFlash('error', 'Не верный пароль!');
            }
            return $this->redirect('index');
        }

        $context = [
            'basket' => $basket,
            'model' => $model,
        ];
        return !Yii::$app->user->isGuest ? $this->render('index', $context) : $this->goHome();
    }


    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');

        $basket = Basket::findOne($id);
        if ($basket->product->counts != 0) {

            $basket->counts = $basket['counts'] + 1;

            $basket->product->counts = $basket->product->counts - 1;

            $basket->save();

            $basket->product->save();
            Yii::$app->session->setFlash('success', 'Товар успешно добавлен в корзину!');
        } else {
            Yii::$app->session->setFlash('error', 'Товара нету в наличии!');
        }
        return $this->redirect('index');

    }

    public function actionRemove()
    {
        $id = Yii::$app->request->get('id');

        $basket = Basket::findOne($id);

        if ($basket->counts == 1) {
            $basket->delete();
        } else {
            $basket->counts = $basket->counts - 1;
            $basket->product->counts = $basket->product->counts + 1;


            $basket->save();
            $basket->product->save();
        }


        Yii::$app->session->setFlash('success', 'Товар успешно удалён из корзины!');

        return $this->redirect('index');
    }

}
