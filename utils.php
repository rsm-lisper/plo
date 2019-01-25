<?php

namespace plo ;

require_once __DIR__. 'lib/pva/pva.php' ;
use function pva\every ;


/**
 * Reduce2.
 *
 * @param callable $base_testp
 * @param mixed $args
 * @return bool
 */
function reduce2 ($base_testp, ...$args) {
    $last_arg = array_shift ($args) ;
    $testp = function ($a) use ($base_testp, $last_arg) { return
           $base_testp ($last_arg, $last_arg = $a) ;};
    return every ($testp, ...$args) ;}
