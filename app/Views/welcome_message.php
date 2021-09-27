<?= view('Base/Header')?>

<!-- CONTENT -->

<div class ="flex-wrapper">
    <section>
        <h1>TOP PLAYERS</h1>

        <table style="width: 35%; min-width: 200px; border-collapse: collapse">

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

            //var_dump($topaccounts);

            for ($i = 1; $i < sizeof($topaccounts); $i++){ ?>
                <tr>
                    <th style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;"><?= $i?></th>

                    <td>
                        <img src="<?php echo $topaccounts[$i]['profilePicture'] ?>">
                        <?php
                        echo $topaccounts[$i]['username'] ?>
                    </td>
                    <td style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;"><?php echo $topaccounts[$i]['score'] ?></td>
                </tr>
                <?php
            }?>
            </tbody>
        </table>

    </section>
    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
    <?= view('Base/Footer')?>
</div>

