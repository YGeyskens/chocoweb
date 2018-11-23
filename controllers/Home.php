<?php

class Home
{

  public $slides;

  function __construct()
  {
    $this->slides = $this->getSlides();
  }

  public function getSlides(){
    $slide1 = [
      'title' => 'Our mission is to provide an unforgettable experience',
      'href' => '#team',
      'button' => 'Meet our chef',
      'img' => './content/slide1.jpg',
      'alt' => 'Tasse de chcocolat chaud'
    ];
    $slide2 = [
      'title' => 'Your Perfect Breakfast',
      'sub' =>'The best dinning quality can be here too!',
      'href' => '#menu',
      'button' => 'Discover menu',
      'img' => './content/slide2.jpg',
      'alt' => 'Des pralines au chocolat'
    ];
    $slide3 = [
      'title' => 'New Restaurant in Town',
      'sub' =>'Enjoy our special menus every Sunday and Friday',
      'href' => '#contact',
      'button' => 'Reservation',
      'img' => './content/slide3.jpg',
      'alt' => 'Des petits cupcakes au chocolat avec des pépites'
    ];
    return [$slide1,$slide2,$slide3];
  }
}
