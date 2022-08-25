<h1>LOGIN</h1>
<div>
    <form method="post" action="#">
        <?php include("../../../controleurs/login_logic.php"); ?>
        <div><label for="email">Email : </label> <input type="text" name="email" id="email" required></div>
        <div><label for="password">Password : </label> <input type="password" name="password" id="password" required></div>
        <div><button type="submit">Login</button></div>
    </form>
</div>

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