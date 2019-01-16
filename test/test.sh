#!/bin/sh

php test.php
ex=$?
if (( $ex == 0 )); then echo "TEST OK"; fi
exit $ex
