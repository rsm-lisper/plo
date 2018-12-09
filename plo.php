<?php

namespace plo ;

require 'lib/pva/pva.php' ;

use function pva\every, pva\some ;


function single_sfalsep ($arg) { return
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


function single_snullp ($arg) { return
        $arg === null ;}


function snullp (...$args) { return
        every (single_snullp,
               $args) ;}


function single_nullp ($arg) { return
        single_falsep ($arg) ;}


function nullp (...$args) { return
        falsep (...$args) ;}


function sorp (...$args) { return
        some (single_struep,
              $args) ;}


function orp (...$args) { return
        some (single_truep,
              $args) ;}


function sandp (...$args) { return
        struep (...$args) ;}


function andp (...$args) { return
        truep (...$args) ;}


function sxorp (...$args) { return
        sandp (sorp (...$args),
               ! sandp (...$args)) ;}


function xorp (...$args) { return
        andp (orp (...$args),
              ! andp (...$args)) ;}


function single_sequalp ($a, $b) { return
        $a === $b ;}


function single_equalp ($a, $b) { return
        $a == $b ;}
