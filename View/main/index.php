<?php

use App\Entity\Artist;
use App\Core\Db;

?>

<div class="album py-5 container row">
    <?php
    if (!empty($lastAlbumsFavs)) {
        echo '<h2 class="pb-3">Liste des derniers albums de vos chanteurs préférés</h2>';
        foreach ($lastAlbumsFavs as $lastAlbumFav) {
            echo $lastAlbumFav->display();
        }
    } else {
        echo '<h2>Ajoutez des artistes à vos favoris pour voir leurs derniers albums !^^</h2>';
    }
    ?>
</div>