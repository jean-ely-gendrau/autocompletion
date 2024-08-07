<?php

namespace App\Autocompletion\Components;

use App\Autocompletion\Components\BddConnect;

/**
 * CrudManager
 */
class CrudManager extends BddConnect
{
  /**
   * _tableName
   *
   * @var string
   */
  private $_tableName;

  /**
   * _objectClass
   *
   * @var string
   */
  private $_objectClass;

  /**
   * _dbConnect
   *
   * @var object
   */
  protected $_dbConnect;

  /**
   * Method __construct
   *
   * @param $tableName [nom de la table]
   * @param $objectClass [La class representant les données de la requête]
   * @param $configDatabase [configuration de la  base de données]
   *
   * @return void
   */
  public function __construct(string $tableName, string $objectClass, $configDatabase = null)
  {
    parent::__construct($configDatabase);
    $this->_tableName = $tableName;
    $this->_objectClass = $objectClass;
    $this->_dbConnect = $this->linkConnect();
  }

  /**
   * Method getConnectBdd
   * 
   * Instance de la connection PDO
   * 
   * @return void
   */
  public function getConnectBdd(): object
  {
    return $this->_dbConnect;
  }

  /**
   * Method getByLike
   *
   * @return array
   */
  public function getByLike(mixed $search, string $columnLike): array
  {
    $arraySelectSql = ['search' => $search['search'], 'valueSelected' => 'a', 'itemSelectedStart' => '"nutriscore_grade": "', 'itemSelectedEnd' => '", '];

    // SQL ^5.7 req = $this->_dbConnect->prepare("SELECT * FROM " . $this->_tableName . " WHERE {$columnLike} LIKE :search AND JSON_CONTAINS(`jsonFood`, :json) LIMIT 10");

    $req = $this->_dbConnect->prepare('SELECT *, SUBSTRING_INDEX(SUBSTRING_INDEX(jsonFood, :itemSelectedStart, -1), :itemSelectedEnd, 1) AS item_selected ' .
      'from foodsopens WHERE ' . $columnLike . ' LIKE :search ' .
      'having item_selected = :valueSelected LIMIT 6');

    // $req->execute($search);
    $req->execute($arraySelectSql);
    $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->_objectClass);

    return $req->fetchAll();
  }

  /**
   * Method getById
   *
   * @param string $id [id de la requête]
   *
   * @return object
   */
  public function getById(string $id): object
  {
    $req = $this->_dbConnect->prepare("SELECT * FROM " . $this->_tableName . " WHERE id = :id");
    $req->execute(array("id" => intval($id)));
    $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->_objectClass);

    return $req->fetch();
  }

  /**
   * Method getAll
   *
   * @return array
   */
  public function getAll(): array
  {
    $req = $this->_dbConnect->prepare("SELECT * FROM " . $this->_tableName);
    $req->execute();
    $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->_objectClass);

    return $req->fetchAll();
  }

  /**
   * Method getByEmail
   *
   * @param string $email [email de correspondance]
   *
   * @return object
   */
  public function getByEmail(string $email): object
  {
    $req = $this->_dbConnect->prepare("SELECT * FROM " . $this->_tableName . " WHERE email = :email");
    $req->execute(array($email));
    $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->_objectClass);

    return $req->fetch();
  }

  /**
   * Method create
   *
   * @param object $objectClass [object des données à créer dans la table]
   * @param array $param [paramètre representant les données à créer]
   *
   * @return mixed
   */
  public function create(object $objectClass, array $param): void
  {

    $valueString = self::formatParams($param, 'FORMAT_CREATE');

    $sql = "INSERT INTO " . $this->_tableName . "(" . implode(", ", $param) . ") VALUES(" . $valueString . ")";
    $req = $this->_dbConnect->prepare($sql);
    $boundParam = array();

    foreach ($param as $paramName) {
      if (property_exists($objectClass, $paramName)) {
        $boundParam[$paramName] = $objectClass->$paramName;
      } else {
        echo "Une erreur est survenu lors de la création, veuillez verifier $paramName : $this->_objectClass";
      }
    }
    $req->execute($boundParam);
  }

  /**
   * Method update
   *
   * @param object $objectClass [object des données à metre à jour dans la table]
   * @param array $param [paramètre representant les données à metre à jour]
   *
   * @return mixed
   */
  public function update(object $objectClass, array $param): mixed
  {
    $valueString = self::formatParams($param, 'FORMAT_UPDATE');

    $sql = "UPDATE " . $this->_tableName . " SET " . $valueString . " WHERE id = :id";
    $req = $this->_dbConnect->prepare($sql);
    // $param = ['id'];
    $boundParam = array();

    foreach ($param as $paramName) {

      if (property_exists($objectClass, $paramName)) {

        $boundParam[$paramName] = $objectClass->$paramName;
      } else {

        echo "Une erreur est survenu lors de la mise à jour, veuillez verifier $paramName : $this->_objectClass";
      }
    }
    $req->execute($boundParam);
  }

  /**
   * Method delete
   *
   * @param object $objectClass [object des données à metre à jour dans la table]
   *
   * @return mixed
   */
  public function delete(object $objectClass): mixed
  {
    if (property_exists($objectClass, "id")) {

      $req = $this->_dbConnect->prepare("DELETE FROM " . $this->_tableName . " WHERE id=?");

      return $req->execute(array($objectClass->id));
    } else {

      echo "Une erreur viens de ce produire lors de la suppression avec id: $this->_objectClass";
    }
  }

  /*------------------------------------ STATIC METHOD ------------------------------------*/

  /**
   * Method formatParams
   *
   * @param array $args [arguments de la requête à mettre en forme]
   * @param string $option [options de la methode de formatage FORMAT_CREATE | FORMAT_UPDATE]
   *
   * EXEMPLE : formatParams(array('username', 'password'), string $option) 
   * 
   *      FORMAT_CREATE -> :username, :password
   *      FORMAT_UPDATE -> username = :username, password = :password
   * 
   * @return string
   */
  private static function formatParams(array $args, string $option): string
  {
    switch ($option):

      case 'FORMAT_CREATE':

        return join(', ', array_map(function ($x) {
          return ':' . $x;
        }, $args));

      case 'FORMAT_UPDATE':

        return join(', ', array_map(function ($x) {
          return $x . ' = :' . $x;
        }, $args));

    endswitch;
  }
}
