<?php
namespace app\acquiring\controller;

use PhpParser\Error;
use PhpParser\NodeDumper;
use PhpParser\ParserFactory;
use PhpParser\NodeTraverser;
use PhpParser\PrettyPrinter;
use PhpParser\NodeVisitor;
use PhpParser\Node;
use PhpParser\Node\Stmt\Function_;
use PhpParser\NodeVisitorAbstract;

class Count {

public function index()
{

$fileName ='old.php';
$code = file_get_contents(__DIR__.'/'.$fileName);

$parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
$traverser     = new NodeTraverser();
$prettyPrinter = new PrettyPrinter\Standard;


// echo "<style>body{ background-color:#0C0C0C; color:green} font{  color: green;} </style>";



try {



  $ast = $parser->parse($code);
  $ast = $traverser->traverse($ast);

  // halt($ast);
  $test_me =  $prettyPrinter->prettyPrint($ast);


  // halt($code2);
  // $test_me =  $prettyPrinter->prettyPrint($test_me);
  // var_dump($test_me);die;

  // $dumper = new NodeDumper;
  //
  // echo "<pre>";
  // echo $dumper->dump($ast);die;

  // $newdata = [];

  $ast =  $this->check_two_data($ast);
  // $ast =  $prettyPrinter->prettyPrint($ast);
  // // $ast = $traverser->traverse($ast);

  $newdata = [];
  $alldata =  $this->check_first_data($ast,$newdata);

  $newdata = $alldata['newdata'];
  // halt($ast);
  // halt($newdata);
  // $ast =  $prettyPrinter->prettyPrint($newdata);
  // halt($newdata);
  $newdata = $this->chekif($newdata,2);

  if (!empty($alldata['startdata'])){
    // code...
    $startdata = $alldata['startdata'];
    // halt($newdata);
    $firset_data = [];
    $nextgoto_old = '';
    foreach ($newdata as $key => $value) {
        if ($key == $startdata) {
            $firset_data[] = $value;
            $nextgoto_old =  $value->name->nextgoto;
        }
    }
    // halt($firset_data);
    $res =  $this->checkdata2($firset_data,$newdata,$nextgoto_old);

  }else {
     $res = $ast;
  }


  // foreach ( as $key => $value) {
  //   // code...

  // foreach ($res as $key => $value) {
  //
  // }
  $test_code =  $prettyPrinter->prettyPrint($res);
  $code = "<?php"."\n".$test_code;
  // echo "<style>body{ background-color:#0C0C0C; }</style>";
  var_dump($code);die;

die;


  // var_dump($code);die;
  // echo "<pre>";

  // $newdata[] = explode("function ", $test_code);
  // // var_dump($newdata);die;
  // echo $test_code;
} catch (Error $error) {
    echo "Parse error: {$error->getMessage()}\n";
    return;
}



$dumper = new NodeDumper;

// echo "<pre>";
// echo $dumper->dump($ast);



  }

