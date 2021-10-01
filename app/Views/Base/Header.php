<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
        <?php
        if(isset($title)){
            echo $title;
        } else "Conquest Remastered"?>
    </title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
<header>
    <div class="menu">
        <ul>
            <li class="logo">
                <a href="/">
                    <img height="44" title="CodeIgniter Logo"
                            alt="Visit CodeIgniter.com official website!"
                            src="/media/conquest-remastered logo.png">
                </a>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>

            <li class="menu-item hidden">
                <a href="/gallery">Gallery</a>
            </li>

            <?php
                if(!isset($_SESSION['steamid'])){

                    ?>
                    <li class="menu-item hidden">
                        <a href="?login">Login</a>
                    </li>
                    <?php
                    //echo loginbutton("rectangle");

                }  else {

                    //Protected content
                    include APPPATH.'ThirdParty\steamauth\userInfo.php';
                    ?>

                    <li class="menu-item hidden">
                        <a href="?logout">Logout</a>
                    </li>

                    <li class ="menu-item hidden" style="margin-bottom: -25px">
                        <a href="/profile" class="header-profile">
                            <span>
                                <?php echo $_SESSION['display_name']?>
                            </span>

                            <img style="vertical-align: middle; padding-left: 5px;" class="header-steam-avatar"
                                 src="<?php echo $steamprofile['avatarmedium'] ?>">
                        </a>
                    </li>

                    <?php
                }
            ?>
        </ul>
</header>
