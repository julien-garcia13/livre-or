<meta charset="utf-8" />
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', ''); // Je me connecte à phpMyAdmin en appelant ma BDD 'livreor'.
$request = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$data = $request->fetch();
?>
<!-- Début du HTML. -->
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!-- Bootstrap -->
    <title>Commentaires - Livre d'Or</title>
    <!-- CSS -->
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
      position: relative;
      color: gold;
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
    @font-face
    {
      font-family: "notosans";
      src: url("font/notosans-regular-webfont.woff") format("woff"), url("font/notosans-regular-webfont.woff2") format("woff2");
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
    .grid-container
    {
      margin-top: 5%;
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      border: 1px solid gray;
      width: 100%;
      padding: 5px;
    }
    .champ-a-remplir
    {
      display: flex;
      flex-direction: row;
      margin-top: 5%;
      height: 100px;
      justify-content: center;
      position: relative;
    }
    .post
    {
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
    .post:hover
    {
      background: #fff;
      color: #1AAB8A;
    }
    .post:before,
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
    .post:after
    {
      right: inherit;
      top: inherit;
      left: 0;
      bottom: 0;
    }
    .post:hover:before,
    .post:hover:after
    {
      width: 100%;
      transition: 800ms ease all;
    }
    .categories
    {
      display: flex;
      flex-direction: row;
      justify-content: space-around;
      color: white;
      position: relative;
    }
    .user, .date, .comm-en-question
    {
      display: flex;
      color: white;
      align-items: center;
      justify-content: center;
    }
    </style>
    </head>
    <body>
      <img src="images/fond.jpg" class="fond">
      <main>
        <p1>Commentaires</p1><br />
        <article>
          <div class="categories">
            <p2>Utilisateur</p2>
            <p2>Date</p2>
            <p2>Commentaire</p2>
          </div>
          <div class="grid-container">
            <?php
            // Je sélectionne la BDD commentaires pour en récupérer les données.
            $request = $bdd->query('SELECT commentaires.commentaire,utilisateurs.login,commentaires.date FROM commentaires LEFT JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id');
            ?>
            <?php
            while ($data = $request->fetch())
            {
              // Liste des commentaires
              echo "<b><p2 class=\"user\">" . $data['login'] . "</p2></b>
              <b><p2 class= \"date\">" . $data['date'] . "</p2></b></ul>
              <b><p2 class= \"comm-en-question\">" . $data['commentaire'] . "</p2></b>";
            }
            ?>
            </div>
            <div class="champ-a-remplir">
              <form method="POST" action="commentaire.php" style ="align-items:center">
              <input type="text" name="write-comm" required="required" autocomplete="off" placeholder="Commentaire..."><br /></input>
              <input class="post" type="submit" name="comm"></input>
            </form>
          </div>
        </article>
      </main>
      <footer>
        <a href="https://github.com/julien-garcia13/livre-or"><img class="GitHub" src="images/GitHub_Logo.png" alt="logo"></img></a>
      </footer>
    </body>
</html>