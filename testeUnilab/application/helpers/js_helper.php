<?php
/*
 * Helper para dar load em javascripts.
 * @author William Rufino
 * @version 1.0
 * @param array $js
 */

function load_js($js){
    if(!is_array($js)){
        return false;
    }

    $return = '';
    foreach($js as $j){
        $return .= '<script type="text/javascript" src="' . base_url() . 'application/views/js/' . $j . '"></script>' . "\n";
    }
    return $return;
}
?>
