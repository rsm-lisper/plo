<?php

namespace plo ;


/**
 * Base Strict Equal-To Predicate.
 *
 * Sprawdza (ściśle) czy $a jest równe $b. W wersji ścisłej równe są:
 * - $a === $b
 * - dla iterable gdy wszystkie elementy są ===
 *
 * @todo wersja dla iterable rekurencyjnie
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
 * Sprawdza czy $a jest równe $b. W wersji zwykłej $a jest równe $b gdy (1) $a i $b są tego samego
 * typu (typy numeryczne traktowane są jako zgodne, np int i float są tego samego typu), oraz (2)
 *
 * @todo faktyczna logika
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
        base_sequalp (gettype ($a),
                      gettype ($b))
        &&
        $a < $b ;}


/**
 * Base Strict Greaten-Than Predicate.
 *
 * @param mixed $a
 * @param mixed $b
 * @return bool
 */
function base_sgreaterp ($a, $b) { return
        base_sequalp (gettype ($a),
                      gettype ($b))
        &&
        $a > $b ;}
