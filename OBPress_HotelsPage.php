<?php
/*
  Plugin name: OBPress Hotels List by Zyrgon
  Plugin uri: www.zyrgon.net
  Text Domain: OBPress_HotelsPage
  Description: Widgets to OBPress
  Version: 0.0.1
  Author: Zyrgon
  Author uri: www.zyrgon.net
  License: GPlv2 or Later
*/

//Show Elementor plugins only if api token and chain/hotel are set in the admin
if (get_option('obpress_api_set') == true) {
  require_once('elementor/init.php');
}



require_once(WP_PLUGIN_DIR . '/OBPress_HotelsPage/plugin-update-checker-4.11/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/emanuelzyrgon/OBPress_HotelsPage',
    __FILE__,
    'OBPress_HotelsPage'
);

// //Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');
