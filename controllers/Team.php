<?php

class Team
{

  public $teams;

  function __construct()
  {
    $this->teams = $this->getTeams();

  }

  public function getTeams(){
    require('models/Chef.php');
    $team1 = new Chef(1, 'fr');
    $team2 = new Chef(2, 'fr');
    $team3 = new Chef(3, 'fr');

    return [$team1,$team2,$team3];
  }
}
