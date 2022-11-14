<?php

use App\Entity\Artist;

$allFavArtists = new Artist();
$allFavArtists = $allFavArtists->findAll();

?>

<div class="album py-5 container row">
    <?php
    if (!empty($allFavArtists)) {
        foreach ($allFavArtists as $allFavArtist) {
            $print = new Artist($allFavArtist->spotify_id, $allFavArtist->name, $allFavArtist->followers, null, $allFavArtist->link, $allFavArtist->picture);
            echo $print->display();
        }
    } else{
        echo '<h2>Vous n\'avez pas d\'artistes favoris :S</h2>';
    }
    ?>
</div>