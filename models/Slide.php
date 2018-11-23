<?php

class Slide
{

  function __construct($id, $locale)
  {
    $result = $this->querySlide($id, $locale);
  }
  public function querySlide($id, $locale){
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
    $query = $pdo->query('SELECT name FROM users');
    return $query->fetch();
  }
}
