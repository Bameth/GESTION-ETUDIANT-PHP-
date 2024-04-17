<form action="<?php echo $WEBROOT ?>" method="post">
    <?php $prof = $profs[1]; ?>
    <div class="content-container">
        <div class="student-info">
            <p><strong>Nom : <?php echo $prof["nom"]; ?> </strong></p>
            <p><strong>Prénom : <?php echo $prof["prenom"]; ?> </strong></p>
            <p><strong>Grade : <?php echo $prof["grade"]; ?> </strong></p>


            <div class="row2">
            <h2 class="h2-p" >Modules</h2>
            <div class="row3">
                <input type="checkbox" value="PHP" name="modules[]"> PHP
                <input type="checkbox" value="ALGO" name="modules[]"> ALGO
                <input type="checkbox" value="UML" name="modules[]"> UML
                <input type="checkbox" value="PYTHON" name="modules[]"> PYTHON
            </div>
            <div class="button-container">
            <button type="submit" name="action" value="form-mo">Enregistrer</button>
            <button type="reset" name="action" value="form-re-mo">Annuler</button>
            </div>
        </div>
        </div>
</form>