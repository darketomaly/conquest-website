<?= view('Base/Header')?>

<section>

    <?php
    if(!isset($_SESSION['steamid'])) {

        echo "Please login in order to see your profile.";

        //didn't find a better way?
        ?>
        <script>
            window.location.href = '?login';
        </script>
        <?php
        exit;
    }

    echo "Hello, ".$_SESSION['display_name']; ?>

    <br><br>

    <form action="/Auth/UpdateDisplayName" method="post">
        <label for="x">Display name. Leave blank to automatically use your Steam name.</label><br>
        <input type="hidden" name="steamid" value="<?php echo $_SESSION['steamid'] ?>">
        <input type="text" id="x" name="display_name" value="<?php
            if(!$_SESSION['using_steam_display_name'])
                echo $_SESSION['display_name'];
        ?>"<br><br>
        <input type="submit" value="Save">
        <?php
        if(isset($_SESSION['m_message'])){

            ?> <span style="color: #9dbed0" class="animated fadeOut"> <?php
                echo $_SESSION['m_message']; ?> </span> <?php
            unset($_SESSION['m_message']);
        }?>
    </form>


</section>

<?= view('Base/Footer')?>
