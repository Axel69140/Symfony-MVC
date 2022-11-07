<?php

use App\Entity\Artist;

?>

<div class="album py-5 container row">
    <?php
    if (isset($albums)) {
        foreach ($albums as $album) {
            echo $album->display();
        }
    } else{
        echo '<h2>' . $message . '</h2>';
    }
    ?>
</div>