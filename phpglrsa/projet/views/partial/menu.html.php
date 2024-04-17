<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php $WEBROOT?>style.css/style1.css/style2.css">
  <link rel="stylesheet" href="<?php $WEBROOT?>all.css">
</head>
<body>
  <!-- NAV ETUDIANT -->
<?php if($_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
<header>
  <img src="<?=$WEBROOT?>/img/demander.png" accesskey="" alt="Student Photo" class="img1"> 
  <a href="<?php $WEBROOT?>?action=liste" class="a1">Demandes</a>
  <img src="<?=$WEBROOT?>/img/etudiant.png" alt="Student Photo" class="img2">
  <p class="p1"><strong>Nom : <?= $_SESSION["userConnect"]["nom"]?> et Prénom : <?= $_SESSION["userConnect"]["prenom"] ?></strong></p>
  <p class="p1"><strong>Classe : <?=$_SESSION["userConnect"]["libelle"]?></strong></p>
  <p class="p1"><strong>Année Scolaire : <?= $_SESSION["anneeEncours"]["nom"]?></strong></p> 
  <a class="a2" href="<?php $WEBROOT?>?action=logout" type="button">Deconnexion</a>      
  <div class="logo">
  <h1><span class="green">Ec</span><span class="yellow">o</span><span class="red">le</span> <span class="green">2</span><span class="yellow">2</span><span class="red">1</span></h1>
  </div>
</header>
<?php endif ?>
<!-- NAV AC -->
<?php if($_SESSION["userConnect"]["role"]=="ROLE_AC"):?>
<header>
  <img src="<?=$WEBROOT?>/img/demander.png" accesskey="" alt="Student Photo" class="img1"> 
  <a href="<?php $WEBROOT?>?action=liste-ac" class="a1">Demandes</a>
  <img src="<?=$WEBROOT?>/img/etudiant.png" alt="Student Photo" class="img2">
  <p class="p1"><strong>Nom : <?= $_SESSION["userConnect"]["nom"]?> et Prénom : <?= $_SESSION["userConnect"]["prenom"] ?></strong></p>
  <?php if($_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
  <p class="p1"><strong>Classe : <?=$_SESSION["nom"]["nom"]?></strong></p>
  <?php endif ?>
  <p class="p1"><?= $_SESSION["userConnect"]["role"]?></p>
  <p class="p1"><strong>Année Scolaire : <?=$anneeEncours['nom']?></strong></p> 
  <a class="a2" href="<?php $WEBROOT?>?action=logout" type="button">Deconnexion</a>      
  <div class="logo">
  <h1><span class="green">Ec</span><span class="yellow">o</span><span class="red">le</span> <span class="green">2</span><span class="yellow">2</span><span class="red">1</span></h1>
  </div>
</header>
<?php endif ?>
<!-- NAV RP -->
<?php if($_SESSION["userConnect"]["role"]=="ROLE_RP"):?>
<header>
  <img src="<?=$WEBROOT?>/img/demander.png" accesskey="" alt="Student Photo" class="img1"> 
  <a href="<?php $WEBROOT?>?action=liste-classes-rp" class="a4">Classes</a>
  <a href="<?php $WEBROOT?>?action=liste-classes-rp" class="a5">Liste classes</a>
  <a href="<?php $WEBROOT?>?action=liste-profs-rp" class="a5">Liste profs</a>
  <img src="<?=$WEBROOT?>/img/etudiant.png" alt="Student Photo" class="img2">
  <p class="p1"><strong>Nom : <?= $_SESSION["userConnect"]["nom"]?> et Prénom : <?= $_SESSION["userConnect"]["prenom"] ?></strong></p>
  <?php if($_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
  <p class="p1"><strong>Classe : <?=$_SESSION["nom"]["nom"]?></strong></p>
  <?php endif ?>
  <p class="p1"><?= $_SESSION["userConnect"]["role"]?></p>
  <p class="p1"><strong>Année Scolaire : <?=$anneeEncours['nom']?></strong></p> 
  <a class="a2" href="<?php $WEBROOT?>?action=logout" type="button">Deconnexion</a>      
  <div class="logo">
  <h1><span class="green">Ec</span><span class="yellow">o</span><span class="red">le</span> <span class="green">2</span><span class="yellow">2</span><span class="red">1</span></h1>
  </div>
</header>
<?php endif ?>
</body>
</html>
