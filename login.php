<?php
require_once('header.php');
?>

<h1>Login</h1>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
E-mailadres: <input type="email" name="txtEmail"><br>
Wachtwoord: <input type="password" name="txtWachtwoord"><br>
<input type="submit" value="Inloggen" name="btnLogin">
</form>

<?php
require_once("footer.php")
?>

<?php
$error = "";
if (isset($_POST['btnLogin'])){
    $email='';
    $wachtwoord='';

    if(!empty($_POST['txtEmail'])){
        $email=$_POST['txtEmail'];
    }else{
        $error .= "Het e-mailadres moet ingevuld worden.<br>";
    }

    if($error == ""){


    }


}

?>