<?php

function creerClient($pseudoClient, $passwordClient, $emailClient)
{
    $user_id = wp_create_user($pseudoClient, $passwordClient, $emailClient);
    $user_id_role = new WP_User($user_id);
    $user_id_role->set_role('clientadherent');
}