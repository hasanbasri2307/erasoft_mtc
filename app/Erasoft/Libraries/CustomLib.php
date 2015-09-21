<?php
namespace Erasoft\Libraries;

class CustomLib {

    public function __construct()
    {
        print "hey ";
    }

    public static function test()
    {
        echo "saya ".__CLASS__;
        echo "<br>";
        echo __METHOD__;
    }

    public function get()
    {
        echo "hello";
    }
}