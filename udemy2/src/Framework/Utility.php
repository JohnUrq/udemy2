<?php

namespace Framework;

class Utility {  
    public static function debug($data) {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die('Debug function complete.');
    }
}
