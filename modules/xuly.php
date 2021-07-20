<?php
function checkStringInput($input)
{
    $charSpecial = ['\\', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '+', '-', '*', '/', '[', ']', '{', '}', '|', '\'', '"', '<', '>', '?'];
    for ($i = 0; $i < count($charSpecial); $i++) {
        $input = str_replace($charSpecial[$i], "", $input);
    }
    return $input;
}

?>