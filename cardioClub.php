<?php
/*
Plugin Name: Cardio-Club
Plugin URI: https://github.com/bluecyborg/cardioClub
Description: Ce plugin permet à un référent de gérer son club !
Version : 1.0
Author URI: https://github.com/bluecyborg/
Author: Mathys
 */

defined('ABSPATH') or die('Désolé, vous n\'avez pas l\'autorisation d\'accéder à cette page.');

define('CC_FILE_PATH', plugin_dir_path(__FILE__));

require 'contents/fonctions.php';
require 'modele/fonctionsBDD.php';

add_action('admin_menu', 'add_Admin_Link_2', 1);
