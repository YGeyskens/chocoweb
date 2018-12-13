<?php
include_once('models/database.php');
class Chef
{
  public $id;
  public $src;
  public $desc;
  public $name;
  public $job;
  public $networks;
  function __construct($id = null, $locale = null)
  {
    $result = $this->queryChef($id,$locale);
    $this->id = $result->id;
    $this->src = $result->img;
    $this->desc = $result->description;
    $this->name = $result->name;
    $this->job = $result->job;
    $this->networks = $this->queryNetworks($id);
  }
  public function queryChef($id, $locale){

    $pdo = getConnectionToDb();
    $query = $pdo->prepare('SELECT c.id, c.img, c.name, ct.description, ct.job
                          FROM chefs c
                          JOIN chefs_translations ct ON ct.chef_id = c.id AND ct.locale = :locale
                          WHERE c.id = :id ;');
    $arr = [":id"=>$id, ":locale"=>$locale];
    $query->execute($arr);
    return $query->fetch();
  }
  public function queryNetworks($id){

    $pdo = getConnectionToDb();
    $query = $pdo->prepare('SELECT cs.network, cs.url
                          FROM chefs_socials cs
                          WHERE cs.chef_id = :id ;');
    $arr = [":id"=>$id];
    $query->execute($arr);
    return $query->fetchAll();
  }

}
