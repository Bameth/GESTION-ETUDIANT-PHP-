<form action="<?php echo $WEBROOT ?>" method="post" id="myForm" onsubmit="return validateForm()">    <div class="contain">
        <div class="row1">
            <h2 class="h2-p" >Nom</h2>
            <input type="text" class="text1" name="nom">
            <h2 class="h2-p" >prenom</h2>
            <input type="text" class="text1" name="prenom">
        </div>
        <div class="row1">
            <h2 class="h2-p" >Grade</h2>
            <input type="text" class="text1" name="grade">
        </div>
        <div class="row2">
            <h2 class="h2-p" >Modules</h2>
            <div class="row3">
                <input type="checkbox" value="PHP" name="modules[]"> PHP
                <input type="checkbox" value="ALGO" name="modules[]"> ALGO
                <input type="checkbox" value="UML" name="modules[]"> UML
                <input type="checkbox" value="JAVASCRIPT" name="modules[]"> JS 
                <input type="checkbox" value="PYTHON" name="modules[]"> PYTHON
            </div>
        </div>
        <div class="row2">
            <h2 class="h2-p" >Classes</h2>
            <div class="row3">
                <input type="checkbox" value="L1GLRS" name="classe_id[]"> L1GLRS
                <input type="checkbox" value="L2GLRSA" name="classe_id[]"> L2GLRSA
                <input type="checkbox" value="L3GLRS" name="classe_id[]"> L3GLRS
                <input type="checkbox" value="L3CPD" name="classe_id[]"> L3CPD
            </div>
        </div>
        <div class="row4">
            <button type="submit" name="action" value="form-add-pf" >Enregistrer</button>
            <button type="reset" name="action" value="form-reset-pf">Annuler</button>
        </div>
    </div>
</form>
<script>
function validateForm() {
    var modules = document.getElementsByName('modules[]');
    var moduleChecked = false;

    for (var i = 0; i < modules.length; i++) {
        if (modules[i].checked) {
            moduleChecked = true;
            break;
        }
    }

    if (!moduleChecked) {
        alert('Veuillez sélectionner au moins un module.');
        return false;
    }

    return true;
}
</script>