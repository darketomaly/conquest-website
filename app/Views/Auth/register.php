<?= view('Base/Header')?>
    <section>
        <form action ="/register" method="post">
            <h1>Register</h1>

                <?php if(session()->has('errors'))
                    foreach(session('errors') as $error):?>
                        <h2> <?=$error?></h2>
                    <?php endforeach;?>

            <input type ="text" name="username" placeholder="Username" value ="<?=old('username')?>"> <br>
            <input type ="email" name="email" placeholder="MyEmail@example.com" value ="<?=old('email')?>"> <br>
            <input type ="password" name="password" placeholder="Password"> <br>
            <input type ="password" name="passwordConfirm" placeholder="Confirm Password"> <br>

            <label for="sex">Sex: </label>
            <select name="sex" id="sex">
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select> <br>

            <input type="text" name="firstName" placeholder="First Name" value ="<?=old('firstName')?>">
            <input type="text" name="lastName" placeholder="Last Name" value ="<?=old('lastName')?>"><br>
            <label for="birth">Birth: </label>
            <input type="date" name="birth" placeholder="Birth" id="birth" value ="<?=old('lastName')?>"> <br>

            <input type="submit" value="Register">
        </form>
    </section>
<?= view('Base/Footer')?>