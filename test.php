<?php


require   __DIR__ .'/vendor/autoload.php';
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);



 /**
  * @param $file docx文件路径
  * @return string 生成的html字符串
  * ---读取docx文档转换为html，仅保留段落，表格，文本框，不保留样式
  * by sdxjwkq
  */
   session_start();
   $dir = "./change";
   // if(!is_dir($dir)) return false;

     // $handle = opendir($dir);
     $result =   glob($dir.'/*.docx');
     $content =  [];
     $oldname =  [];
     $ids =300;

     // echo "<pre>";
     // var_dump(json_decode('["\u25a0 \u7528\u6237\u4f53\u9a8c\u7814\u7a76\u5458\u804c\u4e1a\u4ecb\u7ecd","\u25a0 \u7528\u6237\u4f53\u9a8c\u7814\u7a76\u5458\u5177\u4f53\u505a\u4ec0\u4e48","\u25a0\u7528\u6237\u4f53\u9a8c\u7814\u7a76\u5458\u5c31\u4e1a\u524d\u666f","\u25a0\u00a0 \u7528\u6237\u4f53\u9a8c\u7814\u7a76\u5458\u5bf9\u5e94\u7684\u5927\u5b66\u4e13\u4e1a"]'));
     // var_dump(json_decode('["\r\n\u5f8b\u5e08\u804c\u4e1a\u4ecb\u7ecd","\r\n\u5f8b\u5e08\u5177\u4f53\u505a\u4ec0\u4e48","\r\n\u5f8b\u5e08\u5c31\u4e1a\u524d\u666f","\r\n\u5f8b\u5e08\u5bf9\u5e94\u7684\u5927\u5b66\u4e13\u4e1a"]'));
     // // die;

     // unset($_SESSION["remark"]);die;
      // $res = exec('cmd d:\wamp\www\test\change\yucheng34.bat');
    if (empty($_SESSION["remark"])) {
      foreach ($result as $key => $v) {
         $result[$key] =  iconv('gb2312//IGNORE', 'utf-8' ,$v);
         $_SESSION["remark"][] = basename($result[$key],".docx");;

      }
      die;
    }
    // print_r($_SESSION["remark"]);die;


     foreach ($result as $key => $v) {
      // $path = pathinfo($result[$key]);
      //   //改成你自己想要的新名字
      // $newname = $path['dirname']."/".$key.".".$path['extension'];
       $result[$key] =  iconv('gb2312//IGNORE', 'utf-8' ,$v);
       echo "<pre>";


       // $res =  rename($result[$key],$newname);
       // if (!$res) {
       //     echo "失败!";
       // }

     // if($handle){
     //     while(($fl = readdir($handle)) !== false){
     //          $temp = iconv('GBK','utf-8',$dir.DIRECTORY_SEPARATOR.$fl);//转换成utf-8格式
      if (!is_dir($result[$key])){


       $file  =   $result[$key];

       $zip = new ZipArchive ( );
       if ($zip->open ($file) === TRUE ) {
           for($i = 0; $i < $zip->numFiles; $i ++) {
               $entry = $zip->getNameIndex ( $i );
               if (pathinfo ($entry,PATHINFO_BASENAME) == "document.xml") {
                   $zip->extractTo (pathinfo ($file, PATHINFO_DIRNAME ) . "/" . pathinfo ($file, PATHINFO_FILENAME ), array (
                           $entry
                   ) );
                   $filepath = pathinfo ($file, PATHINFO_DIRNAME ) . "/" . pathinfo ( $file, PATHINFO_FILENAME ) . "/" . $entry;
                   $contentall =  strip_tags ( file_get_contents ( $filepath ) );

                    // "职业介绍" ;
                   $contentall = str_replace('■',' ',$contentall);

                   $cutname =    substr($contentall,strpos($contentall,'职业介绍')+12);
                   $cutname  = substr($cutname,0,strpos($cutname, '具体做什么'));
                   $cutkey  =  strrchr($cutname, ' ');//空格后

                   if ($cutkey) {

                      $cutname   = substr($cutname,0,strpos($cutname, $cutkey));

                    }else {

                          $i =1;
                      while ($i <= strlen($cutname)) {
                        if ($cutname2 = substr($cutname,-$i)) {
                              if (strpos($cutname2,';') || strpos($cutname2,'；') ||strpos($cutname2,'。')||strpos($cutname2,'.')) {
                                $cutname  = substr($cutname,0,strpos($cutname, $cutname2)+1);
                                  break;
                              }
                             $i++;
                        }
                      }
                    }



                   $content[$key]['content'][]  = $cutname;
                   $content[$key]['cat'] = "";
                   $content[$key]['remark'] = "";
                   $catkey = substr($contentall,0,strpos($contentall, ' '));
                   $catkey = trim($catkey);
                   $catkey = trim($catkey,'■');
                   $content[$key]['oldname'] =  $catkey;

                   foreach ($_SESSION["remark"] as $key3 => $value3) {

                         if (strstr($value3,$catkey) !=false){
                           // echo $value3;
                           $content[$key]['cat'] =  substr($_SESSION['remark'][$key3],0,strpos($_SESSION['remark'][$key3],$catkey));
                           $content[$key]['remark'] = $value3;
                         }
                   }

                   if ($content[$key]['remark'] == '') {
                      $cutkey_old  = substr($contentall,0,strpos($contentall, '职业介绍'));
                      $cutkey_old2  = substr($cutkey_old,0,8);
                      $cutkey_old2 = trim($cutkey_old2);
                      $catkey = substr($cutkey_old,0,strrpos($cutkey_old,$cutkey_old2));
                      $catkey = trim($catkey);
                      $content[$key]['oldname'] =  $catkey;
                      foreach ($_SESSION["remark"] as $key4 => $value4) {

                         if (strstr($value4,$catkey) !=false){

                              $content[$key]['cat'] =  substr($_SESSION['remark'][$key4],0,strpos($_SESSION['remark'][$key4],$catkey));
                              // echo $value4;
                              $content[$key]['remark'] = $value4;
                            }
                      }
                   }
                   $content[$key]['title'][]  = $content[$key]['oldname'].'职业介绍' ;
                   $content[$key]['title'][]  = $content[$key]['oldname'].'具体做什么' ;
                   $content[$key]['title'][]  = $content[$key]['oldname'].'就业前景' ;
                   $content[$key]['title'][]  = $content[$key]['oldname'].'对应的大学专业' ;

                   // $content[$key]['cat'] = substr($content[$key]['remark'],0,strpos($content[$key]['remark'],$catkey));
                   // echo  $content[$key]['cat'];
                   //具体做什么
                   $cutname = substr($contentall,strpos($contentall,'具体做什么')+15);
                   $cutname = substr($cutname,0,strpos($cutname, '就业前景'));

                   $cutkey  = strrchr($cutname, ' ');//空格后
                   if ($cutkey) {

                      $cutname   = substr($cutname,0,strpos($cutname, $cutkey));

                    }else {

                          $i =1;
                      while ($i <= strlen($cutname)) {
                        if ($cutname2 = substr($cutname,-$i)) {
                              if (strpos($cutname2,';') || strpos($cutname2,'；') ||strpos($cutname2,'。')||strpos($cutname2,'.')) {
                                $cutname  = substr($cutname,0,strpos($cutname, $cutname2)+1);
                                  break;
                              }
                             $i++;
                        }
                      }
                    }
                   // $cutname = substr($cutname,0,strpos($cutname, $cutkey));

                   $content[$key]['content'][]  = $cutname;

                   //就业前景
                   $cutname =    substr($contentall,strpos($contentall,'就业前景')+12);
                   $cutname  = substr($cutname,0,strpos($cutname, '对应的大学专业'));
                   $cutkey  =  strrchr($cutname, ' ');//空格后
                   if ($cutkey) {
                     $cutname   = substr($cutname,0,strpos($cutname, $cutkey));
                   }else {
                         $i =1;
                     while ($i <= strlen($cutname)) {
                       if ($cutname2 = substr($cutname,-$i)) {
                             if (strpos($cutname2,';') || strpos($cutname2,'；') ||strpos($cutname2,'。')||strpos($cutname2,'.')) {
                               $cutname  = substr($cutname,0,strpos($cutname, $cutname2)+1);
                                 break;
                             }
                            $i++;
                       }
                     }
                   }
                   // $cutname   = substr($cutname,0,strpos($cutname, $cutkey));

                    $content[$key]['content'][]  = $cutname;
                    //对应的大学专业
                    $cutname =    substr($contentall,strpos($contentall,'对应的大学专业')+21);

                    $content[$key]['content'][]  = $cutname;





                   // $cutname =   substr($content2,$pos1+10,$pos2-12);
                   // echo $cutname;
                   break;
               }
           }
           $zip->close ();

       }
       else {

           echo '<hr>no';
       }
     }

}
 // var_dump($content);die;
  foreach ($content as $key => $value) {
      foreach ($value as $key2 => $value2) {
          if ($key2 == 'title' || $key2 == 'content') {
              $content[$key][$key2] = addslashes(json_encode($value2));
          }
      }
  }

 //
 // var_dump($content);
 // die;
 $myfile = fopen("./word/newfile.txt", "w") or die("Unable to open file!");
 $ctime =  date('Y-m-d H:i:s',time());

 foreach ($content as $key => $value) {
    $id = $ids+$key;
    $filetxt =  "INSERT INTO `subject_assess`(id,remark,title,content,create_at)  VALUES($id,'{$value['remark']}','{$value['title']}','{$value['content']}','$ctime');";
    if (strpos($value['cat'],'／')) {
      $cat1 =   substr($value['cat'],0,strpos($value['cat'],'／'));
      $cat2 =   substr($value['cat'],strpos($value['cat'],'／')+3);
      $filetxt2 =  "INSERT INTO `subject_vocation`(name,type,assess_id,create_at)  VALUES('{$value['oldname']}','$cat1',$id,'$ctime');";
      $filetxt2 .=  "INSERT INTO `subject_vocation`(name,type,assess_id,create_at)  VALUES('{$value['oldname']}','$cat2',$id,'$ctime');";
    }elseif (strpos($value['cat'],'_')) {
      $cat1 =   substr($value['cat'],0,strpos($value['cat'],'_'));
      $cat2 =   substr($value['cat'],strpos($value['cat'],'_')+1);
      $filetxt2 =  "INSERT INTO `subject_vocation`(name,type,assess_id,create_at)  VALUES('{$value['oldname']}','$cat1',$id,'$ctime');";
      $filetxt2 .=  "INSERT INTO `subject_vocation`(name,type,assess_id,create_at)  VALUES('{$value['oldname']}','$cat2',$id,'$ctime');";
    }
    else {
      $filetxt2 =  "INSERT INTO `subject_vocation`(name,type,assess_id,create_at)  VALUES('{$value['oldname']}','{$value['cat']}',$id,'$ctime');";
    }
    $txt = $filetxt."\n".$filetxt2;

    if(fwrite($myfile, $txt)){
       echo "写入成功!"."<pre>";
    }
 }

fclose($myfile);
