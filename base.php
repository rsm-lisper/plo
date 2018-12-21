<?php

namespace plo ;


/**
 * Base Strict False Predicate.
 *
 * Sprawdza (ściśle) czy $arg jest false. W wersji ścisłej wartość false ma wyłącznie bool false.
 * Funkcja pomocnicza dla sfalse.
 *
 * @param mixed $arg
 * @return bool
 */
function base_sfalsep ($arg) { return
        $arg === false ;}


/**
 * Base False Predicate.
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
function base_falsep ($arg) { return
        base_sfalsep ($arg) ||
        $arg === null ||
        $arg === 0 ||
        $arg === 0.0 ||
        $arg === '' ||
        $arg === [] ;}


/**
 * Base Strict Null Predicate.
 *
 * Sprawdza (ściśle) czy $arg jest null. W wersji ścisłej tylko i wyłącznie null jest null.
 * Funkcja pomocnicza dla snullp.
 *
 * @param mixed $arg
 * @return bool
 */
function base_snullp ($arg) { return
        $arg === null ;}


/**
 * Base Null Predicate.
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
function base_nullp ($arg) { return
        base_falsep ($arg) ;}


/**
 * Base Strict Equal-To Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function base_sequalp ($a, $b) { return
        $a === $b ;}


/**
 * Base Equal-To Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function base_equalp ($a, $b) { return
        $a == $b ;}


/**
 * Base Strict Less-Than Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function base_slessp ($a, $b) { return
        sandp (base_sequalp (gettype ($a),
                             gettype ($b)),
               $a < $b) ;}


/**
 * Base Strict Greaten-Than Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function base_sgreaterp ($a, $b) { return
        sandp (base_sequalp (gettype ($a),
                             gettype ($b)),
               $a > $b) ;}
