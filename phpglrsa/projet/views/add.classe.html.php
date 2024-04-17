<div class="container-classe">    
    <form action="<?php echo $WEBROOT ?>" method="post">
            <div class="form-group1">
            <h3>Libelle</h3>
                <input type="text" id="libelle" name="libelle" required class="input-classe" >
            </div>
            <div class="form-group">
            <h3>Filiere</h3>
                <select id="filiere" name="filiere" required class="select-classe">
                    <option value="GLRS">GLRS</option>
                    <option value="IAGE">IAGE</option>
                    <option value="CPD">CPD</option>
                    <option value="TTL">TTL</option>
                    <option value="MAIE">MAIE</option>
                </select>
            </div>
            <div class="form-group">
                <h3>Niveau</h3>
                <select id="niveau" name="niveau" required class="select-classe" >
                    <option value="Licence1">Licence 1</option>
                    <option value="Licence2">Licence 2</option>
                    <option value="Licence3">Licence 3</option>
                </select>
            </div>
            <div class="button-container">
            <button type="submit" name="action" value="form-add-cl" >Enregistrer</button>
            <button type="reset" name="action" value="form-reset-cl">Annuler</button>
            </div>
    </form>
    </div>