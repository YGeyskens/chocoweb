<!-- TEAM -->
<?php
  require('controllers/Team.php');
  $team = new Team;
?>
<section id="team" data-stellar-background-ratio="0.5">
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                         <h2>Meet our chefs</h2>
                         <h4>They are nice &amp; friendly</h4>
                    </div>
               </div>
               <?php foreach ($team->teams as $team) : ?>
               <div class="col-md-4 col-sm-4">
                     <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                          <img src="<?=$team->src; ?>"class="img-responsive" alt="">
                               <div class="team-hover">
                                    <div class="team-item">
                                         <h4><?=$team->desc; ?></h4>
                                         <ul class="social-icon">
                                           <?php foreach($team->networks as $network): ?>
                                              <li><a href="<?=$network->url;?>" class="fa fa-linkedin-square"></a></li>
                                          <?php endforeach;?>
                                         </ul>
                                    </div>
                               </div>
                     </div>
                     <div class="team-info">
                          <h3>"<?=$team->name; ?>"</h3>
                          <p>"<?=$team->job; ?>"</p>
                     </div>
               </div>
               <?php endforeach;?>
          </div>
     </div>
</section>
