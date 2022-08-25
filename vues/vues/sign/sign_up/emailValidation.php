<h1>Email Validation</h1>
<form method="post" action="#">
    <?php 
        include("../../../controleurs/mailCodeVerification.php");
    ?>
    <div>Provides the validation code sended in the email</div>
    <div><input type="text" name="code" id="code" required></div>
    <div><input type="submit" value="Submit" required></div>
</form>