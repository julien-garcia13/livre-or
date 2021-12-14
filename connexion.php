<meta charset="utf-8" />
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
            echo "Le login ou le mot de passe est incorrect !"; // Le message en cas de mot de passe et/ou d'identifiants incorrects.
        }
    }
    else
    {
        echo "Tu dois remplir tous les champs !"; // Le message des champs oubliés.
    }
}
?>
<!-- Début du HTML. -->
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Connexion - Livre d'Or</title>
        <style>
        @keyframes move-background
        {
          from
          {
            -webkit-transform: translate3d(0px, 0px, 0px);
          }
          to
          { 
    -webkit-transform: translate3d(1000px, 0px, 0px);
  }
}
@-webkit-keyframes move-background
{
  from
  {
    -webkit-transform: translate3d(0px, 0px, 0px);
  }
  to
  { 
    -webkit-transform: translate3d(1000px, 0px, 0px);
  }
}
@-moz-keyframes move-background
{    
  from
  {
    -webkit-transform: translate3d(0px, 0px, 0px);
  }
  to
  { 
    -webkit-transform: translate3d(1000px, 0px, 0px);
  }
}
@-webkit-keyframes move-background
{
  from
  {
    -webkit-transform: translate3d(0px, 0px, 0px);
  }
  to
  { 
    -webkit-transform: translate3d(1000px, 0px, 0px);
  }
}
.background-container
{
  position: fixed;
  top: 0;
  left:0;
  bottom: 0;
  right: 0;
}
.stars
{
  background: black url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/stars.png) repeat;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  display: block;
  z-index: 0;
}
.twinkling
{
  width:10000px;
  height: 100%;
  background: transparent url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/twinkling.png") repeat;
  background-size: 1000px 1000px;
  position: relative;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: 2; 
  -moz-animation:move-background 70s linear infinite;
  -ms-animation:move-background 70s linear infinite;
  -o-animation:move-background 70s linear infinite;
  -webkit-animation:move-background 70s linear infinite;
  animation:move-background 70s linear infinite;
}
.clouds
{
  width:10000px;
  height: 100%;
  background: transparent url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/clouds_repeat.png") repeat;
  background-size: 1000px 1000px;
  position: fixed;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: 3;
  -moz-animation:move-background 150s linear infinite;
  -ms-animation:move-background 150s linear infinite;
  -o-animation:move-background 150s linear infinite;
  -webkit-animation:move-background 150s linear infinite;
  animation:move-background 150s linear infinite;
}
.moon
{
  height: 70vh;
  width:70vh;
  position: relative;
  z-index: 3;
  right: 20px;
}
p1
{
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  font-family: "gwendolyn";
  font-size: 60px;
  text-align: center;
  position: relative;
  color: gold;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}
@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  to {
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
    margin-top: 14%;
    position: absolute;
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
    margin-left: 36%;
}
input
{
    display: flex;
}
.acceuil
{
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    margin-top: 10%;
    border: solid;
    width: 700px;
    height: 700px;
    border-radius: 10px;
    color: white;
}
.boutton
{
    margin-top: 10%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    position: relative;
    margin-left: 15%;
}
</style>
</head>
<body>
  <div class="background-container">
    <img class="moon" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/moon2.png" alt="">
    <div class="stars"></div>
    <div class="twinkling"></div>
    <div class="clouds"></div>
  </div>
  <main>
    <p1>Connexion</p1><br />
    <div class="formulaire">
      <form method="POST" action="connexion.php" align="center">
        <input type="text" name="login" placeholder="Votre psuedo...">Login :<br /></input>
        <input type="password" name="password">Mot de passe :<br /></input>
        <input type="submit" value="Connexion" name="Connexion"></input>
      </form>
      <form method="POST" action="index.php">
        <a href="index.php">
          <button>Revenir en arrière</button>
        </a>
      </form>
    </div>
  </main>
  <footer>
    <a href="https://github.com/julien-garcia13/livre-or"><img class="GitHub" src="GitHub_Logo.png" alt="logo"></img></a>
  </footer>
</body>
</html>