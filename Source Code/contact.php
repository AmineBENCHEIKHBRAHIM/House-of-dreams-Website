<?php

// fonction de redirection ------------ 
function redir($url){ 
echo "<script language=\"javascript\">"; 
echo "window.location='$url';"; 
echo "</script>"; 
} 

// Utilisation de la redirection --------------- 
redir("acc.html");


//si le bouton send est cliqué
if(isset($_POST["name"]) AND isset($_POST["email"]) AND isset($_POST["message"]))
{
try
{
$bdd = new PDO('mysql:host=localhost;dbname=house_of_dreams', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Cet email est correct.';
} else {
    echo 'Cet email a un format non adapté.';}


$req = $bdd->prepare('INSERT INTO messages (name,email,message)
VALUES(?, ?, ?)');
$req->execute(array($name,$email,$message));

echo 'Votre message a été envoyé avec succès!';



}
?>