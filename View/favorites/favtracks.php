<?php

use App\Entity\Track;

$allFavTracks = new Track();
$allFavTracks = $allFavTracks->findAll();

?>

<div class="container py-4">
    <div class="d-flex flex-wrap">
        <div class="col-1 themed-grid-col bg-light">Favs</div>
        <div class="col-4 themed-grid-col bg-light">Titre</div>
        <div class="col-3 themed-grid-col bg-light">Durée</div>
        <div class="col-4 themed-grid-col bg-light">Lien Spotify</div>
    </div>
    <div class="album py-2 container row">
        <?php
        if (!empty($allFavTracks)) {
            foreach ($allFavTracks as $allFavTrack) {
                $print = new Track($allFavTrack->spotify_id, $allFavTrack->name, $allFavTrack->track_number, $allFavTrack->duration, $allFavTrack->link);
                echo $print->display();
            }
        } else{
            echo '<h2>Vous n\'avez pas de musiques préférées :S</h2>';
        }
        ?>
    </div>
</div>
