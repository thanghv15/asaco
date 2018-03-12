<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Saleoff;
use frontend\models\SaleoffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\components\ComponentBase;
use frontend\modules\danhmuc\models\Danhmuc;
use frontend\modules\product\models\Products;
use frontend\modules\sale\models\Sale;
use yii\db\Query;

/**
 * SaleoffController implements the CRUD actions for Saleoff model.
 */
class SaleoffController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Saleoff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $components = new ComponentBase();
        $base_url = $components->Base_url();

        $list_saleoff = Saleoff::find()->orderBy(['create_time'=>SORT_DESC])->limit(50)->all();

        return $this->render('index', [
            'base_url' => $base_url,
            'list_saleoff' => $list_saleoff,
        ]);
    }

    public function actionListsale($prm = ''){
        $components = new ComponentBase();
        $base_url = $components->Base_url();
        $time =  time();
        $saleoff = Saleoff::find()->where(['code'=>$prm])->one();

        if ($prm) {
            $sql = "SELECT prd.* 
                    FROM products prd
                    JOIN product_sale prs ON prd.code = prs.product
                    JOIN sale_off so ON prs.sale_off_id = so.code
                    WHERE prs.sale_off_id = '".$prm."' AND (so.start_day < ".$time." AND so.end_day > ".$time.") AND prd.publish = 1";
            $query = new Query();
            $list_data = Yii::$app->db->createCommand($sql)->queryAll();
            return $this->render('saleon', [
                'base_url' => $base_url,
                'saleoff' => $saleoff,
                'list_data' => $list_data,
            ]);
        }else{
            return $this->redirect(['/']);
        }
    }
}
