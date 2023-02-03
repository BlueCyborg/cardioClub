<?php

/**
 * Gestion de l'affichage administrateur
 */

function add_Admin_Link_2()
{
    add_menu_page(
        __('Club-Management', 'textdomain'),
        'Cardio-Club',
        'can_acces_cardioclub',
        'gestionClub',
        'cardioClubMain',
        'dashicons-universal-access'
    );

    add_submenu_page(
        'gestionClub',
        'Ajouter un client',
        'Ajout Client',
        'can_acces_cardioclub',
        'gestionClub&option=ajouterClient',
        'cardioClubMain'
    );

    add_submenu_page(
        'gestionClub',
        'Gestion d\'un client',
        'Gestion Client',
        'can_acces_cardioclub',
        'gestionClub&option=gererClient',
        'cardioClubMain'
    );

    add_submenu_page(
        'gestionClub',
        'Supprimer un client',
        'Supprimer Client',
        'can_acces_cardioclub',
        'gestionClub&option=supprimerClient',
        'cardioClubMain'
    );

    add_submenu_page(
        'gestionClub',
        'Ajouter un coach',
        'Ajout Coach',
        'can_acces_cardioclub',
        'gestionClub&option=ajouterCoach',
        'cardioClubMain'
    );

    add_submenu_page(
        'gestionClub',
        'Gestion d\'un coach',
        'Gestion Coach',
        'can_acces_cardioclub',
        'gestionClub&option=gererCoach',
        'cardioClubMain'
    );

    add_submenu_page(
        'gestionClub',
        'Supprimer un coach',
        'Supprimer Coach',
        'can_acces_cardioclub',
        'gestionClub&option=supprimerCoach',
        'cardioClubMain'
    );
}

function cardioClubMain()
{
    if (wp_get_current_user()->roles[0] != "referent") {?>
        <script>alert('Vous devez être referent pour pouvoir accéder à ce contenu !\n\nMerci de changer de page !')</script>
        <?php exit();
    }

    $nomReferent = wp_get_current_user()->user_nicename;
    $idClub = (getClubReferent(wp_get_current_user()->id))[0]->id;
    $nomClub = (getClubReferent(wp_get_current_user()->id))[0]->nom;

    if (!isset($_GET['option'])) {
        //L'on inclu la page d'accueil par défaut
        include CC_FILE_PATH . 'vues/main.php';
    } else {

        switch ($_GET['option']) {
            //MAIN
            case 'accueil':
                include CC_FILE_PATH . 'vues/main.php';
                break;

            //Client
            case 'ajouterClient':
                if (isset($_POST['ajouterClients'])) {
                    for ($i = 1; $i <= $_POST['nb_clients']; $i++) {
                        //Création du client dans WordPress
                        creerClient($_POST['pseudo_client_n' . $i . ''], $_POST['password_client_n' . $i . ''], $_POST['mail_client_n' . $i . ''], $idClub);
                        //Envoie d'un mail aux clients pour les signaler qu'ils sont inscrits
                        $to = $_POST['mail_client_n' . $i . ''];
                        $subject = 'Création de votre compte Cardio-Training !';
                        $message = 'Bonjour ' . $_POST['pseudo_client_n' . $i . ''] . ',<br><br>
                        Votre compte Cardio-Training.eu vient d\'être créé, grâce à ' . $nomReferent . ' !<br>
                        Vous pouvez dès à présent vous connecter sur la page <a href="https://cardio-training.eu/login/">connexion</a> du site avec les identifiants suivants : <br>
                        <strong>Pseudo : </strong>' . $_POST['pseudo_client_n' . $i . ''] . '<br>
                        <strong>Mot de passe temporaire </strong> (à changer dès la première connexion via l\'espace "Mon compte") : ' . $_POST['password_client_n' . $i . ''] . '<br>
                        Vous pouvez aussi utiliser votre mail : ' . $_POST['mail_client_n' . $i . ''] . ' comme User pour vous connecter.<br><br>
                        À bientôt sur <a href="https://cardio-training.eu">Cardio-Training.eu</a> !';
                        wp_mail($to, $subject, $message);
                    }
                    include CC_FILE_PATH . 'vues/validation.php';
                } else {
                    include CC_FILE_PATH . 'vues/ajouterClient.php';
                }
                break;

            case 'gererClient':
                if (isset($_POST['modifierClient'])) {
                    updateUnClient($_POST['id_client'], $_POST['user_nicename'], $_POST['user_email']);
                    include CC_FILE_PATH . 'vues/validation.php';
                } else {
                    include CC_FILE_PATH . 'vues/gererClient.php';
                }
                break;

            case 'supprimerClient':
                if (isset($_POST['id_client'])) {
                    deleteClient($_POST['id_client']);
                    include CC_FILE_PATH . 'vues/validation.php';
                } else {
                    include CC_FILE_PATH . 'vues/supprimerClient.php';
                }
                break;

            //Coach
            case 'ajouterCoach':
                if (isset($_POST['ajouterCoach'])) {
                    creerCoach($_POST['pseudo_coach'], $_POST['password_coach'], $_POST['mail_coach'], $idClub);
                    include CC_FILE_PATH . 'vues/validation.php';
                } else {
                    include CC_FILE_PATH . 'vues/ajouterCoach.php';
                }
                break;

            case 'gererCoach':
                if (isset($_POST['modifierCoach'])) {
                    updateUnCoach($_POST['id_coach'], $_POST['user_nicename'], $_POST['user_email']);
                    include CC_FILE_PATH . 'vues/validation.php';
                } else {
                    include CC_FILE_PATH . 'vues/gererCoach.php';
                }
                break;

            case 'supprimerCoach':
                if (isset($_POST['supprimerCoach'])) {
                    deleteCoach($_POST['id_coach'], $idClub);
                    include CC_FILE_PATH . 'vues/validation.php';
                } else {
                    include CC_FILE_PATH . 'vues/supprimerCoach.php';
                }
                break;

            default:
                include CC_FILE_PATH . 'vues/main.php';
                break;
        }
    }
}
