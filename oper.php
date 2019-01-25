<?php

namespace plo ;

require_once __DIR__. 'base_oper.php' ;
require_once __DIR__. 'utils.php' ;

require_once __DIR__. 'lib/pva/pva.php' ;
use function pva\every, pva\some ;


/**
 * Logical Strict OR Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function sorp (...$args) { return
        some (base_struep,
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
 * Logical Strict XOR Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function sxorp (...$args) { return
        sandp (sorp (...$args),
               ! sandp (...$args)) ;}


/**
 * Strict Equal-To Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function sequalp (...$args) { return
        reduce2 (base_sequalp,
                 ...$args) ;}


/**
 * Strict Equal-To Predicate Alias.
 *
 * @param mixed $args
 * @return bool
 */
function eq (...$args) { return
        sequalp (...$args) ;}


/**
 * Strict Less-Than Predicate.
 *
 * @param mixed $args
 * @return bool
 */
function slessp (...$args) { return
        reduce2 (base_slessp,
                 ...$args) ;}


/**
 * Strict Greater-Than Predicate.
 *
 * @param mixed $args
 * @param bool
 */
function sgreaterp (...$args) { return
        reduce2 (base_sgreaterp,
                 ...$args) ;}


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
        reduce2 (base_equalp,
                 ...$args) ;}
