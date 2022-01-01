<meta charset="utf-8" />
<?php
session_start();
if(!isset($_SESSION['id']))
    {
      header('Location:index.php');
      die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers index.
    }
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', ''); // Je me connecte à phpMyAdmin en appelant ma BDD 'livreor'.
$_SESSION["id"];
if(isset($_POST['Modifier']))
{
    if(!empty($_POST['login']) AND !empty($_POST['password'])) // Avec else, il va afficher un message si des champs ont étés oubliés.
    {
        $login = $_POST['login'];
        $password = $_POST['password']; // Je ne mettrais pas de chiffrement du mot de passe pour faciliter la correction (même si nous pouvons déchiffrer facilement) pour éviter de perdre du temps de à chaque fois c/c le mdp et le décrypter
        $insertData = $bdd->prepare('UPDATE utilisateurs SET login = ? ,password=? WHERE id = ?'); // La commande utilisée qui va modifier l'user dans la BDD.
        $insertData->execute(array($login,$password,$_SESSION['id'])); // Il va exécuter la commande.
        echo "Les informations ont bien étés modifiées " . $login . " !"; // Message que la modification à bien été prise en compte.
    }
    else
    {
        echo "Tu dois remplir tous les champs !"; // Le message des champs oubliés.
    }
}
?>
<!-- Début du HTML. -->
<html lang="fr">
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modifier son profil - Livre d'Or</title>
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
      margin-top: 15%;
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
      flex-direction: column;
      align-items: center;
      margin-top: 3%;
      border: solid;
      width: 500px;
      height: 500px;
      border-radius: 10px;
      color: white;
      position: relative;
    }
    .edit
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
    .edit:hover
    {
      background: #fff;
      color: #1AAB8A;
    }
    .edit:before,
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
    .edit:after
    {
      right: inherit;
      top: inherit;
      left: 0;
      bottom: 0;
    }
    .edit:hover:before,
    .edit:hover:after
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
            <a href="deconnexion.php" class="nav-link text-light">Déconnexion</a>
            <a href="livre-or.php" class="nav-link text-light">Livre d'Or</a>
            <a href="session.php" class="nav-link text-light">Retour</a>
          </nav>
        </header>
      <main>
    <p1>Modifier le profil</p1><br />
    <div class="zone">
    <div class="formulaire">
      <ul class="session-affiche">
        <?php
        echo "<b>Login actuel : " . $_SESSION['login'] . "</b>";
        ?>
        </ul>
      <form method="POST" action="profil.php" align="center">
      <input type="text" name="login" placeholder="Un nouveau psuedo...">Login :<br /></input>
        <input type="password" name="password">Mot de passe :<br /></input>
        <input class="edit" type="submit" value="Modifier" name="Modifier"></input>
      </form>
    </div>
</div>
  </main>
  <footer>
    <a href="https://github.com/julien-garcia13/livre-or"><img class="GitHub" src="images/GitHub_Logo.png" alt="logo"></img></a>
  </footer>
</body>
</html>