  public function check_two_data($ast){

    foreach ($ast as $key => $value) {

      if (get_class($ast[$key]) == 'PhpParser\Node\Stmt\Function_') {
            // foreach ($ast[$key] as $key2 => $value2) {
                          if (!empty($value->stmts[0]->name->name)) {
                          $startdata =  $value->stmts[0]->name->name;
                          // var_dump($startdata);die;
                          $newdata_new = [] ;
                          $firset_data = [] ;
                          $nextgoto_old = '';
                          foreach ($value->stmts as $key99 => $value99) {
                            if (get_class($value99) == 'PhpParser\Node\Stmt\Foreach_') {
                                      $fore_arry[0]=$value99;
                                      // halt($fore_arry);
                                      $value2->stmts[$key99] = $this->check_two_data($fore_arry);
                            }
                            // $startdata = '';

                            if (get_class($value99) == 'PhpParser\Node\Stmt\Label'){
                                 // var_dump($value99);die;
                                 // $newdata[$value->name->name] = $ast[$key+1];
                                  if (!empty($value->stmts[$key99+1])) {
                                    if (get_class($value->stmts[$key99+1]) != 'PhpParser\Node\Stmt\Goto_') {
                                         $newdata_new[$value99->name->name] =   $value->stmts[$key99+1] ;
                                         $value->stmts[$key99+1]->name->nextgoto  =  &$value->stmts[$key99+2]->name->name;
                                     }if (get_class($value->stmts[$key99-1]) == 'PhpParser\Node\Stmt\Label' && get_class($value->stmts[$key99+1]) == 'PhpParser\Node\Stmt\Goto_') {
                                       $newdata_new[$value99->name->name] =   $value->stmts[$key99+1] ;
                                       $value->stmts[$key99+1]->name->nextgoto  =  &$value->stmts[$key99+1]->name->name;
                                     }if (get_class($value->stmts[$key99-1]) != 'PhpParser\Node\Stmt\Label' && get_class($value->stmts[$key99+1]) == 'PhpParser\Node\Stmt\Goto_') {
                                       $newdata_new[$value99->name->name] =         $value->stmts[$key99+1] ;
                                       $value->stmts[$key99+1]->name->nextgoto  =  &$value->stmts[$key99+1]->name->name;
                                     }
                                  }
                                  // else {
                                  //        $newdata_new[$value99->name->name] = $value2->stmts[$key99];
                                  //        // $value2->stmts[$key99]->name->nextgoto = null;
                                  // }
                              }

                          }

                          foreach ($newdata_new as $key998 => $value998) {
                              if (empty($value998->name->nextgoto)) {
                                  // var_dump($value998->name);die;
                                 $newdata_new[$key998]->name->nextgoto = null;
                              }
                          }
                          // var_dump($newdata_new);die;
                          foreach ($newdata_new as $key996 => $value996) {
                              if ($key996 == $startdata) {
                                  // var_dump($key996);die;
                                  $firset_data[] = $value996;
                                  $nextgoto_old =  $value996->name->nextgoto;
                              }
                          }
                          // $test_code =  $prettyPrinter->prettyPrint($newdata_new);
                          // halt($newdata_new);
                          $newdata_new = $this->chekif($newdata_new,2);
                          // var_dump($newdata_new);
                          $res =  $this->checkdata2($firset_data,$newdata_new,$nextgoto_old);
                          // var_dump($prettyPrinter->prettyPrint($res));
                          // die;
                          // halt($res);
                          $ast[$key]->stmts = $res;

                      }


      }

      if (get_class($ast[$key]) == 'PhpParser\Node\Stmt\Foreach_') {
            // foreach ($ast[$key] as $key2 => $value2) {
                          if (!empty($value->stmts[0]->name->name)) {
                          $startdata =  $value->stmts[0]->name->name;
                          // var_dump($startdata);die;
                          $newdata_new = [] ;
                          $firset_data = [] ;
                          $nextgoto_old = '';
                          foreach ($value->stmts as $key99 => $value99) {
                            if (get_class($value99) == 'PhpParser\Node\Stmt\Foreach_') {
                                      $fore_arry[0]=$value99;
                                      // halt($fore_arry);
                                      $value2->stmts[$key99] = $this->check_two_data($fore_arry);
                            }
                            // $startdata = '';

                            if (get_class($value99) == 'PhpParser\Node\Stmt\Label'){
                                 // var_dump($value99);die;
                                 // $newdata[$value->name->name] = $ast[$key+1];
                                  if (!empty($value->stmts[$key99+1])) {
                                    if (get_class($value->stmts[$key99+1]) != 'PhpParser\Node\Stmt\Goto_') {
                                         $newdata_new[$value99->name->name] =   $value->stmts[$key99+1] ;
                                         $value->stmts[$key99+1]->name->nextgoto  =  &$value->stmts[$key99+2]->name->name;
                                     }if (get_class($value->stmts[$key99-1]) == 'PhpParser\Node\Stmt\Label' && get_class($value->stmts[$key99+1]) == 'PhpParser\Node\Stmt\Goto_') {
                                       $newdata_new[$value99->name->name] =   $value->stmts[$key99+1] ;
                                       $value->stmts[$key99+1]->name->nextgoto  =  &$value->stmts[$key99+1]->name->name;
                                     }if (get_class($value->stmts[$key99-1]) != 'PhpParser\Node\Stmt\Label' && get_class($value->stmts[$key99+1]) == 'PhpParser\Node\Stmt\Goto_') {
                                       $newdata_new[$value99->name->name] =         $value->stmts[$key99+1] ;
                                       $value->stmts[$key99+1]->name->nextgoto  =  &$value->stmts[$key99+1]->name->name;
                                     }

                                  }
                                  // else {
                                  //        $newdata_new[$value99->name->name] = $value2->stmts[$key99];
                                  //        // $value2->stmts[$key99]->name->nextgoto = null;
                                  // }
                              }

                          }

                          foreach ($newdata_new as $key998 => $value998) {
                              if (empty($value998->name->nextgoto)) {
                                  // var_dump($value998->name);die;
                                 $newdata_new[$key998]->name->nextgoto = null;
                              }
                          }
                          // var_dump($newdata_new);die;
                          foreach ($newdata_new as $key996 => $value996) {
                              if ($key996 == $startdata) {
                                  // var_dump($key996);die;
                                  $firset_data[] = $value996;
                                  $nextgoto_old =  $value996->name->nextgoto;
                              }
                          }
                          // $test_code =  $prettyPrinter->prettyPrint($newdata_new);
                          // halt($newdata_new);
                          $newdata_new = $this->chekif($newdata_new,2);
                          // var_dump($newdata_new);
                          $res =  $this->checkdata2($firset_data,$newdata_new,$nextgoto_old);
                          // var_dump($prettyPrinter->prettyPrint($res));
                          // die;
                          // halt($res);
                          $ast[$key]->stmts = $res;

                      }


      }


          if (get_class($ast[$key]) == 'PhpParser\Node\Stmt\Switch_') {
                foreach ($ast[$key]->cases as $key2 => $value2) {
                              if (!empty($value2->stmts[0]->name->name)) {
                              $startdata =  $value2->stmts[0]->name->name;
                              // var_dump($startdata);die;
                              $newdata_new = [] ;
                              $firset_data = [] ;
                              $fore_arry = [];
                              $nextgoto_old = '';
                              foreach ($value2->stmts as $key99 => $value99) {
                                if (get_class($value99) == 'PhpParser\Node\Stmt\Foreach_') {
                                          $fore_arry[0]=$value99;
                                          // halt($fore_arry);
                                          $value2->stmts[$key99] = $this->check_two_data($fore_arry);
                                }
                                // $startdata = '';
                                if (get_class($value99) == 'PhpParser\Node\Stmt\Label'){
                                     // var_dump($value99);die;
                                     // $newdata[$value->name->name] = $ast[$key+1];
                                      if (!empty($value2->stmts[$key99+1])) {
                                        if (get_class($value2->stmts[$key99+1]) != 'PhpParser\Node\Stmt\Goto_') {
                                             $newdata_new[$value99->name->name] =   $value2->stmts[$key99+1] ;
                                             $value2->stmts[$key99+1]->name->nextgoto  =  &$value2->stmts[$key99+2]->name->name;
                                         }if (get_class($value2->stmts[$key99-1]) == 'PhpParser\Node\Stmt\Label' && get_class($value2->stmts[$key99+1]) == 'PhpParser\Node\Stmt\Goto_') {
                                           $newdata_new[$value99->name->name] =   $value2->stmts[$key99+1] ;
                                           $value2->stmts[$key99+1]->name->nextgoto  =  &$value2->stmts[$key99+1]->name->name;
                                         }if (get_class($value2->stmts[$key99-1]) != 'PhpParser\Node\Stmt\Label' && get_class($value2->stmts[$key99+1]) == 'PhpParser\Node\Stmt\Goto_') {
                                           $newdata_new[$value99->name->name] =         $value2->stmts[$key99+1] ;
                                           $value2->stmts[$key99+1]->name->nextgoto  =  &$value2->stmts[$key99+1]->name->name;
                                         }

                                      }
                                      // else {
                                      //        $newdata_new[$value99->name->name] = $value2->stmts[$key99];
                                      //        // $value2->stmts[$key99]->name->nextgoto = null;
                                      // }
                                  }

                              }

                              foreach ($newdata_new as $key998 => $value998) {
                                  if (empty($value998->name->nextgoto)) {
                                      // var_dump($value998->name);die;
                                     $newdata_new[$key998]->name->nextgoto = null;
                                  }
                              }
                              // var_dump($newdata_new);die;
                              foreach ($newdata_new as $key996 => $value996) {
                                  if ($key996 == $startdata) {
                                      // var_dump($key996);die;
                                      $firset_data[] = $value996;
                                      $nextgoto_old =  $value996->name->nextgoto;
                                  }
                              }
                              // $test_code =  $prettyPrinter->prettyPrint($newdata_new);
                              // halt($newdata_new);
                              $newdata_new = $this->chekif($newdata_new,2);
                              // var_dump($newdata_new);
                              $res =  $this->checkdata2($firset_data,$newdata_new,$nextgoto_old);
                              // var_dump($prettyPrinter->prettyPrint($res));
                              // die;
                              // halt($res);
                              $ast[$key]->cases[$key2]->stmts = $res;

                          }
                }
          }


         if (get_class($ast[$key]) == 'PhpParser\Node\Stmt\Class_') {
          foreach ($ast[$key]->stmts as $key2 => $value2) {
              if (get_class($value2) == 'PhpParser\Node\Stmt\ClassMethod') {
                  if (!empty($value2->stmts[0]->name->name)) {
                  $startdata =  $value2->stmts[0]->name->name;
                  // var_dump($startdata);die;
                  $newdata_new = [] ;
                  $firset_data = [] ;
                  $nextgoto_old = '';
                  foreach ($value2->stmts as $key99 => $value99) {
                    if (get_class($value99) == 'PhpParser\Node\Stmt\Foreach_') {
                              $fore_arry[0]=$value99;
                              // halt($fore_arry);
                              $value2->stmts[$key99] = $this->check_two_data($fore_arry);
                    }
                    // $startdata = '';
                    if (get_class($value99) == 'PhpParser\Node\Stmt\Label'){
                         // var_dump($value99);die;
                         // $newdata[$value->name->name] = $ast[$key+1];

                          if (!empty($value2->stmts[$key99+1] && !empty($value2->stmts[$key99+2]))) {
                            if (get_class($value2->stmts[$key99+1]) != 'PhpParser\Node\Stmt\Goto_') {
                                 $newdata_new[$value99->name->name] =   $value2->stmts[$key99+1] ;
                                 $value2->stmts[$key99+1]->name->nextgoto  =  &$value2->stmts[$key99+2]->name->name;
                             }if (get_class($value2->stmts[$key99-1]) == 'PhpParser\Node\Stmt\Label' && get_class($value2->stmts[$key99+1]) == 'PhpParser\Node\Stmt\Goto_') {
                               $newdata_new[$value99->name->name] =   $value2->stmts[$key99+1] ;
                               $value2->stmts[$key99+1]->name->nextgoto  =  &$value2->stmts[$key99+1]->name->name;
                             }if (get_class($value2->stmts[$key99-1]) != 'PhpParser\Node\Stmt\Label' && get_class($value2->stmts[$key99+1]) == 'PhpParser\Node\Stmt\Goto_') {
                               $newdata_new[$value99->name->name] =         $value2->stmts[$key99+1] ;
                               $value2->stmts[$key99+1]->name->nextgoto  =  &$value2->stmts[$key99+1]->name->name;
                             }

                          }
                          // else {
                          //        $newdata_new[$value99->name->name] = $value2->stmts[$key99];
                          //        // $value2->stmts[$key99]->name->nextgoto = null;
                          // }
                      }

                  }

                  foreach ($newdata_new as $key998 => $value998) {
                      if (empty($value998->name->nextgoto)) {
                         // var_dump($value998->name);die;
                         $newdata_new[$key998]->name->nextgoto = null;
                      }
                  }
                  // var_dump($newdata_new);die;
                  foreach ($newdata_new as $key996 => $value996) {
                      if ($key996 == $startdata) {
                        // var_dump($key996);die;
                          $firset_data[] = $value996;
                          $nextgoto_old =  $value996->name->nextgoto;
                      }
                  }
                  // $test_code =  $prettyPrinter->prettyPrint($newdata_new);
                  // halt($newdata_new);
                  $newdata_new = $this->chekif($newdata_new,2);
                  // var_dump($newdata_new);
                  $res =  $this->checkdata2($firset_data,$newdata_new,$nextgoto_old);
                  // var_dump($prettyPrinter->prettyPrint($res));
                  // die;
                  $ast[$key]->stmts[$key2]->stmts  =   $res;

              }


            }

          }
        }

    }

    return $ast;


  }

