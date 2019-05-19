<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Cookie;

class LangController extends Controller
{
    public function __construct($id, $module, $config = [])
    {
        $lang = \Yii::$app->request->get('lang') ??
            \Yii::$app->request->cookies->get('lang')->value ??
            \Yii::$app->language;
        if (in_array($lang, ['ru-RU', 'en-US'])) {
            \Yii::$app->language = $lang;
            \Yii::$app->response->cookies->add(new Cookie([
                'name' => 'lang',
                'value' => $lang,
                'expire' => time() + 3600 * 365
            ]));
        }
        parent::__construct($id, $module, $config);
    }
}
