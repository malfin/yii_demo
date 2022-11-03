<?php

namespace app\controllers;

use app\models\Order;
use Yii;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
        $order = Order::find()->where(['user_id' => $user_id])->all();

        $context = [
            'order' => $order
        ];

        return !Yii::$app->user->isGuest ? $this->render('index', $context) : $this->goHome();
    }


    public function actionRemove()
    {
        $id = Yii::$app->request->get('id');
        $order = Order::findOne($id);
        $order->delete();
        return $this->redirect('index');
    }

}
