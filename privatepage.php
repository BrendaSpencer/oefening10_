<?php
session_start();
require_once("user.php");
if(!isset($_SESSION['gebruiker'])){
    header('Location: publicpage.php');
    exit;
}
$gebruiker = unserialize($_SESSION['gebruiker'], ['User']);
?>

<?php
require_once("header.php");
?>

<h1>Private Page</h1>
<h2>Welkom <?php echo $gebruiker->getEmail(); ?></h2>
<p>Enkel toegankelijk voor ingelogde personen!</p>
<?php
require_once("footer.php");
