<?php

/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/10/2
 * Time: 13:52
 */

namespace app\modules\admin\controllers;

use app\models\Option;
use app\modules\admin\models\LoginForm;
use app\modules\admin\models\password\RegisterForm;
use app\modules\admin\models\password\ResetPasswordForm;
use app\modules\admin\models\password\SendRegisterSmsCodeForm;
use app\modules\admin\models\password\SendSmsCodeForm;
use yii\web\HttpException;

class PassportController extends Controller
{
    public $layout = 'passport';

    public function behaviors()
    {
        return [];
    }

    public function actions()
    {
        return [
            'captcha' => \app\utils\ClearCaptchaAction::className(),
            'sms-code-captcha' => \app\utils\ClearCaptchaAction::className(),
        ];
    }

    //登录
    public function actionLogin()
    {
        \Yii::$app->session->open();
        if (\Yii::$app->request->isAjax) {
            $form = new LoginForm();
            $form->attributes = \Yii::$app->request->post();
            return $form->login();
        } else {
            return $this->render('login');
        }
    }


    //注销
    public function actionLogout()
    {
        \Yii::$app->admin->logout();
        \Yii::$app->response->redirect(\Yii::$app->urlManager->createUrl(['admin']))->send();
    }

    //发送短信验证码，修改密码用
    public function actionSendSmsCode()
    {
        $form = new SendSmsCodeForm();
        $form->attributes = \Yii::$app->request->post();
        return $form->send();
    }

    //通过短信验证重置密码
    public function actionResetPassword()
    {
        $form = new ResetPasswordForm();
        $form->attributes = \Yii::$app->request->post();
        return $form->save();
    }

    //注册
    public function actionRegister()
    {
        $open_register = Option::get('open_register', 0, 'admin', true);
        if (!$open_register) {
            throw new HttpException(403, '注册功能暂未开放。');
        }
        if (\Yii::$app->request->isPost) {
            $form = new RegisterForm();
            $form->attributes = \Yii::$app->request->post();
            return $form->save();
        } else {
            return $this->render('register');
        }
    }


    //注册 数据验证
    public function actionRegisterValidate()
    {
        $form = new RegisterForm();
        $form->attributes = \Yii::$app->request->post();
        $form->post_attrs = \Yii::$app->request->post();
        return $form->validateAttr();
    }

    //发送短信验证码，注册用
    public function actionSendRegisterSmsCode()
    {
        $form = new SendRegisterSmsCodeForm();
        $form->attributes = \Yii::$app->request->post();
        return $form->send();
    }
	    //发送短信验证码，注册用
    public function actionSss()
    {
   	var_dump(123);
    }
	
	public function getAccessToken($data)
    {
 
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$data['appid']."&secret=".$data['secret'];
        // 微信返回的信息
        $returnData = json_decode($this->curlHttp($url));
        $resData['accessToken'] = $returnData->access_token;
        $resData['expiresIn'] = $returnData->expires_in;
        $resData['time'] = date("Y-m-d H:i",time());
 
        $res = $resData;
        return $res;
    }
 
    public function curlHttp($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($curl, CURLOPT_TIMEOUT, 500 );
        curl_setopt($curl, CURLOPT_URL, $url );
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;

	}
	//获取Ticket
	public function getJsApiTicket($accessToken) {
 
        $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=$accessToken&&type=jsapi";
        // 微信返回的信息
        $returnData = json_decode($this->curlHttp($url));
 
        $resData['ticket'] = $returnData->ticket;
        $resData['expiresIn'] = $returnData ->expires_in;
        $resData['time'] = date("Y-m-d H:i",time());
        $resData['errcode'] = $returnData->errcode;
 
        return $resData;
    }
	
	 // 获取签名
    public function actionGetsignpackage() {
		
	
		$get = \Yii::$app->request->get();
		$data['appid'] = $get['appid'];
		$data['secret'] = $get['secret'];
		if($data['appid'] == '' || $data['secret'] == ''){
			return[
				'code' => 1,
				'msg' => '请检查appid和secret',
			];
		}

//		$dataurl = '';
		// 生成时间戳
        $timestamp = time();
		$captch = json_decode(file_get_contents('configzyq.txt'),true);
		
		if($captch['timestamp']+7200 >= $timestamp){
			return[
				'code' => 1,
				'data' => $captch,
			];
		}
	
		
        // 获取token
        $token = $this->getAccessToken($data);
        // 获取ticket
        $ticketList = $this->getJsApiTicket($token['accessToken']);
        $ticket = $ticketList['ticket'];
        
        // 该url为调用jssdk接口的url
//        $url = 'https://www.xxx.com/xxx.html';

        // 生成随机字符串
        $nonceStr = $this->createNoncestr();
        // 这里参数的顺序要按照 key 值 ASCII 码升序排序 j -> n -> t -> u
        $string = "jsapi_ticket=$ticket&noncestr=$nonceStr×tamp=$timestamp&url=$url";
        $signature = sha1($string);
        $signPackage = array (
            "appId" => $get['appid'],
            "nonceStr" => $nonceStr,
            "timestamp" => $timestamp,
            "signature" => $signature,
            "rawString" => $string,
            "ticket" => $ticket,
            "token" => $token['accessToken']
        );
 
		file_put_contents('configzyq.txt',json_encode($signPackage));
        // 返回数据给前端
//		return[
		$data = [
			'code' => 1,
			'data' => $signPackage,
		];
//		];
		
		echo json_encode($data);
      
    }
 	
    // 创建随机字符串
    public function createNoncestr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for($i = 0; $i < $length; $i ++) {
            $str .= substr ( $chars, mt_rand ( 0, strlen ( $chars ) - 1 ), 1 );
        }
        return $str;
    }
	
	
}
