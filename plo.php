<?php

namespace plo ;

require 'lib/pva/pva.php' ;

use function pva\every, pva\some ;


/**
 * Single Strict False Predicate.
 *
 * Sprawdza (ściśle) czy $arg jest false. W wersji ścisłej wartość false ma wyłącznie bool false.
 * Funkcja pomocnicza dla sfalse.
 *
 * @param mixed $arg
 * @return bool
 */
function single_sfalsep ($arg) { return
        $arg === false ;}


/**
 * Strict False Predicate.
 *
 * Sprawdza (ściśle) czy każdy z argumentów $args jest false. W wersji ścisłej wartość
 * false ma wyłącznie bool false.
 *
 * @param mixed $args
 * @return bool
 */
function sfalsep (...$args) { return
        every (single_sfalsep,
               ...$args) ;}


/**
 * Strict True Predicate.
 *
 * Sprawdza (ściśle) czy każdy z argumentów $args jest true. W wersji ścisłej wartość  true ma
 * wszystko poza bool false.
 *
 * @param mixed $args
 * @return bool
 */
function struep (...$args) { return
        ! sfalsep (...$args) ;}


/**
 * Single False Predicate.
 *
 * Sprawdza czy $arg jest false. W wersji zwykłej, wartość false mają:
 * - null
 * - bool false
 * - int 0
 * - float 0.0
 * - string ''
 * - array []
 * Funkcja pomocnicza dla falsep.
 *
 * @param mixed $arg
 * @return bool
 */
function single_falsep ($arg) { return
        single_sfalsep ($arg) ||
        $arg === null ||
        $arg === 0 ||
        $arg === 0.0 ||
        $arg === '' ||
        $arg === [] || ;}


/**
 * False Predicate.
 *
 * Sprawdza czy każdy z argumentów $args jest false. W wersji zwykłej, wartość false mają:
 * - null
 * - bool false
 * - int 0
 * - float 0.0
 * - string ''
 * - array []
 *
 * @param mixed $args
 * @return bool
 */
function falsep (...$args) { return
        every (single_falsep,
               ...$args) ;}


/**
 * True Predicate.
 *
 * Sprawdza czy każdy z argumentów jest true. W wersji zwykłej wartość true ma wszystko co nie
 * jest falsep.
 *
 * @param mixed $args
 * @return bool
 */
function truep (...$args) { return
        ! falsep (...$args) ;}


/**
 * Single Strict Null Predicate.
 *
 * Sprawdza (ściśle) czy $arg jest null. W wersji ścisłej tylko i wyłącznie null jest null.
 * Funkcja pomocnicza dla snullp.
 *
 * @param mixed $arg
 * @return bool
 */
function single_snullp ($arg) { return
        $arg === null ;}


/**
 * Strict Null Predicate.
 *
 * Sprawdza cza każdy z argumentów $args jest null. W wersji ścisłej tylko i wyłącznie null
 * jest null.
 *
 * @param mixed $args
 * @return bool
 */
function snullp (...$args) { return
        every (single_snullp,
               ...$args) ;}


/**
 * Single Null Predicate.
 *
 * Sprawdza czy $arg jest null. W wersji zwykłej null są:
 * - null
 * - bool false
 * - int 0
 * - float 0.0
 * - string ''
 * - array []
 * czyli wszystko to co jest też falsep. Funkcja pomocnicza dla nullp.
 *
 * @param mixed $arg
 * @return bool
 */
function single_nullp ($arg) { return
        single_falsep ($arg) ;}


/**
 * Null Predicate.
 *
 * Sprawdza czy każdy z argumentów $args jest null. W wersji zwykłej null są:
 * - null
 * - bool false
 * - int 0
 * - float 0.0
 * - string ''
 * - array []
 * czyli wszystko to co jest też falsep.
 *
 * @param mixed $args
 * @return bool
 */
function nullp (...$args) { return
        falsep (...$args) ;}


/**
 * Logical Strict OR Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function sorp (...$args) { return
        some (single_struep,
              $args) ;}


/**
 * Logical OR Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function orp (...$args) { return
        some (single_truep,
              $args) ;}


/**
 * Logical Strict AND Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function sandp (...$args) { return
        struep (...$args) ;}


/**
 * Logical AND Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function andp (...$args) { return
        truep (...$args) ;}


/**
 * Logical Strict XOR Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function sxorp (...$args) { return
        sandp (sorp (...$args),
               ! sandp (...$args)) ;}


/**
 * Logical XOR Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function xorp (...$args) { return
        andp (orp (...$args),
              ! andp (...$args)) ;}


/**
 * Single Strict Equal-To Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function single_sequalp ($a, $b) { return
        $a === $b ;}


/**
 * Test Every.
 *
 * @param callable $single_testp
 * @param mixed $args
 * @return bool
 */
function test_every ($single_testp, ...$args) {
    $last_arg = array_shift ($args) ;
    $testp = function ($a) use ($single_testp, $last_arg) { return
           $single_testp ($last_arg, $last_arg = $a) ;};
    return every ($testp, ...$args) ;}


/**
 * Strict Equal-To Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function sequalp (...$args) { return
        test_every (single_sequalp,
                    ...$args) ;}


/**
 * Single Equal-To Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function single_equalp ($a, $b) { return
        $a == $b ;}


/**
 * Equal-To Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function equalp (...$args) { return
        test_every (single_equalp,
                    ...$args) ;}


/**
 * Single Strict Less-Than Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function single_slessp ($a, $b) { return
        sandp (gettype ($a) === gettype ($b),
               $a < $b) ;}


/**
 * Strict Less-Than Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function slessp (...$args) { return
        test_every (single_slessp,
                    ...$args) ;}


/**
 * Single Strict Greaten-Than Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function single_sgreaterp ($a, $b) { return
        andp (gettype ($a) === gettype ($b),
              $a > $b) ;}


/**
 * Strict Greater-Than Predicate.
 *
 * @param mixed $args
 * @param bool
 */
function sgreaterp (...$args) { return
        test_every (single_sgreaterp,
                    ...$args) ;}
