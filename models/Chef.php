<?php

class Chef
{
  public $id;
  public $src;
  public $desc;
  public $href;
  public $name;
  public $job;
  function __construct($id = null, $locale = null)
  {
    $result = $this->queryChef($id,$locale);
    $this->id = $result['id'];
    $this->src = $result['img'];
    $this->desc = $result['description'];
    $this->href = $result['url'];
    $this->name = $result['name'];
    $this->job = $result['job'];
  }
  public function queryChef($id, $locale){
    $host = '127.0.0.1';
    $db   = 'sgc_choco';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
      $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    $query = $pdo->prepare('SELECT c.id, c.img, c.name, ct.description, ct.job, cs.network, cs.url
                          FROM chefs c
                          JOIN chefs_translations ct ON ct.chef_id = c.id AND ct.locale = ?
                          JOIN chefs_socials cs ON cs.chef_id = c.id
                          WHERE c.id = ? ;');
    $query->execute([$locale, $id]);
    return $query->fetch();
  }
}