  public function check_first_data($ast,$newdata){

    foreach ($ast as $key => $value) {
      if (get_class($value) == 'PhpParser\Node\Stmt\Goto_' && empty($startdata)) {
            $startdata =  $ast[$key]->name->name;
            $alldata['startdata'] = $startdata;
      }
      if (get_class($value) == 'PhpParser\Node\Stmt\Goto_') {
           // var_dump($key);
           // var_dump($value->name);
      }
      if (get_class($value) == 'PhpParser\Node\Stmt\Label'){
           // var_dump($key);
           // $newdata[$value->name->name] = $ast[$key+1];
          if (!empty($ast[$key+1]) && !empty($ast[$key+2])) {

              if (get_class($ast[$key+1]) != 'PhpParser\Node\Stmt\Goto_') {
                   $newdata[$value->name->name] =   $ast[$key+1] ;
                   $ast[$key+1]->name->nextgoto  =  &$ast[$key+2]->name->name;
              }if (get_class($ast[$key-1]) == 'PhpParser\Node\Stmt\Label' && get_class($ast[$key+1]) == 'PhpParser\Node\Stmt\Goto_') {
                 $newdata[$value->name->name] =   $ast[$key+1] ;
                 $ast[$key+1]->name->nextgoto  =  &$ast[$key+1]->name->name;
              }if (get_class($ast[$key-1]) != 'PhpParser\Node\Stmt\Label' && get_class($ast[$key+1]) == 'PhpParser\Node\Stmt\Goto_') {
                 $newdata[$value->name->name] =   $ast[$key+1] ;
                 $ast[$key+1]->name->nextgoto  =  &$ast[$key+1]->name->name;
              }
         }
         // else {
         //      $newdata[$value->name->name] = $ast[$key];
         // }
      }
           // var_dump(get_class($value));
    }



    foreach ($newdata as $key => $value) {
        if (empty($value->name->nextgoto)) {
           $newdata[$key]->name->nextgoto = null;
        }
    }

    // $newdata = $this->chekif($newdata);

    // halt($newdata);
    $alldata['newdata'] = $newdata;

    return $alldata;

  }




