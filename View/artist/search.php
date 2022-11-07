<?php

use App\Entity\Artist;

?>

<div class="album py-5 container row">
    <?php
    if (isset($artists)) {
        foreach ($artists as $artist) {
            echo $artist->display();
        }
    } else{
        echo '<h2>' . $message . '</h2>';
    }
    ?>
</div>