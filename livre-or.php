<meta charset="utf-8" />
<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('Location:index.php');
  die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers index.
}
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', ''); // Je me connecte à phpMyAdmin en appelant ma BDD 'livreor'.
// On récupere les données de l'utilisateur
$request = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$request->execute(array($_SESSION['id']));
$data = $request->fetch();
?>
<!-- Début du HTML. -->
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Commentaires - Livre d'Or</title>
  <style>
    @keyframes move-background {
      from {
        -webkit-transform: translate3d(0px, 0px, 0px);
      }

      to {
        -webkit-transform: translate3d(1000px, 0px, 0px);
      }
    }

    @-webkit-keyframes move-background {
      from {
        -webkit-transform: translate3d(0px, 0px, 0px);
      }

      to {
        -webkit-transform: translate3d(1000px, 0px, 0px);
      }
    }

    @-moz-keyframes move-background {
      from {
        -webkit-transform: translate3d(0px, 0px, 0px);
      }

      to {
        -webkit-transform: translate3d(1000px, 0px, 0px);
      }
    }

    @-webkit-keyframes move-background {
      from {
        -webkit-transform: translate3d(0px, 0px, 0px);
      }

      to {
        -webkit-transform: translate3d(1000px, 0px, 0px);
      }
    }

    .background-container {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
    }

    .stars {
      background: black url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/stars.png) repeat;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      display: block;
      z-index: 0;
    }

    .twinkling {
      width: 10000px;
      height: 100%;
      background: transparent url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/twinkling.png") repeat;
      background-size: 1000px 1000px;
      position: relative;
      right: 0;
      top: 0;
      bottom: 0;
      z-index: 2;
      -moz-animation: move-background 70s linear infinite;
      -ms-animation: move-background 70s linear infinite;
      -o-animation: move-background 70s linear infinite;
      -webkit-animation: move-background 70s linear infinite;
      animation: move-background 70s linear infinite;
    }

    .clouds {
      width: 10000px;
      height: 100%;
      background: transparent url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/clouds_repeat.png") repeat;
      background-size: 1000px 1000px;
      position: fixed;
      right: 0;
      top: 0;
      bottom: 0;
      z-index: 3;
      -moz-animation: move-background 150s linear infinite;
      -ms-animation: move-background 150s linear infinite;
      -o-animation: move-background 150s linear infinite;
      -webkit-animation: move-background 150s linear infinite;
      animation: move-background 150s linear infinite;
    }

    .moon {
      height: 70vh;
      width: 70vh;
      position: relative;
      z-index: 3;
      right: 20px;
    }

    p1 {
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

    @font-face {
      font-family: "gwendolyn";
      src: url("font/gwendolyn-bold-webfont.woff") format("woff"), url("font/gwendolyn-bold-webfont.woff2") format("woff2");
    }

    @font-face {
      font-family: "notosans";
      src: url("font/notosans-regular-webfont.woff") format("woff"), url("font/notosans-regular-webfont.woff2") format("woff2");
    }

    footer {
      width: 100%;
      height: 64px;
      display: flex;
      justify-content: center;
      margin-top: 14%;
      position: absolute;
    }

    .cadre {
      background-color: rgba(255, 255, 255, 0.3);
      display: flex;
      justify-content: center;
      margin-top: 3%;
      border: solid;
      width: 100%;
      height: 400px;
      border-radius: 10px;
      color: white;
      position: relative;
    }

    .comms {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 400px;
    }

    .utilisateur {
      color: 224860;
      font-family: "notosans";
      font-size: 20px;
    }

    .date {
      color: black;
      font-family: "notosans";
      font-size: 20px;
    }

    .comm-en-question {
      font-family: "notosans";
      font-size: 20px;
    }

    .champ-a-remplir {
      display: flex;
      flex-direction: row;
      margin-top: 15%;
      height: 100px;
      position: absolute;
    }

    .post {
      background: #1AAB8A;
      color: #fff;
      border: none;
      position: relative;
      height: 60px;
      font-size: 1.6em;
      padding: 0 2em;
      cursor: pointer;
      transition: 800ms ease all;
      outline: none;
    }

    .post:hover {
      background: #fff;
      color: #1AAB8A;
    }

    .post:before,
    button:after {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      height: 2px;
      width: 0;
      background: #1AAB8A;
      transition: 400ms ease all;
    }

    .post:after {
      right: inherit;
      top: inherit;
      left: 0;
      bottom: 0;
    }

    .post:hover:before,
    .post:hover:after {
      width: 100%;
      transition: 800ms ease all;
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
    <p1>Commentaires</p1><br />
    <article>
      <div class="cadre">
        <div class="comms">
          <?php
          // Je sélectionne la BDD commentaires pour en récupérer les données.
          $request = $bdd->query('SELECT commentaires.commentaire,utilisateurs.login,commentaires.date FROM commentaires LEFT JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id');
          ?>
          <?php
          while ($data = $request->fetch())
          {
            // Liste des commentaires
            echo "<ul><b><p2 class=\"utilisateur\">Utilisateur : " . $data['login'] . "</p2></b></ul><br />
            <ul><b><p2 class= \"date\">Le : " . $data['date'] . "</p2></b></ul><br />
            <ul><b><p2 class= \"comm-en-question\">" . $data['commentaire'] . "</p2></b></ul><br />";
          }
          ?>
        </div>
        <div class="champ-a-remplir">
          <form method="POST" action="commentaire.php" style ="align-items:center">
            <input type="text" name="write-comm" required="required" autocomplete="off" placeholder="Commentaire..."><br /></input>
            <input class="post" type="submit" name="comm"></input>
        </form>
        </div>
      </div>
    </article>
  </main>
  <footer>
    <a href="https://github.com/julien-garcia13/livre-or"><img class="GitHub" src="GitHub_Logo.png" alt="logo"></img></a>
  </footer>
</body>
</html>