<h1>Cardio-Club : plugin de gestion de votre club : <u><?=htmlspecialchars($nomClub)?></u></h1>

<?php
if (date('H') >= 00 and date('H') <= 13) {
    echo '<h3 style="margin-top: 1.5em;">Bonjour ' . htmlspecialchars($nomReferent) . ' !</h3>';
} else {
    echo '<h3 style="margin-top: 1.5em;">Bonsoir ' . htmlspecialchars($nomReferent) . ' !</h3>';
}?>
<h4>Pour bien utiliser ce plugin je dois :</h4>
<ul>
    <li style="list-style-type: square;">Le login est unique et ne peut être modifié</li></ul>
<h3>Je souhaite :</h3>
<ul>
    <p>
        <li style="list-style-type: square;">
            Ajouter un client :
            <button onclick="window.location.href = 'https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=ajouterClient';" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 120px; transition: all 0.5s; cursor: pointer; margin: 5px;">
                Ajouter Client
            </button>
        </li>
        <strong>ou bien</strong>
        <li style="list-style-type: square;">
            Gérer mes clients :
            <button onclick="window.location.href = 'https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=gererClient';" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 120px; transition: all 0.5s; cursor: pointer; margin: 5px;">
                Gérer Clients
            </button>
        </li>
        <strong>ou bien</strong>
        <li style="list-style-type: square;">
            Supprimer un client :
            <button onclick="window.location.href = 'https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=supprimerClient';" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 140px; transition: all 0.5s; cursor: pointer; margin: 5px;">
                Supprimer Client
            </button>
        </li>
        <strong>ou bien</strong>
        <li style="list-style-type: square;">
            Ajouter un coach :
            <button onclick="window.location.href = 'https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=ajouterCoach';" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 140px; transition: all 0.5s; cursor: pointer; margin: 5px;">
                Ajouter Coach
            </button>
        </li>
        <strong>ou bien</strong>
        <li style="list-style-type: square;">
            Gérer un coach :
            <button onclick="window.location.href = 'https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=gererCoach';" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 140px; transition: all 0.5s; cursor: pointer; margin: 5px;">
                Gérer Coach
            </button>
        </li>
        <strong>ou bien</strong>
        <li style="list-style-type: square;">
            Supprimer un coach :
            <button onclick="window.location.href = 'https://cardio-training.eu/wp-admin/admin.php?page=gestionClub&option=supprimerCoach';" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 140px; transition: all 0.5s; cursor: pointer; margin: 5px;">
                Supprimer Coach
            </button>
        </li>
    </p>
</ul>
