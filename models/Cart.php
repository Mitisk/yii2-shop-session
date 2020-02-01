<?php

namespace app\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $session
 * @property string|null $datetime
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'quantity'], 'integer'],
            [['session'], 'string'],
            [['datetime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'session' => 'Session',
            'datetime' => 'Datetime',
        ];
    }


    /*
     * Добавление товара в сессию cart и в таблицу cart
     */
    public static function addToCart($product) {

        if($_SESSION['cart'][$product->id]) {
            $_SESSION['cart'][$product->id]['quantity'] += 1;
            $_SESSION['cart.quantity'] += 1;

            self::addQuantity($product->id, session_id());
        } else {
            $_SESSION['cart'][$product->id] = [
                'title' => $product->title,
                'price' => $product->price,
                'quantity' => 1
            ];
            $_SESSION['cart.quantity'] = ($_SESSION['cart.quantity']) ? $_SESSION['cart.quantity'] + 1 : 1;

            self::addCart($product->id, session_id());
        }

        return $_SESSION['cart.quantity'];
    }

    /*
     * Поиск продукта в корзине
     */

    public static function findProduct($id, $sessionId) {
        return Cart::find()->where(['product_id' => $id])->andWhere(['session' => $sessionId])->one();
    }

    /*
     * Добавляем количество, если пользователь добавляет повторно товар
     */

    private static function addQuantity($id, $sessionId) {
        if (($model = self::findProduct($id, $sessionId)) !== null) {
            $model->quantity = $model->quantity + 1;
            $model->save();
            return true;
        }
    }

    /*
     * Добавляем новый товар в корзину
     */

    private static function addCart($id, $sessionId) {
        $cart = new Cart();
        $cart->product_id = $id;
        $cart->session = $sessionId;
        $cart->quantity = 1;
        $cart->save();
        return true;
    }

    /*
     * Очистка корзины в БД
     */

    public static function clearCart($sessionId) {
        $delCarts = Cart::find()->where(['session' => $sessionId])->all();
        foreach ($delCarts as $delCart) {
            $delCart->delete();
        }
        return true;
    }
}
