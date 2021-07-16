<?php

namespace App\Tools;

class PPrint
{
    public static function pretty_print($args)
    {
        echo '<pre>';
        print_r($args);
        echo '</pre>';
    }
}
