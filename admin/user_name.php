<div class="pull-right-date">
    <?php
    $Today = date('Y-m-d H:i:s');
    $new = date('l, F d, Y', strtotime($Today));
    echo $new;
    ?>
</div>


