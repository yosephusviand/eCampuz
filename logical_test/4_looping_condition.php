<?php
$input = 50;

for ($i = 1; $i <= $input; $i++) {

    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "Foobar ";
    } else if ($i % 5 == 0) {
        echo "bar ";
    } else if ($i % 3 == 0) {
        echo "foo ";
    } else {
        echo "$i ";
    }
}
