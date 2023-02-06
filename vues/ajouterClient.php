<h1>Cardio-Club création d'un nouveau client :</h1>
<br>
<?php
function createPass($longueur_pass) //Générateur de mot de passe fort

{
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789/#@-_!'), 1, $longueur_pass);
}
if (isset($_POST['nb_client'])) {?>
    <form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=ajouterClient" method="POST">
    <br>
    <?php
for ($i = 1; $i <= $_POST['nb_client']; $i++) {?>
        <h3>Client n°<?=htmlspecialchars($i)?></h3>
        <input type="hidden" name="nb_clients" value="<?=$_POST['nb_client']?>">
        <br>
        <label for="pseudo_client_n<?=$i?>">Pseudo/Login du client : </label>
        <input type="text" maxlength="50" id="pseudo_client_n<?=$i?>" name="pseudo_client_n<?=$i?>" placeholder="Pseudo client" required>
        <br><br>
        <label for="password_client_n<?=$i?>">Choisisez le mot de passe du client : </label>
        <input type="text" value="<?=createPass(12)?>" id="password_client_n<?=$i?>" name="password_client_n<?=$i?>" placeholder="Mot de passe client" required>
        <br><br>
        <label for="mail_client_n<?=$i?>">Entrez le mail du client : </label>
        <input type="mail" id="mail_client_n<?=$i?>" name="mail_client_n<?=$i?>" placeholder="Mail" required>
        <br><br>
    <?php }?>
        <br>
        <button type="submit" name="ajouterClients" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
            Valider
        </button>
    </form>
<?php } else {?>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=ajouterClient" method="POST">
    <br>
    <label for="nb_client">Quel nombre de clients voulez-vous ajouter ?</label>
    <br><br>
    <input type="number" style="width: 150px;" min="1" max="20" id="nb_client" name="nb_client" required>
    <br><br>
    <button type="submit" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Valider
    </button>
</form>
<?php }?>