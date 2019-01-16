<?php

namespace plo ;

require 'ppt/ppt.php' ;
require '../plo.php' ;

$plo_test_specs = [
    ['single strict false p',
     ['bool false', \plo\single_sfalsep (false), true],
    ]];

\ppt\exit_nicely (\ppt\test_all ($plo_test_specs));
