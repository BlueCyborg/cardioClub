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
    //Affectation du client à son club
    return $wpdb->get_results("UPDATE `z00b_users` SET `id_club`='" . $idClub . "' WHERE `user_login`= '" . $pseudoClient . "' ");
}

function getClientClub($idClub)
{
    global $wpdb;
    return $wpdb->get_results("SELECT `ID`,`user_nicename` FROM `z00b_users` WHERE `id_club` = " . $idClub . " ");
}

function getUnClient($idClient)
{
    global $wpdb;
    return $wpdb->get_results("SELECT `user_nicename`,`user_email` FROM `z00b_users` WHERE `ID` = " . $idClient . " ");
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
    $wpdb->get_results("UPDATE `z00b_users` SET `id_club`= NULL WHERE `ID` =  '" . $id_client . "' ");
    return wp_delete_user($id_client, 12);
}

//REFERENT

function getClubReferent($idReferent)
{
    global $wpdb;
    return $wpdb->get_results("SELECT id, nom FROM `z00b_club` WHERE `id_referent`=" . $idReferent . " ");
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
    $wpdb->get_results("UPDATE `z00b_users` SET `id_club`= " . $idClub . " WHERE `ID` =  '" . $user_id . "' ");
    return $wpdb->get_results("UPDATE `z00b_club` SET `id_coach`='" . $user_id . "' WHERE `id`= '" . $idClub . "' ");
}

function getUnCoach($idClub)
{
    global $wpdb;
    return $wpdb->get_results("SELECT `ID`, `user_nicename`, `user_email` FROM `z00b_users` WHERE `ID` =( SELECT id_coach FROM z00b_club WHERE id = " . $idClub . " );");
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
    $wpdb->get_results("UPDATE `z00b_users` SET `id_club` = NULL WHERE `z00b_users`.`ID` = '" . $id_coach . "';");
    $wpdb->get_results("UPDATE `z00b_club` SET `id_coach`= NULL WHERE `id`= '" . $idClub . "' ");
    return wp_delete_user($id_coach, 12);
}