  public  function checkdata($firset_data,$newdata,$nextgoto_new){
    MYGOD:
    foreach ($newdata as $key2 => $value2) {
        if ($nextgoto_new == $key2) {
            // if (get_class($value2) != 'PhpParser\Node\Stmt\Goto_') {
              // code...
              $firset_data[] = $value2;
            // }
            if (!empty($value2->name->nextgoto)){
                  $nextgoto_new =  $value2->name->nextgoto;
                  goto MYGOD;
                }
             }
         }
       return  $firset_data;
    }

    public  function checkdata2($firset_data,$newdata,$nextgoto_new){
      MYGOD:
      foreach ($newdata as $key2 => $value2) {
          if ($nextgoto_new == $key2) {
              if (get_class($value2) != 'PhpParser\Node\Stmt\Goto_' && get_class($value2) != 'PhpParser\Node\Stmt\Label') {
                // code...
                $firset_data[] = $value2;
              }if (get_class($value2) == 'PhpParser\Node\Stmt\Return_') {
                // code...
                   goto MYGOD2;
              }
              if (!empty($value2->expr)) {
                  if (get_class($value2->expr) == 'PhpParser\Node\Expr\Exit_'){
                    // code...
                      // var_dump(get_class($value2->expr));
                      goto MYGOD2;
                  }
              }
              if (!empty($value2->name->nextgoto)){
                    $nextgoto_new =  $value2->name->nextgoto;
                    goto MYGOD;
                  }
               }
           }
         MYGOD2:
         return  $firset_data;
      }

