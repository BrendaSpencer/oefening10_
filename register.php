<?php
require_once('header.php');
require_once("user.php");

session_start();
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
        $error .= "Beide wachtwoordvelden moeten ingevuld worden. <br>";
    }
    if($error == ""){
        try {
            $gebruiker = new User();
            $gebruiker->setEmail($email);
            $gebruiker->setWachtwoord($wachtwoord, $wachtwoordHerhaal);
            $gebruiker=$gebruiker->register();
            $_SESSION['gebruiker'] = serialize($gebruiker);
        } catch (OngeldigEmailadresException $e){
            $error .= "Het ingevulde emailadres is geen geldig emailadres.<br>";
        }catch (WachtwoordenKomenNietOvereenException $e){
            $error .= "De ingevulde wachtwoorden komen niet overeen.<br>";
        }catch (GebruikerBestaatAlException $e){
            $error .= "Er bestaat al een gebruiker met dit emailadres. <br>";
        }
    }
}
