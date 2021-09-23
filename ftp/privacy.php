<?php
include ('header.php');
?>

    <section class="page__header">
        <div class="page__header-col"></div>
        <div class="page__header-col"></div>
    </section>

    <section class="page__wrap">
        <div class="page__wrap-block wow clipInLeft"></div>
        <div class="page__content wow clipInDown">
            <div class="page__col">
                <h2 class="page__name"><?=$item->name?></h2>
            </div>
            <div class="page__col">
              <?=$item->body?>
            </div>
        </div>
    </section>


<?php
include ('footer.php');
?>
