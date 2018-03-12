<?php

namespace frontend\modules\product\controllers;

use Yii;
use frontend\modules\product\models\Products;
use frontend\modules\product\models\Productsimages;
use frontend\modules\product\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\components\ComponentBase;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex($prm)
    {
        
        $components = new ComponentBase();
        $base_url = $components->Base_url();
        
        $model_image = Productsimages::find()->where(['product_code' => $prm])->all();
        $model = Products::find()->where(['code' => $prm])->one();
        if ($model) {
            return $this->render('index', [
                'model' => $model,
                'model_image' => $model_image,
                'base_url' => $base_url,
            ]);
        }else{
            return $this->redirect(['/']);
        }
    }

    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateorder(){
        if (isset($_POST['code_product'])) {
            $code = $_POST['code_product'];
            $model = new Products();
            $data = $model->get_one_product($code);
            echo json_encode($data);
        }
    }
}
