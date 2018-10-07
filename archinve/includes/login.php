<form method="POST" action="login.php">
    <img class="logo" src=" http://urltrim.co/DUHZbI" height=50px width=50px>
    <h1 style="font-size:20px; padding:0;">Sign In</h1>
    <input class="use" type="text" name="login" placeholder="User Name">
    <input class="use" type="text" name="passwd" placeholder="Password">
    <h4><?php
        if ($user == "ERROR") echo "Invalid login";
    ?></h4>
    <p class="but">
        <input class="but" type="submit" name="n_login" value="Create login">
        <input class="but" type="submit" name="o_sub">
    </p>
    <p style="margin-top: 5px;"> <input class="but" type="submit" name="f_passwd" value="forgot password"></p>
</form>