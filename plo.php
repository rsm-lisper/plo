<?php

namespace plo;

function ror (... $args) { return
              empty ($args) ? false :
              ($args[0] ? $args[0] :
               ror (... array_shift ($args)) ;}

function rand (... $args) { return
              empty ($args) ? true :
              ($args[0] ? rand (... array_shift ($args)) :
               $args[0]) ;}

function equalp ($a, $b) { return
        $a == $b ;}

function sequalp ($a, $b) { return
        $a === $b ;}

function nullp ($a) { return
        equalp ($a, null) ;}

function snullp ($a) { return
        sequal ($a, null) ;}
