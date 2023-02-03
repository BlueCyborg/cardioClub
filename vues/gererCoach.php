<h1>Cardio-Club gestion d'un coach :</h1>
<br>
<?php
$coach = getUnCoach($idClub);?>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=gererCoach" method="POST">
    <p>
        <strong>Coach : <?=$coach[0]->user_nicename?></strong><br><br>
        <input name="id_coach" type="hidden" value="<?=$coach[0]->ID?>">
        Pseuso : <input type='text' name='user_nicename' placeholder='User Login' value='<?=$coach[0]->user_nicename?>' required>
        Mail : <input type='text' name='user_email' placeholder='User Mail' value='<?=$coach[0]->user_email?>' required>
    </p>
    <button type="submit" name="modifierCoach" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Modifier
    </button>
</form>