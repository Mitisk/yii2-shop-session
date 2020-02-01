<?php

namespace app\controllers;

use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\web\Controller;
use app\models\Category;
use app\models\Product;
use app\models\Cart;

class SiteController extends Controller
{


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Главная.
     *
     * @return string
     */
    public function actionIndex($category = 1)
    {
        $categorys = Category::find()->all();
        $select_category = $this->findCategoryModel($category);
        $products = Product::find()->where(['category_id' => $category])->all();

        return $this->render('index', [
            'categorys' => $categorys,
            'select_category' => $select_category,
            'products' => $products
        ]);
    }

    /**
     * Корзина.
     *
     * @return string
     */
    public function actionCart()
    {
        $session = Yii::$app->session;
        if ($session->has('cart-product_id')) {
            $products = Product::find()->where;
        }

        return $this->render('cart', [
            'products' => $products,
            'session' => $session,
        ]);
    }

    /*
     *  Страница добавления товара в корзину по Ajax
     */

    public function actionAddToCart($id) {

        $product = $this->findProductModel($id);
        If (!$product) {return false;}

        Cart::addToCart($product);

        $session = Yii::$app->session;
        return $session->get('cart.quantity');
    }

    /*
     * Страница очистки корзины
     */

    public function actionClearCart() {
        $session = Yii::$app->session;
        Cart::clearCart($session->id);
        $session->destroy();
        return $this->goHome();
    }

    /*
     * Поиск модели категории
     */

    protected function findCategoryModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*
     * Поиск модели продукта
     */

    protected function findProductModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
