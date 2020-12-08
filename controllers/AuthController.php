<?php
namespace app\controllers;
use Yii;
use app\models\User;
use app\models\Dept;

class AuthController extends \yii\rest\Controller
{

public function actionLogin(){

    $username = !empty($_POST['username'])?$_POST['username']:'';
    $password = !empty($_POST['password'])?$_POST['password']:'';
    $response = [];

    if(empty($username) || empty($password)){
      $response = [
        'status' => 'error',
        'message' => 'Username or Password empty!',
        'data' => '',
      ];
    }
    else{

        $user = User::find()->where(['username' => $username])->one();

        //$user = User::findByUsername($username);

        if(!empty($user)){

          if($user->validatePassword($password)){

            $dept = Dept::find()->where(['ManagerName' => $username])->one();            

            //$response = [
              //'status' => 'success',
              //'data' => [
                  //'id' => $user->id,
                  //'username' => $user->username,
                  //'token' => $user->auth_key,
                  //'message' => 'Success',
                  //'deptcode' => $dept->DeptCode,
              //]
            //];           

            $response = [
                  'id' => $user->id,
                  'username' => $user->username,
                  'token' => $user->auth_key,
                  'message' => 'Success',
                  'deptcode' => $dept->DeptCode,
            ];

            //$response = 'Success';
          }

          else{
            //$response = [
              //'status' => 'error',
              //'message' => 'password Incorrect!',
              //'data' => '',
            //];
              //$response = 'Password Incorrect!';
            $response = [
                  'message' => 'Password Incorrect!',
            ];
          }
        }

        else{
          //$response = [
            //'status' => 'error',
            //'message' => 'Username not found!',
            //'data' => '',
          //];
          $response = 'Username not found!';
        }
    }
    return $response;
}

protected function verbs()
{
   return [
       'login' => ['POST'],
   ];
}

}