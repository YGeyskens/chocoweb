<?php

class Home
{

  public $teams;

  function __construct()
  {
    $this->teams = $this->getTeams();

  }

  public function getTeams(){
    require('models/team1.php');
    $team1 = new Team(1, 'fr');
    $team2 = new Team(2, 'fr');
    $team3 = new Team(3, 'fr');

    return [$team1,$team2,$team3];
  }
}
