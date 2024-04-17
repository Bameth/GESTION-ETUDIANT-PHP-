<main>
<?php if($_SESSION["userConnect"]["role"]=="ROLE_AC"):?>
    <img class="img4" src="<?=$WEBROOT?>/img/chercher.png" alt="">
    <div class="content-container">
            <div class="student-info">
            <img src="<?=$WEBROOT?>/img/etudiant.png" alt="Student Photo" class="img6">
            <p><strong>Nom : <?= $_SESSION["userConnect"]["nom"]?> et Prénom : <?= $_SESSION["userConnect"]["prenom"] ?></strong></p>
            <p><strong>Classe : <?=$_SESSION["userConnect"]["libelle"]?></strong></p>
            <p><strong>Année Scolaire : <?= $_SESSION["anneeEncours"]["nom"]?></strong></p> 
            </div>
            <?php endif ?>
        <div class="content-container2">
        <div class="student-info">
            
                <p><strong>Année : <?php echo date('Y', strtotime($demandes['date'])); ?> </strong></p>
                <p><strong>Type : <?php echo $demandes['type']; ?> </strong></p>
                <p><strong>Date : <?php echo $demandes['date']; ?> </strong></p>
                <p><strong>Etat : <?php echo $demandes['etat']; ?> </strong></p>
                <div class="motif-container">
                <p><strong>Motif : <?php echo $demandes['motif']; ?></strong></p>
            <?php if($_SESSION["userConnect"]["role"]=="ROLE_AC"):?>
            <div class="button-container">
                    <button type="submit">Annuler</button>
                    <button type="reset">Valider</button>
                </div>
                <?php endif ?>

        </div>
    </div>
    </main>