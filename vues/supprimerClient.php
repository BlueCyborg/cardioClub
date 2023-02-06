<h1>Cardio-Club suppression d'un Client :</h1>
<br>
<?php $clients = getClientClub($idClub);?>
    <p>Client à Supprimer :</p>
    <form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=supprimerClient" method="POST">
        <select name="id_client">
            <?php foreach ($clients as $unClient) {?>
                <option value='<?=$unClient->ID?>'>
                    <?=htmlspecialchars($unClient->user_nicename)?>
                </option>
            <?php }?>
        </select>
        <br><br>
        <button type="submit" name="supprimerClient" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
            Supprimer
        </button>
    </form>