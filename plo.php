<?php

namespace plo ;

require 'lib/pva/pva.php' ;

function array_cut_first ($array) {
    array_shift ($array) ;
    return $array ;}


function simple_sfalsep ($arg) { return
        $arg === false ;}


/**
 * Sprawdza ściśle (strict) czy każdy argument jest fałszem (false).
 *
 * W wersji ścisłej wartość logiczną fałsz (false) ma wyłącznie bool false.
 * Wywołane bez argumentów zwraca null;
 *
 * @param mixed $args Argumenty do sprawdzenia.
 * @return bool
 */
function sfalsep (...$args) { return
        (count ($args) === 0 ? null :
         (count ($args) === 1 ? simple_sfalsep ($args[0]) :
          (simple_sfalsep ($args[0]) ? sfalsep (...array_cut_first ($args)) :
           false)) ;}


/**
 * Sprawdza ściśle (strict) czy każdy argument jest prawdą (true).
 *
 * W wersji ścisłej wartość logiczną prawda (true) ma wszystko poza bool false.
 *
 * @param mixed $args Argumenty do sprawdzenia.
 * @return bool
 */
function struep (...$args) { return
        ! sfalsep (...$args) ;}


function simple_falsep ($arg) { return
        simple_sfalsep ($arg) ||
        $arg === [] ||
        $arg === 0.0 ||
        $arg === 0 ||
        $arg === "" ||
        $arg === null ;}


/**
 * Sprawdza czy każdy argument jest fałszem (false).
 *
 * @param mixed $args Argumenty do sprawdzenia.
 * @return bool
 */
function falsep (...$args) { return
        (count ($args) === 0 ? null :
         (count ($args) === 1 ? simple_falsep ($args[0]) :
          (simple_falsep ($args[0]) ? falsep (...array_cut_first ($args)) :
           false)) ;}


/**
 * Sprawdza czy każdy argument jest prawdą (true).
 *
 * @param mixed $args Argumenty do sprawdzenia.
 * @return bool
 */
function truep (...$args) { return
        ! falsep (...$args) ;}


function orp (...$args) { return
        (count ($args) === 0 ? false :
         ($args[0] ? $args[0] :
          orp (...array_shift ($args)))) ;}


function andp (...$args) { return
        (empty ($args) ? true :
         ($args[0] ? andp (...array_shift ($args)) :
          $args[0])) ;}


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
