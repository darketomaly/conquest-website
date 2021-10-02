<?= view('Base/Header')?>

<section>

    <?php

    for ($i = 0; $i < sizeof($images); $i++){
        ?>

            <a style="text-decoration: none;" href="/gallery/view/<?=$i+1?>">
        <img    style="border-radius: 5px; margin: 5px; width: 250px"
                src="/media/gallery/<?=$images[$i]['filename']?>"
                alt="<?=$images[$i]['description']?>">
            </a>
        <?php
    }
    ?>
</section>

<?= view('Base/Footer')?>
