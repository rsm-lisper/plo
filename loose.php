<?php

namespace plo ;

require_once __DIR__. 'base.php' ;
require_once __DIR__. 'utils.php' ;

require_once __DIR__. 'lib/pva/pva.php' ;

use function pva\every, pva\some ;


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


/**
 * Logical OR Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function orp (...$args) { return
        some (base_truep,
              $args) ;}


/**
 * Logical AND Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function andp (...$args) { return
        truep (...$args) ;}


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
 * Equal-To Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function equalp (...$args) { return
        test_every (base_equalp,
                    ...$args) ;}
