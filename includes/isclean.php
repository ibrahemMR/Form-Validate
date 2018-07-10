<?php

function is_clean ($string) {
    return ! preg_match("/[^a-z\d_-]/i", $string);
}
?>