<h1>SIGN UP</h1>
<form method="post" action="#">
    <?php
    include("../../../controleurs/sign_up.php");
    ?>
    <div><label for="email">Email : </label> <input type="text" name="email" id="email" required></div>
    <div><label for="password">Password : </label> <input type="password" name="password" id="password" required></div>
    <div><button type="submit">Register</button></div>
</form>

<style type="text/css">
    form{
        display: flex;
        flex-direction: column;
    }
    form label{
        display: inline-block;
        width: 100px;
    }
    button{
        padding: 5px;
        width: 70px;
    }
</style>