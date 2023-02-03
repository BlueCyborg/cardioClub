<h1>Cardio-Club suppression d'un Coach :</h1>
<br>
<?php $coach = getUnCoach($idClub);?>
<p>Cliquer sur le bouton pour supprimer le coach :</p>
<form action="https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=supprimerCoach" method="POST">
    <input type="hidden" name="id_coach" value="<?=$coach[0]->ID?>">
    <button type="submit" name="supprimerCoach" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Supprimer
    </button>
</form>