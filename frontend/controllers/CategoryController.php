<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Category;
use frontend\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\components\ComponentBase;
use frontend\modules\danhmuc\models\Danhmuc;
use frontend\modules\product\models\Products;
use frontend\modules\sale\models\Sale;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex($prm)
    {
        $components = new ComponentBase();
        $base_url = $components->Base_url();

        if ($prm) {
            $cate = Danhmuc::find()->where(['code' => $prm])->one();
            $cate_id = $cate['id'];
            $list_product = Products::find()->where(['categories_id' => $cate_id])->andWhere(['publish' => 1])->orderBy(['orders'=>SORT_ASC])->limit(50)->all();
            // $query = new Query;
            // $query->select(['um.id as USERid', 'um.first_name', 'um.last_name',   'um.email', 'COUNT(g.id) as guestCount'])
            //  ->from('user_master um')
            //  ->join('LEFT JOIN', 'guest g', 'g.user_id = um.id')
            //  ->limit(12,20)
            //  ->groupBy('um.id')
            //  ->orderBy(['um.id' => SORT_DESC]);

            //   $command = $Query->createCommand();
            //   $evevtsUserDetail = $command->queryAll(); 
            //end 
            return $this->render('index', [
                'base_url' => $base_url,
                'cate' => $cate,
                'list_product' => $list_product,
            ]);
        }else{
            return $this->redirect(['/']);
        }
    }

}
