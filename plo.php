<?php

namespace plo;

/**
 * Sprawdza czy argument jest prawdą (true).
 *
 * @param mixed $arg Argument do sprawdzenia.
 * @return bool
 */
function truep ($arg) {
    return $arg == true;
}

/**
 * Sprawdza czy argument jest fałszem (false).
 *
 * @param mixed $arg Argument do sprawdzenia.
 * @return bool
 */
function falsep ($arg) {
    return $arg == false;
}


/**
 * Sprawdza ściśle (strict) czy argument jest prawdą (true).
 *
 * @param mixed $arg Argument do sprawdzenia.
 * @return bool
 */
function struep ($arg) {
    return $arg === true;
}


/**
 * Sprawdza ściśle (strict) czy argument jest fałszem (false).
 *
 * @param mixed $arg Argument do sprawdzenia.
 * @return bool
 */
function sfalsep ($arg) {
    return $arg === false;
}


function ror (...$args) {
    return
        (empty($args) ? false :
         ($args[0] ? $args[0] :
          ror(...array_shift($args))));
}


function rand (...$args) {
    return
        (empty($args) ? true :
         ($args[0] ? rand(...array_shift($args)) :
          $args[0]));
}


function equalp ($a, $b) {
    return $a == $b;
}


function sequalp ($a, $b) {
    return $a === $b;
}


function nullp ($a) {
    return equalp($a, null);
}


function snullp ($a) {
    return sequal($a, null);
}
