<?php

namespace app\controllers;

use Yii;
use app\models\Materialdetail;
use app\models\MaterialdetailSearch;
use app\models\Material;
use app\models\Dept;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialdetailController implements the CRUD actions for Materialdetail model.
 */
class MaterialdetailController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Materialdetail models.
     * @return mixed
     */
    public function actionIndex($id,$catid)
    {
        $searchModel = new MaterialdetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['categorycode'=>$catid]);
        $dataProvider->query->andWhere(['materialcode'=>$id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'catCode'=> $catid,
        ]);
    }

    public function actionIndex2($matcode)
    {
        $model = Material::find()->where(['materialcode' => $matcode])->one();
        $searchModel = new MaterialdetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['materialcode'=>$matcode]);
        $dataProvider->query->andWhere(['categorycode'=>$model->CategoryCode]);
        $dataProvider->query->andWhere(['workingstatus'=>2]);
        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'catCode'=> $model->CategoryCode,
            'matCode'=> $matcode,
        ]);
    }

    /**
     * Displays a single Materialdetail model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionView2($id)
    {
        return $this->render('view2', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Materialdetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Materialdetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Materialdetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $dept = Dept::find()
           ->select(['DeptName', 'DeptCode'])
           ->indexBy('DeptCode')
           ->column();

        if ($model->load(Yii::$app->request->post())) { 
            $model->IssueDate = strtotime (str_replace("/", "-", $model->IssueDate));
            $model->IssueDate = date('Y-m-d', $model->IssueDate);
            $model->LastDepeciation = strtotime (str_replace("/", "-", $model->LastDepeciation));
            $model->LastDepeciation = date('Y-m-d', $model->LastDepeciation);
            if($model->save()) {
            return $this->redirect(['index', 'id' => $model->MaterialCode, 'catid' => $model->CategoryCode]);
            }
          }

        return $this->render('update', [
            'model' => $model,
            'dept' => $dept,
        ]);
    }

    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);
        
        $dept = Dept::find()
           ->select(['DeptName', 'DeptCode'])
           ->indexBy('DeptCode')
           ->column();

        if ($model->load(Yii::$app->request->post())) { 
            $model->IssueDate = strtotime (str_replace("/", "-", $model->IssueDate));
            $model->IssueDate = date('Y-m-d', $model->IssueDate);
            $model->IssueDate = strtotime (str_replace("/", "-", $model->IssueDate));
            $model->IssueDate = date('Y-m-d', $model->IssueDate);
            if($model->save()) {
            return $this->redirect(['index2', 'matcode' => $model->MaterialCode]);
           }
        }

        return $this->render('update2', [
            'model' => $model,
            'dept' => $dept,
        ]);
    }

    /**
     * Deletes an existing Materialdetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Materialdetail::findOne($id);
        $model2 = Material::find()->where(['materialcode' => $model->MaterialCode])->one();
        $model2 = Material::findOne($model2->Id);
        $model2->Quantity = $model2->Quantity-1;
        $model2->save();
        //$model->delete(); also correct
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $model2->MaterialCode, 'catid' => $model2->CategoryCode]);
    }

    /**
     * Finds the Materialdetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materialdetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materialdetail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
