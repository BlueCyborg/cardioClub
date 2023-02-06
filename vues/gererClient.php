<h1>Cardio-Club gestion d'un client :</h1>
<br>
<?php
if (isset($_POST['id_client'])) {?>
    <form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=gererClient" method="POST">
        <?php $client = getUnClient($_POST["id_client"]);?>
        <p>
            <strong>Client : <?=htmlspecialchars($client[0]->user_nicename)?></strong><br><br>
            <input name="id_client" type="hidden" value="<?=$_POST["id_client"]?>">

            Pseuso : <input type='text' name='user_nicename' placeholder='User Login' value='<?=$client[0]->user_nicename?>' required>

            Mail : <input type='text' name='user_email' placeholder='User Mail' value='<?=$client[0]->user_email?>' required>
        </p>
        <button type="submit" name="modifierClient" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
            Modifier
        </button>
    </form>
<?php } else {
    $clients = getClientClub($idClub);?>
    <p>Client à modifier :</p>
    <form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=gererClient" method="POST">
        <select name="id_client">
            <?php foreach ($clients as $unClient) {?>
                <option value='<?=$unClient->ID?>'>
                    <?=htmlspecialchars($unClient->user_nicename)?>
                </option>
            <?php }?>
        </select>
        <br><br>
        <button type="submit" name="gererClient" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
            Modifier
        </button>
    </form>
<?php }?>