<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class v_menu{

    function show_menu($a) {
        
        $home = ($a == 'home') ? '"active"' : "";
        $about = ($a == 'about') ? '"active"' : "";
        $guestbook = ($a == 'guestbook') ? '"active"' : "";
        $members = ($a == 'members') ? '"active"' : "";
        
        $menu = "<ul>";
        $menu .= "<li>";
        $menu .= anchor("site/home", "Hem", "id=$home");
        $menu .= "</li>";
        $menu .= "<li>";
        $menu .= anchor("site/about", "Om oss", "id=$about");
        $menu .= "</li>";
        $menu .= "<li>";
        $menu .= anchor("guestbook/home", "Gästbok", "id=$guestbook");
        $menu .= "</li>";
        $menu .= "<li>";
        $menu .= anchor("members/home", "Medlemssida", "id=$members");
        $menu .= "</li>";
        $menu .= "</ul>";

        return $menu;
    }
}