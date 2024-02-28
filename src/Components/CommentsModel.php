<?php

namespace App\Autocompletion\Components;

use DateTime;

class CommentsModel
{

  /**
   * id
   *
   * @var int
   */
  public $id;

  /**
   * commentaire
   *
   * @var string
   */
  public $commentaire;

  /**
   * id_utilisateur
   *
   * @var int
   */
  public $id_utilisateur;

  /**
   * date
   *
   * @var DateTime
   */
  public $date;


  public function __construct()
  {
  }

  /*-------------------------  MAGIC METHOD -------------------------*/
  public function __get(string $name)
  {
    return $this->$name;
  }
  /*
  public function __set(string $name, mixed $value): void
  {
  }
*/
  public function __serialize(): array
  {
    return [
      'id' => $this->id,
      'commentaire' => $this->commentaire,
      'id_utilisateur' => $this->id_utilisateur,
      'date' => $this->date,
    ];
  }

  public function __unserialize(array $data): void
  {
    $this->id = $data['id'];
    $this->commentaire = $data['commentaire'];
    $this->id_utilisateur = $data['id_utilisateur'];
    $this->date = new DateTime($data['date']);
  }

  /**
   * Get date
   *
   * @return  DateTime
   */
  public function getDate()
  {
    return $this->date;
  }

  /**
   * Set date
   *
   * @param  DateTime  $date  date
   *
   * @return  self
   */
  public function setDate(DateTime $date)
  {
    $this->date = $date;

    return $this;
  }
}
