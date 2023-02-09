<?php

//CLIENT

function creerClient($pseudoClient, $passwordClient, $emailClient, $idClub)
{
    global $wpdb;
    //Création du client
    $user_id = wp_create_user($pseudoClient, $passwordClient, $emailClient);
    $user_id_role = new WP_User($user_id);
    //Affectation du client à son role de client adhérant au club
    $user_id_role->set_role('clientadherent');
    $user_id_role->add_role('paiementencours');
    //Affectation du client à son club
    $query = $wpdb->prepare(
        "UPDATE `z00b_users` SET `id_club`= %d WHERE `user_login`= %s ",
        array($idClub, $pseudoClient)
    );
    return $wpdb->get_results($query);
}

function getClientClub($idClub)
{
    $args = array(
        'role' => 'clientadherent',
        'id_club' => $idClub,
        'orderby' => 'user_nicename',
        'order' => 'ASC',
    );
    return get_users($args);
}

function getUnClient($idClient)
{
    global $wpdb;
    $query = $wpdb->prepare(
        "SELECT `user_nicename`,`user_email` FROM `z00b_users` WHERE `ID` = %d ",
        array($idClient)
    );
    return $wpdb->get_results($query);
}

function updateUnClient($id_client, $pseudo, $mail)
{
    return wp_update_user(
        [
            'ID' => $id_client,
            'user_nicename' => $pseudo,
            'user_email' => $mail,
        ]
    );
}

function deleteClient($id_client)
{
    global $wpdb;
    $query = $wpdb->prepare(
        "UPDATE `z00b_users` SET `id_club`= NULL WHERE `ID` = %d ",
        array($id_client)
    );
    $wpdb->get_results($query);
    return wp_delete_user($id_client, 12);
}

//REFERENT

function getClubReferent($idReferent)
{
    global $wpdb;
    $query = $wpdb->prepare(
        "SELECT id, nom FROM `z00b_club` WHERE `id_referent`= %d ",
        array($idReferent)
    );
    return $wpdb->get_results($query);
}

//COACH

function creerCoach($pseudoCoach, $passwordCoach, $emailCoach, $idClub)
{
    global $wpdb;
    //Création du coach
    $user_id = wp_create_user($pseudoCoach, $passwordCoach, $emailCoach);
    $user_id_role = new WP_User($user_id);
    //Affectation du coach à son role de coach adhérant au club
    $user_id_role->set_role('coach');
    //Affectation du coach à son club
    $query = $wpdb->prepare(
        "UPDATE `z00b_users` SET `id_club`= %d WHERE `ID` = %d ",
        array($idClub, $user_id)
    );
    $wpdb->get_results($query);

    $query = $wpdb->prepare(
        "UPDATE `z00b_club` SET `id_coach`= %d WHERE `id`= %d ",
        array($user_id, $idClub)
    );
    $wpdb->get_results($query);
}

function getUnCoach($idClub)
{
    global $wpdb;
    $query = $wpdb->prepare(
        "SELECT `ID`, `user_nicename`, `user_email` FROM `z00b_users` WHERE `ID` =( SELECT id_coach FROM z00b_club WHERE id = %d );",
        array($idClub)
    );
    return $wpdb->get_results($query);
}

function updateUnCoach($idCoach, $pseudoCoach, $emailCoach)
{
    return wp_update_user(
        [
            'ID' => $idCoach,
            'user_nicename' => $pseudoCoach,
            'user_email' => $emailCoach,
        ]
    );
}

function deleteCoach($id_coach, $idClub)
{
    global $wpdb;

    $query = $wpdb->prepare(
        "UPDATE `z00b_users` SET `id_club` = NULL WHERE `z00b_users`.`ID` = %d ",
        array($id_coach)
    );
    $wpdb->get_results($query);

    $query = $wpdb->prepare(
        "UPDATE `z00b_club` SET `id_coach`= NULL WHERE `id`= %d ",
        array($idClub)
    );
    $wpdb->get_results($query);

    return wp_delete_user($id_coach, 12);
}
