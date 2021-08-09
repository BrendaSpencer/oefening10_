<?php
require_once('header.php');
?>

<h1>Registreren</h1>
<form action="<?php echo htmlentities($_server['PHP_SELF']);?>" method="post">
Emailadres: <input type="email" name="txtEmail"> <br>
Wachtwoord : <input type="password" name="txtWachtwoord"><br>
Herhaal wachtwoord: <input type="password" name="txtWachtwoordHerhaal"><br>
<input type="submit" value="inloggen" name="btnRegistreer">
</form>

<?php
require_once('footer.php')
?>
<?php
require_once('user.php');

$error = "";

if(isset($_POST['btnRegistreer'])){
    $email = "";
    $wachtwoord = "";
    $wachtwoordHerhaal = "";

    if(!empty($_POST['txtEmail'])){
        $email = $_POST['txtEmail'];
    }else{
        $error .= "Het emailadres moet ingevuld worden.<br>";
    }

    if(!empty($_POST['txtWachtwoord']) && !empty($_POST['txtWachtwoordHerhaal'])){
        $wachtwoord = $_POST['wachtwoord'];
        $wachtwoordHerhaal = $_POST['txtWachtwoordHerhaal'];
    }else{
        $error .= "Beide wachtwoordvelden moeten ingevuld worden. <br>"
    }
    if($error == ""){
        
    }
}