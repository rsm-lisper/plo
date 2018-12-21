<?php

namespace plo ;

require_once __DIR__. 'lib/pva/pva.php' ;

use function pva\every ;


/**
 * Test Every.
 *
 * @param callable $base_testp
 * @param mixed $args
 * @return bool
 */
function test_every ($base_testp, ...$args) {
    $last_arg = array_shift ($args) ;
    $testp = function ($a) use ($base_testp, $last_arg) { return
           $base_testp ($last_arg, $last_arg = $a) ;};
    return every ($testp, ...$args) ;}
