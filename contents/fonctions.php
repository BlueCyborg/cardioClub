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
        'gestionClub&option=gestionClient',
        'cardioClubMain'
    );

    add_submenu_page(
        'gestionClub',
        'Ajouter un club',
        'Ajout Club',
        'can_acces_cardioclub',
        'gestionClub&option=ajouterClub',
        'cardioClubMain'
    );

    add_submenu_page(
        'gestionClub',
        'Gestion d\'un club',
        'Gestion Club',
        'can_acces_cardioclub',
        'gestionClub&option=gestionClub',
        'cardioClubMain'
    );
}

function cardioClubMain()
{
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
                include CC_FILE_PATH . 'vues/ajouterClient.php';
                break;

            case 'gererClient':
                include CC_FILE_PATH . 'vues/gererClient.php';
                break;

            //Coach
            case 'ajouterCoach':
                include CC_FILE_PATH . 'vues/ajouterClub.php';
                break;

            case 'gererCoach':
                include CC_FILE_PATH . 'vues/gererClub.php';
                break;

            default:
                include CC_FILE_PATH . 'vues/main.php';
                break;
        }
    }
}
