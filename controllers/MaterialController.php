<?php

namespace app\controllers;

use Yii;
use app\models\Material;
use app\models\MaterialSearch;
use app\models\Materialdetail;
use app\models\Supplier;
use app\models\Materialcode;
use app\models\Dept;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialController implements the CRUD actions for Material model.
 */
class MaterialController extends Controller
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
     * Lists all Material models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new MaterialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['categorycode'=>$id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'catCode' => $id,
        ]);
    }

    //public function actionMaterialByCategory($id)
    //{
        //$searchModel = new MaterialSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->andWhere('categorycode = '$id);
        //$materials = Customer::find()
          //->where(['status' => Customer::STATUS_ACTIVE])
          //->orderBy('id')
          //->all();
        //if ($materials === null) {
            //throw new NotFoundHttpException;
        //}

        //return $this->render('MaterialByCategory', ['model' => $model,]);
    //}

    /**
     * Displays a single Material model.
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

    /**
     * Creates a new Material model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Material();
        $model2 = new Materialdetail();
        $items = Supplier::find()
           ->select(['suppliername', 'suppliercode'])
           ->indexBy('suppliercode')
           ->column();

        $items2 = Materialcode::find()
           ->select(['materialname', 'materialcode'])
           ->indexBy('materialcode')
           ->column();

        $items3 = Dept::find()
           ->select(['deptname', 'deptcode'])
           ->indexBy('deptcode')
           ->column();

        if($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post()))
        {
            $model5 = Materialcode::findOne($model->MaterialCode);
            $model->MaterialName = $model5->MaterialName;

            for($i=1;$i<=$model->Quantity;$i++)
            {
            $model2->PurchaseDate = strtotime (str_replace("/", "-", $model2->PurchaseDate));
            $model2->PurchaseDate = date('Y-m-d', $model2->PurchaseDate);
            $model3 = new Materialdetail();
            $model3->MaterialCode = $model->MaterialCode;
            $model3->MaterialName = $model->MaterialName;
            $model3->CategoryCode = $model->CategoryCode;
            $model3->WorkingStatus = 2;
            $model3->Manufacturer = $model2->Manufacturer;
            $model3->DepreciationRate = $model2->DepreciationRate;
            $model3->SupplierCode = $model2->SupplierCode;
            $model3->PurchaseDate = $model2->PurchaseDate;
            $model3->PurchasePrice = $model2->PurchasePrice;
            $model3->CurrentValue = $model2->PurchasePrice;
            $model3->TotalExpense = 0;
            $model3->Issued = 'No';
            //$modelMaterialDetail= User::find()->where(['User_id' =>$id])->one();
            //$modelEmp->Name=$_POST['name']; // use your field names
            //$modelEmp->Email_id=$_POST['email_id'];
           //$modelUser->Name=$_POST['name'];
            //$modelUser->Email_id=$_POST['email_id'];
            if($model3->save()) {
                    continue;
                  }
            }
            if(($model4 = Material::find()->where(['materialcode' => $model->MaterialCode])->one())!==null){
                  if(($model4 = Material::findOne($model4->Id))!== null){
                       $model4->Quantity = $model4->Quantity + $model->Quantity;
                       if($model4->save()) {
                              return $this->redirect(['index', 'id' => $model->CategoryCode]);
                          }
                   }
            }
            
            if($model->save()) {
                 //if ($this->getIsNewRecord())
	         //{ hemi hi hman a ngai primary key neih dawn chuan, view hi primary key passloh chuan a hmutheilo controllerin
		 //$this->id = Yii::app()->db->getLastInsertID();
	         //}
                   //return $this->redirect(['view', 'id' => $this->id]);
                   return $this->redirect(['index', 'id' => $model->CategoryCode]);
                 }
        }
        return $this->render('create', [
            'model' => $model,
            'model2' => $model2,
            'id' => $id,
            'items' => $items,
            'items2' => $items2,
            'items3' => $items3,
        ]);
    }

    /**
     * Updates an existing Material model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->CategoryCode]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Material model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Material model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Material the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Material::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
