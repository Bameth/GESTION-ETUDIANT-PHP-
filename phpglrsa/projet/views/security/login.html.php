<main>
    <div class="login-container">
        <form method="post" class="login-form" action="<?php $WEBROOT?>">
            <h2 class="h2-2">Connexion</h2>
            <div class="input-group">
                <label for="email">Adresse email:</label>
                <input class="input2" type="email" id="email" name="email" required>
            </div>
            
            <div class="input-group">
                <label for="password">Mot de passe:</label>
                <input class="input2" type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="button-sub" name="action" value="form-login">Se connecter</button>
        </form>
    </div>
</main>
