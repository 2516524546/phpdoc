<?php
namespace app\manage\controller;

use service\DataService;
use think\Db;
use think\Session;
use controller\BasicAdmin;
use PHPExcel\PHPExcel;
use PHPExcel\PHPExcel\IOFactory;
use PHPExcel\PHPExcel\Style;
use think\Validate;

class Index  extends BasicAdmin {

public $table = 'myuser';

public function index(){


  $date =  Db::name($this->table)->where(['is_delete'=>0])->select();
  // halt($date);

  foreach ($date as $key => $value) {
    if ($value['come_time']) {
       $date[$key]['come_time'] =date('Y-m-d',$value['come_time']);
    }
  }
  $newdata =json_encode($date);

  return $this->fetch('',['db' => $newdata]);
}


    public function edit(){

      if ($this->request->post()) {
        // echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';


        $data  = $this->request->post();

        // json_encode($data, JSON_UNESCAPED_UNICODE);
        $validate = new Validate([
          'username' => 'require|max:70',
          'phone' => 'require|max:70|number',
          'mark' => 'require|max:70',
          'whome' => 'require|max:70',
      ],
      [
        'username.require' => '名称必须输入',
        'phone.number' => '手机号码必须是数字' ,
        'phone.require' => '手机号码必须输入' ,
        'mark.require' => '备注必须输入' ,
        'whome.require' => '身份必须输入' ,
     ]
    );

       $validate_integral = new Validate([
            'integral' => 'require|max:70|number',
        ],
        [
          'integral.number' => '充值积分必须是数字' ,
          'integral.require' => '充值积分必须输入' ,
       ]
      );
      $validate_my_money = new Validate([
            'my_money' => 'require|max:70|number',
          ],
        [
        'my_money.number' => '充值金额必须是数字' ,
        'my_money.require' => '充值金额必须输入' ,
        ]
     );


    // halt($data['requier_tag']);
    // halt($data);
    if (!empty($data['editkey'])) {
      if (!empty($data['integral'])){
        if(!$validate_integral->check($data)){
           return  $this->error($validate_integral->getError());
        }
        $data['integral'] = $data['integral']+floatval($data['old_integral']);

      }if (!empty($data['my_money'])) {
        if(!$validate_my_money->check($data)){
           return  $this->error($validate_my_money->getError());
        }
         $data['my_money'] = $data['my_money']+floatval($data['old_money']);

      }

      $res  = Db::name($this->table)->where(['id'=> $data['editkey']])->strict(false)->update($data);
      if($res) return $this->success('修改成功!');
    }else {
      if(!$validate->check($data)){
         return  $this->error($validate->getError());
      }
          $data['come_time'] = time();
          // $level = Db::name($this->table)->where(['id'=> $data['cid']])->field('level')->find()['level'];
          // // halt($level);
          // $data['level'] = intval($level)+1;
          // halt($data);
          $res = DataService::save($this->table, $data);
          if($res) return $this->success('添加成功!');
       }

      }
 }



function export(){//导出Excel
  $data  = $this->request->get();
  // halt($data);
  $res =[];
  if(!empty($data['id'])){
    if (strpos($data['id'],',')) {
      $building_id = explode(',',$data['id']);
      foreach ($building_id  as $key => $value) {
        // halt($value);
        $res[] =  Db::name($this->table)->where(['id'=> $value])->select()[0];
     }
   }else {
    $res[] =  Db::name($this->table)->where(['id'=> $data['id']])->select()[0];
   }

    if (!$res)  return $this->success('无数据');
  }
  foreach ($res as $key => $value) {
    if ($value['come_time']) {
       $res[$key]['come_time'] =date('Y-m-d',$value['come_time']);
    }
 }
  // halt($res);
  $xlsName  = "export";
  $xlsCell  =array(

   array("id" , '序号'),

   array("username", '昵称'),

   array("phone",'手机号码'),

   array("mark",'备注'),

   array("come_time", '加入时间'),

   array('whome','身份'),

   array("my_money",'当前余额'),

   array("integral",'积分'),
   // array("status_name",'状态'),

  );
//
  // $xlsData  = [ 0 =>['uid'=>1,'nickname'=>'22','email'=>'5555'],1 =>['uid'=>2,'nickname'=>'22','email'=>'5555']];
  // halt($xlsData);
  $this->exportExcel($xlsName,$xlsCell,$res);
}



function exportExcel($expTitle,$expCellName,$expTableData){
  include_once EXTEND_PATH.'PHPExcel/PHPExcel.php';//方法二
  $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
  $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
  $cellNum = count($expCellName);
  $dataNum = count($expTableData);
//        $objPHPExcel = new PHPExcel();//方法一
  $objPHPExcel = new \PHPExcel();//方法二
  $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
  for($i=0;$i<$cellNum;$i++){
      $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
  }
  // Miscellaneous glyphs, UTF-8
  for($i=0;$i<$dataNum;$i++){
      for($j=0;$j<$cellNum;$j++){
          $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
      }
  }
  ob_end_clean();//这一步非常关键，用来清除缓冲区防止导出的excel乱码
  header('pragma:public');
  header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
  header("Content-Disposition:attachment;filename=$fileName.xls");//"xls"参考下一条备注
  $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//"Excel2007"生成2007版本的xlsx，"Excel5"生成2003版本的xls
  $objWriter->save('php://output');
  exit;
}

public function del(){

  if ($this->request->post()) {
    $data  = $this->request->post();
    $res  =   Db::name($this->table)->where(['id'=> $data['id']])->update(['is_delete' => 1]);
    if ($res) {
       return $this->success('删除成功!');
    }else {
       return $this->error('删除失败!');
    }
  }
}


   //��ҳ�����ӿ�api
 public function seller(){




    //��ȡ����

    //var_dump($get);die;



    		/*$id=$this->getRequest()->getQuery('id',false);
    		$imgurl=$this->getRequest()->getQuery('imgurl',false);
    		 if(!$id||!$imgurl){
    		 	echo json_encode(array('status'=>1,'message'=>'ID�û�����һ��'));
    		 	return false;
    		 }*/

    //�ж�
    if($this->request->isGet()){
    $return=array(
     'status'=>1,
     'message'=>'����ʧ��'
     );
   //$GET=input('GET.');
   $GET=$_GET['id'];
   //var_dump($GET);die;
  // var_dump($GET);
    //�ж�
    if($GET){
    //���ݿ�������
    // $role=Db::->table('seller_essaylist')->select();

    //$role=Db::table('seller_essaylist')->alias('a')->join('seller_recommendshop b','a.imgurl= b.imgurl')->join('seller_recommendjob c','a.id= c.id')->select();
    //$role=Db::filed('seller_essaylist.id,seller_recommendjob.imgurl,seller_recommendshop.id')->table(['seller_essaylist'=>'id','seller_recommendshop'=>'id','seller_recommendjob'=>'imgurl'])->select();
    //var_dump($sql); die();

    $sql=Db::table('seller_recommendjob a')
            ->join('seller_essaylist b','a.id = b.sid')
            ->join('seller_recommendshop c','b.id=sid')
            //->field('a.id,a.jobname,a.salary,a.companyname,a.date,b.id as sid,b.imgurl')
            ->select();
        //���ݲ���
            $return['message']='ok';
            $return['status']=0;
            $return['data']=$sql;
            return json_encode($return);die;
    // var_dump(json_encode($return));die;
      // json()->send($return);
          }else{
    //���ؽ�������
    // var_dump($return);die;
             echo  json_encode($return);
           }
          }
        }
  }
 ?>
