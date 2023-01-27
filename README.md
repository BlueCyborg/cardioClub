# cardioClub
//Fonctions pour ajouter plusieurs roles à un utilisateur
$someone = new WP_User( $user_id );
$someone->add_role( 'role-1' );
$someone->add_role( 'role-2' );