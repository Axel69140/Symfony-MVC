<?php

use App\Entity\Artist;

?>

<div class="container py-4">
    <div class="d-flex flex-wrap">
        <div class="col-1 themed-grid-col bg-light">Favs</div>
        <div class="col-4 themed-grid-col bg-light">Titre</div>
        <div class="col-3 themed-grid-col bg-light">Durée</div>
        <div class="col-4 themed-grid-col bg-light">Lien Spotify</div>
    </div>
    <div class="row mb-3 text-center">
        <?php
        foreach ($tracks as $track) {
            echo $track->display();
        }
        ?>
    </div>

</div>
