<?php


function practice_user_contacts_methods($methods){

    $methods['twitter'] = __( 'Twitter', 'practice' );
    $methods['facebook'] = __( 'Facebook', 'practice' );
    $methods['linkedin'] = __( 'Linkedin', 'practice' );
    return $methods;

}

add_filter( 'user_contactmethods', 'practice_user_contacts_methods' );