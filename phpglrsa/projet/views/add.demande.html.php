<main>
    <form action="<?php echo $WEBROOT ?>" method="post">
        <div class="form-container">
            <h2>Faire une Demande</h2>
            <img class="img3" src="<?= $WEBROOT ?>/img/liste-de-controle.png" alt="">
            
            <label for="type"><strong>Type</strong></label>
            <select name="type" class="select-add">
                <option value="suspension">Suspension</option>
                <option value="annulation">Annulation</option>
              </select>
            <br>
            <label for="motif"><strong>Motif</strong></label>
            <textarea name="motif" rows="5" placeholder="Expliquez votre motif"></textarea>
            <br>
            <div class="button-container">
                <button type="submit" name="action" value="form-add-demande" >Enregistrer</button>
                <button type="reset" name="action" value="form-reset-demande">Annuler</button>
            </div>
        </div>
    </form>
</main>