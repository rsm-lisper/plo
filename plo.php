<?php

namespace plo;

function equalp ($a, $b) {
    return $a == $b;
}

function sequalp ($a, $b) {
    return $a === $b;
}

function nullp ($a) {
    return equalp ($a, null);
}

function snullp ($a) {
    return sequal ($a, null);
}
