<?= view('Base/Header')?>

<section>

    <?php

    echo "Hello, ".$_SESSION['display_name']; ?>

    <br><br>

    <form action="/action_page.php">
        <label for="fname">Leave the display name blank to automatically use your steam's name.</label><br>
        <input type="text" id="fname" name="fname" value="<?php
            if($_SESSION['using_steam_display_name'])
                echo "";
            else
                echo $_SESSION['display_name'];
        ?>"<br><br>
        <input type="submit" value="Save">
    </form>

</section>

<?= view('Base/Footer')?>
