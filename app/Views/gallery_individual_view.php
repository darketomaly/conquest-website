<?= view('Base/Header')?>


<section>

    <img style="width: 100%" src="/media/gallery/<?=$image['filename']?>">
<br>
    <?php echo $image['description']; ?>
<br><br>
    <button style="padding: 5px; background: #5cb730; border-radius: 5px; border: 0px;"
    onclick="location.href='/gallery'">
        Return to gallery</button>
</section>

<?= view('Base/Footer')?>

