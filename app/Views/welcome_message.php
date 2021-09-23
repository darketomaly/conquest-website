<?= view('Base/Header')?>

<!-- CONTENT -->

<section>

	<h1>TOP PLAYERS</h1>

    <table style="width: 35%; border-collapse: collapse">

        <thead>
        <tr>
            <th scope="col">Rank</th>
            <th scope="col">Player</th>
            <th scope="col">Score</th>
        </tr>
        </thead>

        <tbody>
        <td></td>
        <td></td>

        <?php
        for ($i = 0; $i < 25; $i++){ ?>
            <tr>
                <th style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;"><?= $i+1?></th>
                <td>Lorem Ipsum</td>
                <td style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;"><?= rand(15, 34586) ?></td>
            </tr>
        <?php
        }?>
        </tbody>
    </table>

    <?php
        if(isset($sex)){

            $_sex = [0 => "male", 1 => "female"];
            echo "Hello ".$_sex[$sex]." ".$name.", you were born in: ".$birth;
        }
    ?>

</section>
<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<?= view('Base/Footer')?>
