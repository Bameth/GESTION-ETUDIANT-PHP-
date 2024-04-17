<form action="<?php echo $WEBROOT ?>" method="post">
<?php $prof = $profs[0]; ?>
    <div class="content-container">
        <div class="student-info">
            <p><strong>Nom : <?php echo $prof["nom"]; ?> </strong></p>
            <p><strong>Prénom : <?php echo $prof["prenom"]; ?> </strong></p>
            <p><strong>Grade : <?php echo $prof["grade"]; ?> </strong></p>   
            <div class="row2">
            <h2 class="h2-p" >Classes</h2>
            <div class="row3">
                <input type="checkbox" value="L1GLRS" name="classe_id"> L1GLRS
                <input type="checkbox" value="L2GLRSA" name="classe_id"> L2GLRSA
                <input type="checkbox" value="L3GLRS" name="classe_id"> L3GLRS
            </div>
            <input type="hidden" name="classe_id" value="<?php echo $profId; ?>">
            <div class="button-container">
            <button type="submit" name="action" value="form-af">Enregistrer</button>
            <button type="reset" name="action" value="form-re-af">Annuler</button>
            </div>
        </div>
        </div>
</form>