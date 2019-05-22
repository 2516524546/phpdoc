<?php
 //批量增加高效优化
  foreach ($data as $key => $value) {
          foreach ($value as $key2 => $value2) {
             // $data = ['uid' => session('user.id'), 'imei' => $value2['imei']];
             $uid =  session('user.id');
             $imei = $value2['imei'];
             if($key2==0){
                $sql.="($imei,$uid)";
                }else{
                $sql.=",($imei,$uid)";
                }
          }
        }
        Db::execute("INSERT INTO `dindanwx`.`store_imem` ( `imei`, `uid`) VALUES $sql ");
