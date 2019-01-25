<?php

namespace plo ;

require_once __DIR__. 'base_types.php' ;
require_once __DIR__. 'utils.php' ;

require_once __DIR__. 'lib/pva/pva.php' ;
use function pva\every, pva\some ;


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
        every (base_sfalsep,
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
 * Strict Null Predicate.
 *
 * Sprawdza cza każdy z argumentów $args jest null. W wersji ścisłej tylko i wyłącznie null
 * jest null.
 *
 * @param mixed $args
 * @return bool
 */
function snullp (...$args) { return
        every (base_snullp,
               ...$args) ;}


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
        every (base_falsep,
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
