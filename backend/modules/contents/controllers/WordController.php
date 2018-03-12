<?php

namespace backend\modules\contents\controllers;

use Yii;
use backend\modules\contents\models\Word;
use backend\modules\contents\models\WordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use backend\components\ComponentBase;
use yii\web\UploadedFile;

/**
 * WordController implements the CRUD actions for Word model.
 */
class WordController extends Controller
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
     * Lists all Word models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Word model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Word model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Word();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        $model->type = 5;
        $time_curent = time();
        $id_user = Yii::$app->user->id;
        $model->create_by = $id_user;
        $model->create_time = $time_curent;
        $model->update_by = $id_user;
        $model->update_time = $time_curent;
        if ($model->load(Yii::$app->request->post())) {

            // $model->url = UploadedFile::getInstance($model,'url');
            //  if ($model->url) {
            //     $text = iconv("UTF-8", "UTF-8//IGNORE", $model->title);
            //      $translatedString = 'giao-an-word-'.$time_curent;
            //     $model->url->saveAs( '../../public/documents/'.$translatedString.'.'. $model->url->extension );
            //     $model->url = $translatedString.'.'.$model->url->extension;
            // }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Word model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        $time_curent = time();
        $id_user = Yii::$app->user->id;
        $model->update_by = $id_user;
        $model->update_time = $time_curent;
        // if($model->url){
        //     $url_old = $model->url;          
        // }
        if ($model->load(Yii::$app->request->post())) {
            // $model->url = UploadedFile::getInstance($model,'url');
            // var_dump($model->url);die;
            // if ($model->url != NULL) {
            //     $text = iconv("UTF-8", "UTF-8//IGNORE", $model->title);
            //     $translatedString = 'giao-an-word-'.$time_curent;
            //     $model->url->saveAs( '../../public/documents/'.$translatedString.'.'. $model->url->extension );
            //     $model->url = $translatedString.'.'.$model->url->extension;
            // }else
            // {
            //     if (isset($url_old)) {
            //         $model->url = $url_old;
            //     }
            // }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Word model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        if (isset($_REQUEST['value'])) 
        {
            $id = $_REQUEST['value'];
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Word model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Word the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Word::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
