<?php

class Menu
{

  public $menus;

  function __construct()
  {
    $this->menus = $this->getMenus();

  }

  public function getMenus(){
    require('models/ChocolatMenu.php');
    $menu1 = new ChocolatMenu(1, 'fr');
    $menu2 = new ChocolatMenu(2, 'fr');
    $menu3 = new ChocolatMenu(3, 'fr');
    $menu4 = new ChocolatMenu(4, 'fr');
    $menu5 = new ChocolatMenu(5, 'fr');
    $menu6 = new ChocolatMenu(6, 'fr');

    return [$menu1,$menu2,$menu3,$menu4,$menu5,$menu6];
  }
}
