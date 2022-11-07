<?php

use App\Entity\Artist;

?>

<div class="album py-5 container row">
    <?php
    foreach ($artists as $artist) {
        echo $artist->display();
    }
    ?>
</div>