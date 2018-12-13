<?php
include_once('models/database.php');
class Slide
{
  public $id;
  public $src;
  public $alt;
  public $pre;
  public $title;
  public $href;
  public $button;

  function __construct($id = null, $locale = null)
  {
    $result = $this->querySlide($id, $locale);
    $this->id = $result->id;
    $this->src = $result->img_src;
    $this->alt = $result->img_alt;
    $this->pre = $result->pre;
    $this->title = $result->title;
    $this->href = $result->btn_href;
    $this->button = $result->btn_label;
  }
  public function querySlide($id, $locale){
    $pdo = getConnectionToDb();
    $query = $pdo->prepare('SELECT s.id, s.img_src, st.img_alt, st.pre, st.title, st.btn_href, st.btn_label
                          FROM slides s
                          JOIN slide_translations st ON st.slides_id = s.id AND st.locale = :locale
                          WHERE s.id = :id;');
    $arr = [":id"=>$id, ":locale"=>$locale];
    $query->execute($arr);
    return $query->fetch();
  }
}
