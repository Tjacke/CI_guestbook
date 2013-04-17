<?php
class MyMenu {

    function show_menu() {
        $obj =& get_instance();
  	$obj->load->helper('url');
        $menu = "<ul>";
        $menu .= "<li>";
        $menu .= anchor("site/home", "Hem");
        $menu .= "</li>";
        $menu .= "<li>";
        $menu .= anchor("site/about", "Om oss");
        $menu .= "</li>";
        $menu .= "<li>";
        $menu .= anchor("site/getValues", "Gästbok");
        $menu .= "</li>";
        $menu .= "</ul>";

        return $menu;
    }
}