<?php

namespace plo ;

require 'lib/pva/pva.php' ;

use function pva\every, pva\some ;


/**
 * @param mixed $arg
 * @return bool
 */
function single_sfalsep ($arg) { return
        $arg === false ;}


/**
 * Sprawdza ściśle (strict) czy każdy argument jest fałszem (false).
 *
 * W wersji ścisłej wartość logiczną fałsz (false) ma wyłącznie bool false.
 *
 * @param mixed $args Argumenty do sprawdzenia.
 * @return bool
 */
function sfalsep (...$args) { return
        every (single_sfalsep,
               $args) ;}


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


/**
 * @param mixed $arg
 * @return bool
 */
function single_falsep ($arg) { return
        single_sfalsep ($arg) ||
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
        every (single_falsep,
               $args) ;}


/**
 * Sprawdza czy każdy argument jest prawdą (true).
 *
 * @param mixed $args Argumenty do sprawdzenia.
 * @return bool
 */
function truep (...$args) { return
        ! falsep (...$args) ;}


/**
 * @param mixed $arg
 * @return bool
 */
function single_snullp ($arg) { return
        $arg === null ;}


/**
 * @param mixed ...$args
 * @return bool
 */
function snullp (...$args) { return
        every (single_snullp,
               $args) ;}


/**
 * @param mixed $arg
 * @return bool
 */
function single_nullp ($arg) { return
        single_falsep ($arg) ;}


/**
 * @param mixed ...$args
 * @return bool
 */
function nullp (...$args) { return
        falsep (...$args) ;}


/**
 * @param mixed ...$args
 * @return bool
 */
function sorp (...$args) { return
        some (single_struep,
              $args) ;}


/**
 * @param mixed ...$args
 * @return bool
 */
function orp (...$args) { return
        some (single_truep,
              $args) ;}


/**
 * @param mixed ...$args
 * @return bool
 */
function sandp (...$args) { return
        struep (...$args) ;}


/**
 * @param mixed ...$args
 * @return bool
 */
function andp (...$args) { return
        truep (...$args) ;}


/**
 * @param mixed ...$args
 * @return bool
 */
function sxorp (...$args) { return
        sandp (sorp (...$args),
               ! sandp (...$args)) ;}


/**
 * @param mixed ...$args
 * @return bool
 */
function xorp (...$args) { return
        andp (orp (...$args),
              ! andp (...$args)) ;}


/**
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function single_sequalp ($a, $b) { return
        $a === $b ;}


/**
 * @param mixed $arg0
 * @param mixed ...$args
 * @return bool
 */
function sequalp ($arg0, ...$args) {
    $testp = function ($a) use ($arg0) { return
           single_sequalp ($arg0, $a) ;};
    return every ($testp, $args) ;}


/**
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function single_equalp ($a, $b) { return
        $a == $b ;}


/**
 * @param mixed $arg0
 * @param mixed ...$args
 * @return bool
 */
function equalp ($arg0, ...$args) {
    $testp = function ($a) use ($arg0) { return
           single_equalp ($arg0, $a) ;};
    return every ($testp, $args) ;}
