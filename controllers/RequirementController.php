<?php
namespace app\controllers;
use Yii;
use app\models\Requirement;
use app\models\RequirementSearch;
use app\models\Materialdetail;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;


//use yii\rest\ActiveController;

class RequirementController extends \yii\rest\Controller {

//public $modelClass = 'app\models\Requirement';

/**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                //'actions' => [
                    //'delete' => ['POST'],
                //],
            ],
        ];
    }

/**
     * Lists all Requirement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequirementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

public function actionRequestdistrictmaterial() {

        $deptcode = !empty($_POST['DeptCode'])?$_POST['DeptCode']:'';
        $materialcode = !empty($_POST['MaterialCode'])?$_POST['MaterialCode']:'';
        $materialname = !empty($_POST['MaterialName'])?$_POST['MaterialName']:'';
        $quantity = !empty($_POST['Quantity'])?$_POST['Quantity']:'';
        $remarks = !empty($_POST['Remarks'])?$_POST['Remarks']:'';
        $model =  new Requirement;

        $model->DeptCode = $deptcode;
        $model->MaterialCode = $materialcode;
        $model->MaterialName = $materialname;
        $model->Quantity = $quantity;
        $model->Status = 4;
        $model->Remarks = $remarks;

       if($model->save()){

            $response = 'Success';
            return $response;
          }
          else{

            $response = 'Error';
            return $response;

          }

        return $response;
    }


public function actionGetdistrictmaterial() {

       $deptcode = !empty($_POST['DeptCode'])?$_POST['DeptCode']:'';
       $model =  Materialdetail::find()->where(['IssuedTo' => $deptcode])->all();
       //if(empty($model)){ 
            //$response = [
                  //'Id' => ' ',
                  //'MaterialCode' => ' ',
                  //'MaterialName' => ' ',
                  //'CategoryCode' => ' ',
                  //'WorkingStatus' => ' ',
                  //'Color' => ' ',
                  //'Manufacturer' => ' ',
                  //'PurchaseDate' => ' ',
                  //'PurchasePrice' => ' ',
                  //'SupplierCode' => ' ',
                  //'CurrentValue' => ' ',
                  //'DepreciationRate' => ' ',
                  //'IssueDate' => ' ',
                  //'Issued' => ' ',
                  //'IssuedTo' => ' ',
                  //'LastDepreciation' => ' ',
                  //'MainteinanceId' => ' ',
                  //'TotalExpense' => ' ',
            //];
         //$response=null;
         //return $response; 
        //}            
       
       return Json::encode($model);
    }

public function actionUpdatedistrictmaterial() {

        $id = !empty($_POST['Id'])?$_POST['Id']:'';
        $workingstatus = !empty($_POST['WorkingStatus'])?$_POST['WorkingStatus']:'';
        $issuedto = !empty($_POST['IssuedTo'])?$_POST['IssuedTo']:'';
        $model = Materialdetail::findOne($id);
        $model->WorkingStatus = $workingstatus;
        $model->IssuedTo = $issuedto;
        if($model->save()){

            $response = 'Success';
            return $response;

        } else {

            $response = 'Error! Try Again';
            return $response;
         }

   }

   
protected function verbs() {
      return [
      "index" => ["GET", "HEAD"],
      //"view" => ["GET", "HEAD"],
      "create" => ["POST"],
      //"update" => ["PUT", "PATCH"],
      //"delete" => ["DELETE"],
      ];
    }
}