 public function chekif($newdata,$num){
   foreach ($newdata as $key => $value) {
    if (get_class($value) == 'PhpParser\Node\Stmt\If_' || get_class($value) == 'PhpParser\Node\Stmt\Foreach_' ) {

        // halt($value);
      if (!empty($value ->stmts[0]->name->name)) {
           foreach ($newdata as $key996 => $value996) {
             if ($key996  == $value->stmts[0]->name->name) {
               // if (empty($this->checkdata_if($newdata,$key996))) {
               //   var_dump($newdata);
               //     var_dump($key996);
               // //   halt($this->checkdata_if($newdata,$key996));
               // // }
                   $firset_data = [];
                   // var_dump($this->checkdata($firset_data,$newdata,$key996));
                   // if (empty($this->checkdata($firset_data,$newdata,$key996))) {
                      // var_dump($key996);
                      // halt($this->checkdata($firset_data,$newdata,$key996));
                      // var_dump($key996);
                      // var_dump($this->checkdata($firset_data,$newdata,$key996));
                    if ($num == 2) {
                      // halt($this->checkdata($firset_data,$newdata,$key996));
                        // $newdata[$key]->stmts = $this->checkdata2($firset_data,$newdata,$key996);
                        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
                        $prettyPrinter = new PrettyPrinter\Standard;
                        $code2 = '<?php return false;' ;
                        $code2 = $parser->parse($code2);

                        // if (!empty($this->checkdata2($firset_data,$newdata,$key996))) {
                        //       // var_dump($newdata[$key]->stmts  );
                        //       var_dump($key996);
                        //       $newdata[$key]->stmts  = $this->checkdata2($firset_data,$newdata,$key996);
                        //       var_dump($newdata[$key]->stmts);
                        //
                        //       $test_me =  $prettyPrinter->prettyPrint($newdata[$key]->stmts);
                        //       var_dump($test_me);
                        //
                        // }
                        $newdata[$key]->stmts  =  !empty($this->checkdata2($firset_data,$newdata,$key996)) ? $this->checkdata2($firset_data,$newdata,$key996) : $code2;
                        // var_dump($newdata[$key]->stmts);

                      // var_dump($newdata[$key]->stmts);
                    }else {
                      $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
                      $code2 = '<?php return false;' ;
                      $code2 = $parser->parse($code2);
                      $newdata[$key]->stmts  =  !empty($this->checkdata($firset_data,$newdata,$key996)) ? $this->checkdata($firset_data,$newdata,$key996) : $code2;
                    }
                   break;
               }
           }
           // return ($value ->stmts[0]->name->name);
       }
     }

   }
          return $newdata;
 }


 public  function checkdata_if($newdata,$nextgoto_new){

   foreach ($newdata as $key2 => $value2) {
     if ($nextgoto_new == $key2) {
        // var_dump($nextgoto_new);
       if (get_class($value2) == 'PhpParser\Node\Stmt\Goto_') {
           if (!empty($value2->name->nextgoto)){
                  $nextgoto_new =  $value2->name->nextgoto;
                  return  $this->checkdata_if($newdata,$nextgoto_new);
               }
            }else {
                 return $value2;
            }
        }
      }

   }




}
