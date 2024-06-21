<?php

namespace App\Autocompletion\Components;

class FoodsOpens
{

  /**
   * id
   *
   * @var int
   */
  public $id;

  /**
   * code
   *
   * @var string
   */
  public $code;

  /**
   * url
   *
   * @var string
   */
  public $src_img;

  /**
   * creator
   *
   * @var string
   */
  public $creator;

  /**
   * product_name
   *
   * @var string
   */
  public $product_name;

  /**
   * brands
   *
   * @var string
   */
  public $brands;

  /**
   * categories
   *
   * @var string
   */
  public $categories;

  /**
   * jsonFood
   *
   * @var mixed
   */
  public $jsonFood;

  public function __construct(array $dataFoods = [])
  {
    foreach ($dataFoods as $key => $value) {
      if (property_exists($this, $key)) :
        $this->$key = $value;
      endif;
    }
  }

  public function __set(string $name, mixed $value)
  {
  }

  public function __get(string $name)
  {
    if (property_exists($this, $name)) :
      return $this->$name;
    endif;
  }
}
