<?php
session_start();
if (!isset($_SESSION['id']))
{
  header('Location:index.php');
  die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers index. ❌
}
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', ''); // Je me connecte à phpMyAdmin en appelant ma BDD 'livreor'.
$request = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$request->execute(array($_SESSION['id']));
$data = $request->fetch();
if (!empty($_POST['comm']))
{
  // Commentaire
  $comm = htmlspecialchars($_POST['write-comm']); // "htmlspecialchars" la sécurité habituelle pour empêcher d'éxecuter du code sur les champs.
  // Date
  $quand = new DateTime();
  // Date et heure 🕑📆
  $quand->format('Y-m-d H:i:s');
  {
    if (strlen($comm) >= 1) // Minimum 1 caractère.
      $insert = $bdd->prepare('INSERT INTO commentaires(commentaire,id_utilisateur,date) VALUES(:commentaire,:id_utilisateur,NOW())');
    $insert->execute(array('commentaire' => $comm, 'id_utilisateur' => intval($data['id'])));
    header('Location:livre-or.php');
  }
}
?>
