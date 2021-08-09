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