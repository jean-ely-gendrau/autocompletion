<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . "../../vendor/autoload.php");

session_start();

use App\Autocompletion\Components\CrudManager;
//use App\Autocompletion\Components\CommentsModel;
use App\Autocompletion\Components\FoodsOpens;

header('Content-type: application/json; charset=UTF-8;');

if (!empty($_POST['action']) && $_POST['action'] === 'search' && !empty($_POST['likeSearch'])) :
  $crudManager = new CrudManager('foodsopens', FoodsOpens::class);
  $likeSearch = "%" . htmlspecialchars(trim($_POST['likeSearch'])) . "%";

  // var_dump($crudManager->getAll());
  /*
  $result = array_map(function ($object) {

    return json_encode($object, JSON_FORCE_OBJECT |  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
  }, $crudManager->getAll());
*/
  //var_dump(json_encode($result));
  echo json_encode($crudManager->getByLike(['search' => $likeSearch, 'json' => json_encode(['nutriscore_grade' => 'a'])], 'product_name'), JSON_FORCE_OBJECT |  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
  exit();
else :
  echo json_encode(false);
  exit();
endif;
