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




try {
  $ast = $parser->parse($code);
  $ast = $traverser->traverse($ast);
  $test_me =  $prettyPrinter->prettyPrint($ast);
  // var_dump($test_me);die;
  // $dumper = new NodeDumper;
  //
  // echo "<pre>";
  // echo $dumper->dump($ast);die;

 $startdata = '';
 $newdata = [];


  foreach ($ast as $key => $value) {
    $startdata =  $ast[0]->name->name;

    if (get_class($value) == 'PhpParser\Node\Stmt\Goto_') {
         // var_dump($key);
         // var_dump($value->name);
    }
    if (get_class($value) == 'PhpParser\Node\Stmt\Label'){
         // var_dump($key);
         // $newdata[$value->name->name] = $ast[$key+1];
         if (get_class($ast[$key+1]) != 'PhpParser\Node\Stmt\Goto_') {
              $newdata[$value->name->name] =   $ast[$key+1] ;
              $ast[$key+1]->name->nextgoto  =  &$ast[$key+2]->name->name;
         }


      }
         // var_dump(get_class($value));
  }


  $firset_data = [];
  $nextgoto_old = '';

  // MYGOD:

  // foreach ($newdata as $key => $value) {
  //     if (!empty($value->name->nextgoto)) {
  //        var_dump($value->name->nextgoto);
  //    }
  // }

  foreach ($newdata as $key => $value) {
      if (empty($value->name->nextgoto)) {
         $newdata[$key]->name->nextgoto = null;
      }
  }

  foreach ($newdata as $key => $value) {
      if ($key == $startdata) {
          $firset_data[] = $value;
          $nextgoto_old =  $value->name->nextgoto;
      }
  }

  $res =  $this->checkdata($firset_data,$newdata,$nextgoto_old);

  // foreach ( as $key => $value) {
  //   // code...
  // }
  $test_code =  $prettyPrinter->prettyPrint($res);
  $code = "<?php"."\n".$test_code;
  // var_dump($code);die;

  $ast = $parser->parse($code);
  $ast = $traverser->traverse($ast);

//ClassMethod

  foreach ($ast as $key => $value) {
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
                  // if (get_class($value2->stmts[0]=='PhpParser\Node\Stmt\Goto_')) {
                  // }
                  // $startdata = '';
                  if (get_class($value99) == 'PhpParser\Node\Stmt\Label'){
                       // var_dump($value99);die;
                       // $newdata[$value->name->name] = $ast[$key+1];
                        if (!empty($value2->stmts[$key99+1])) {
                          if (get_class($value2->stmts[$key99+1]) != 'PhpParser\Node\Stmt\Goto_') {
                               $newdata_new[$value99->name->name] =   $value2->stmts[$key99+1] ;
                               $value2->stmts[$key99+1]->name->nextgoto  =  &$value2->stmts[$key99+2]->name->name;
                           }
                        }else {
                               $newdata_new[$value99->name->name] = $value2->stmts[$key99];
                               // $value2->stmts[$key99]->name->nextgoto = null;
                        }
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
                // var_dump($test_code);
                // die;
              $res =  $this->checkdata($firset_data,$newdata_new,$nextgoto_old);
              // var_dump($prettyPrinter->prettyPrint($res));
              // die;
              $ast[$key]->stmts[$key2]->stmts  =   $res;

            }


            }
        }
      }
  }
// die;
  // var_dump($ast);die;
  $test_code =  $prettyPrinter->prettyPrint($ast);
  $code = "<?php"."\n".$test_code;
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

echo "<pre>";
echo $dumper->dump($ast);



  }


  public  function checkdata($firset_data,$newdata,$nextgoto_new){
    MYGOD:
    foreach ($newdata as $key2 => $value2) {
        if ($nextgoto_new == $key2) {
            $firset_data[] = $value2;
            if (!empty($value2->name->nextgoto)){
                  $nextgoto_new =  $value2->name->nextgoto;
                  goto MYGOD;
                }
             }
         }
       return  $firset_data;
    }


}
