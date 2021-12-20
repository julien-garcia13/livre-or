<?php
// HTML
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Accueil - Livre d'Or</title>
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
    <p1>Bienvenue dans le livret d'Or</p1><br />
    <div class="bouttons">
        <a href="inscription.php"><button>Inscription</button></a>
        <a href="livre-or.php"><button>Livre d'Or</button></a> <!-- Accèdez au Livre d'Or. -->
        <a href="connexion.php"><button>Connexion</button></a>
      </div>
    </main>
    <footer>
        <a href="https://github.com/julien-garcia13/livre-or"><img class="GitHub" src="GitHub_Logo.png" alt="logo"></img></a>
    </footer>
    </body>
</html>
