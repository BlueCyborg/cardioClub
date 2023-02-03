<h1>Cardio-Club création d'un nouveau coach :</h1>
<br>
<?php
function createPass($longueur_pass)
{
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789/#@-_!'), 1, $longueur_pass);
}
//S'il n'a pas de coach, proposer le formulaire
if (is_null(getUnCoach($idClub)) == true) {?>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=ajouterCoach" method="POST">
    <br>
    <h3>Création du coach :</h3>
    <br>
    <label for="pseudo_coach">Pseudo/Login du coach : </label>
    <input type="text" maxlength="50" id="pseudo_coach" name="pseudo_coach" placeholder="Pseudo coach" required>
    <br><br>
    <label for="password_coach">Choisisez le mot de passe du coach : </label>
    <input type="text" value="<?=createPass(12)?>" id="password_coach" name="password_coach" placeholder="Mot de passe coach" required>
    <br><br>
    <label for="mail_coach">Entrez le mail du coach : </label>
    <input type="mail" id="mail_coach" name="mail_coach" placeholder="Mail" required>
    <br><br>
    <button type="submit" name="ajouterCoach" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Valider
    </button>
</form>
<?php } else {?>
    <script>alert('Il y a déjà un coach dans le club');</script>
<?php exit();
}?>