<meta charset="utf-8" />
<?php
session_start(); // On ouvre une session.
if(!isset($_SESSION['id']))
    {
      header('Location:index.php');
      die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers index.
    }
?>
<!-- Début du HTML. -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livre d'Or</title>
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
  .session-affiche
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
  button
  {
    background:#1AAB8A;
    color:#fff;
    border:none;
    position:relative;
    height:60px;
    font-size:1.6em;
    padding:0 2em;
    cursor:pointer;
    transition:800ms ease all;
    outline:none;
  }
  button:hover
  {
    background:#fff;
    color:#1AAB8A;
  }
  button:before,button:after
  {
    content:'';
    position:absolute;
    top:0;
    right:0;
    height:2px;
    width:0;
    background: #1AAB8A;
    transition:400ms ease all;
  }
  button:after
  {
    right:inherit;
    top:inherit;
    left:0;
    bottom:0;
  }
  button:hover:before,button:hover:after
  {
    width:100%;
    transition:800ms ease all;
  }
  .bouttons
  {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    justify-content: space-evenly;
    margin-top: 20%;
  }
  footer
  {
    width: 100%;
    height: 64px;
    display: flex;
    justify-content: center;
    position: relative;
    margin-top: 20%;
  }
  </style>
  </head>
  <body>
    <img src="images/fond.jpg" class="fond">
    <main>
      <ul class="session-affiche">
        <?php
        echo "Bienvenue sur le livre d'Or, " . $_SESSION['login'] . " .";
        ?>
        </ul>
        <div class="bouttons">
          <a href="profil.php"><button>Modifier son profil</button></a> <!-- Boutton qui ammène à la page de modification de profil -->
          <a href="livre-or.php"><button>Livre d'Or</button></a> <!-- Accèdez au Livre d'Or. -->
          <form method="POST" action="deconnexion.php"> <!-- L'utilisateur va être redirigé vers la page d'accueil après s'être déconnecté -->
          <a href="deconnexion.php"><button>Déconnexion</button></a>
        </form>
      </div>
    </main>
    <footer>
      <a href="https://github.com/julien-garcia13/livre-or"><img class="GitHub" src="images/GitHub_Logo.png" alt="logo"></img></a>
    </footer>
  </body>
</html>
