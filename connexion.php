<meta charset="utf-8" />
<style>
.erreur
{
  display: flex;
  justify-content: center;
  background-color: black;
  border: 2px solid #666;
  width: auto;
  position: inherit;
  color: blanchedalmond;
}
</style>
<?php
session_start(); // On ouvre une session.
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', ''); // Je me connecte à phpMyAdmin en appelant ma BDD 'livreor'.
if(isset($_POST['Connexion']))
{
  if(!empty($_POST['login']) AND!empty($_POST['password'])) // Avec else, il va afficher un message si des champs ont étés oubliés.
  {
    $login = htmlspecialchars($_POST['login']); // 'htmlspecialchars' une petite sécurité pour éviter d'écrire du HTML sur les champs.
    $password = htmlspecialchars($_POST['password']);
    $grabData = $bdd->prepare('SELECT * FROM `utilisateurs` WHERE `login` = ? AND `password` = ?');
    $grabData->execute(array($login, $password));
    if($grabData->rowCount() > 0)
    {
      $_SESSION['login'] = $login;
      $_SESSION['password'] = $password;
      $_SESSION['id'] = $grabData->fetch()['id'];
      header('location: session.php'); // Redirection si l'utilisateur s'est connecté.
    }
    else
    {
      echo '<div class="erreur">Le login ou le mot de passe est incorrect !</div>'; // Le message en cas de mot de passe et/ou d'identifiants incorrects.
    }
  }
  else
  {
    echo '<div class="erreur">Des champs ont étés oubliés !</div>'; // Le message des champs oubliés.
  }
}
?>
<!-- Début du HTML. -->
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!-- Bootstrap -->
    <title>Connexion - Livre d'Or</title>
    <style>
    /* Header w/ Bootstrap */
    *,::before, ::after
    {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      position: relative;
    }
    body
    {
      height: 100vh;
    }
    /* Fin de Bootstrap */
    .fond
    {
      display: flex;
      flex-wrap: wrap;
      max-width: 100%;
      height: auto;
      position: absolute;
    }
    p1
    {
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      font-family: "gwendolyn";
      font-size: 60px;
      text-align: center;
      color: gold;
      position: relative;
      -webkit-animation: glow 1s ease-in-out infinite alternate;
      -moz-animation: glow 1s ease-in-out infinite alternate;
      animation: glow 1s ease-in-out infinite alternate;
    }
    @-webkit-keyframes glow
    {
      from
      {
        text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
      }
      to
      {
        text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
      }
    }
    @font-face
    {
      font-family: "gwendolyn";
      src: url("font/gwendolyn-bold-webfont.woff") format("woff"), url("font/gwendolyn-bold-webfont.woff2") format("woff2");
    }
    footer
    {
      width: 100%;
      height: 64px;
      display: flex;
      justify-content: center;
      position: relative;
      margin-top: 5%;
    }
    .zone
    {
      display: flex;
      justify-content: center;
    }
    input
    {
      display: flex;
    }
    .formulaire
    {
      background-color: rgba(255, 255, 255, 0.3);
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 3%;
      border: solid;
      width: 500px;
      height: 500px;
      border-radius: 10px;
      color: white;
      position: relative;
    }
    .connexion
    {
      background: #1AAB8A;
      color: #fff;
      border: none;
      position: relative;
      height: 60px;
      font-size: 1em;
      padding: 0 2em;
      cursor: pointer;
      transition: 800ms ease all;
      outline: none;
      margin-left: 10%;
    }
    .connexion:hover
    {
      background: #fff;
      color: #1AAB8A;
    }
    .connexion:before,
    button:after
    {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      height: 2px;
      width: 0;
      background: #1AAB8A;
      transition: 400ms ease all;
    }
    .connexion:after
    {
      right: inherit;
      top: inherit;
      left: 0;
      bottom: 0;
    }
    .connexion:hover:before,
    .connexion:hover:after
    {
      width: 100%;
      transition: 800ms ease all;
    }
      </style>
      </head>
      <body>
        <img src="images/fond.jpg" class="fond">
        <!-- Header réalisé avec Bootstrap -->
        <header>
          <nav class="nav bg-dark justify-content-center">
            <a href="inscription.php" class="nav-link text-light">S'inscrire</a>
            <a href="livre-or.php" class="nav-link text-light">Livre d'Or</a>
            <a href="index.php" class="nav-link text-light">Accueil</a>
          </nav>
        </header>
        <main>
          <p1>Connexion</p1><br />
          <div class="zone">
            <div class="formulaire">
              <form method="POST" action="connexion.php" align="center">
                <input type="text" name="login" placeholder="Votre psuedo...">Login :<br /></input>
                <input type="password" name="password">Mot de passe :<br /></input>
                <input class="connexion" type="submit" value="Connexion" name="Connexion"></input>
              </form>
            </div>
          </div>
        </main>
        <footer>
          <a href="https://github.com/julien-garcia13/livre-or"><img class="GitHub" src="images/GitHub_Logo.png" alt="logo"></img></a>
        </footer>
      </body>
</html>