<?php
include_once('models/database.php');
class ChocolatMenu
{
  public $id;
  public $src;
  public $alt;
  public $price;
  public $name;
  public $ingredients;
  function __construct($id = null, $locale = null)
  {
    $result = $this->queryMenu($id,$locale);
    $this->id = $result->id;
    $this->src = $result->img_src;
    $this->alt = $result->img_alt;
    $this->name = $result->name;
    $this->price = $result->price;
    $this->ingredients = $this->queryIngredient($id,$locale);
  }
  public function queryMenu($id, $locale){

    $pdo = getConnectionToDb();
    $query = $pdo->prepare('SELECT ch.id, ch.img_src, ch.price, cht.img_alt, cht.name
                          FROM nos_chocolats ch
                          JOIN nos_chocolats_translations cht ON cht.chocolat_id = ch.id AND cht.locale = :locale
                          WHERE ch.id = :id ;');
    $arr = [":id"=>$id, ":locale"=>$locale];
    $query->execute($arr);
    return $query->fetch();
  }
  public function queryIngredient($id,$locale){
    $pdo = getConnectionToDb();
    $query = $pdo->prepare('SELECT i.id, it.name
                          FROM ingredients i
                          JOIN ingredients_translations it ON it.ingredient_id = i.id AND it.locale = :locale
                          WHERE i.id = :id ;');
    $arr = [":id"=>$id, ":locale"=>$locale];
    $query->execute($arr);
    return $query->fetchAll();
  }
}
