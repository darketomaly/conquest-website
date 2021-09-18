<?= view('Base/Header')?>

<section>

    <?php if(session()->has('message')):?>
            <h2> <?=session('message')?></h2>
    <?php endif?>

    <form action ="/login" method="post">
        <h1>Iniciar Sesión</h1>

        <input type ="email" name="email" placeholder="myMail@example.com"> <br>
        <input type ="password" name="password" placeholder="myPassword"> <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</section>

<?= view('Base/Footer')?>
