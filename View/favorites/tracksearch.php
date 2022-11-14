<?php

?>
<div class="container py-4">
    <form class="p-2 mb-2" method="post" enctype="multipart/form-data" action="/favorites/searchTrack">
        <div class="input-group container">
            <label class="d-none" for="trackinput">Musique :</label>
            <input name="trackinput" id="trackinput" type="text" class="form-control" placeholder="Musique">
            <button type="submit" class="btn btn-secondary">Chercher</button>
        </div>
    </form>
    <div class="d-flex flex-wrap">
        <div class="col-1 themed-grid-col bg-light">Favs</div>
        <div class="col-4 themed-grid-col bg-light">Titre</div>
        <div class="col-3 themed-grid-col bg-light">Durée</div>
        <div class="col-4 themed-grid-col bg-light">Lien Spotify</div>
    </div>
    <div class="album py-5 container row">
        <?php
        if (isset($tracks)) {
            foreach ($tracks as $track) {
                echo $track->display();
            }
        } else{
            echo '<h2>' . $message . '</h2>';
        }
        ?>
    </div>
</div>
