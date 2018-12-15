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
               $args) ;}


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
               $args) ;}


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
               $args) ;}


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
 * @param mixed $args
 * @return bool
 */
function sorp (...$args) { return
        some (single_struep,
              $args) ;}


/**
 * @param mixed $args
 * @return bool
 */
function orp (...$args) { return
        some (single_truep,
              $args) ;}


/**
 * @param mixed $args
 * @return bool
 */
function sandp (...$args) { return
        struep (...$args) ;}


/**
 * @param mixed $args
 * @return bool
 */
function andp (...$args) { return
        truep (...$args) ;}


/**
 * @param mixed $args
 * @return bool
 */
function sxorp (...$args) { return
        sandp (sorp (...$args),
               ! sandp (...$args)) ;}


/**
 * @param mixed $args
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
 * @param mixed $args
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
 * @param mixed $args
 * @return bool
 */
function equalp ($arg0, ...$args) {
    $testp = function ($a) use ($arg0) { return
           single_equalp ($arg0, $a) ;};
    return every ($testp, $args) ;}
