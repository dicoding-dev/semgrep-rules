<?php

// ok: php-filter-inclusion
include "a";
// ok: php-filter-inclusion
require "b";
// ok: php-filter-inclusion
include_once "a";
// ok: php-filter-inclusion
require_once "b";

class SebuahClass {
    public function load($url) {
        // ruleid: php-filter-inclusion
        include $url;
        // ruleid: php-filter-inclusion
        require $url;
        // ruleid: php-filter-inclusion
        include_once $url;
        // ruleid: php-filter-inclusion
        require_once $url;

        // ruleid: php-filter-inclusion
        include "a.php";
        // ruleid: php-filter-inclusion
        require "a.php";
        // ruleid: php-filter-inclusion
        include_once "a.php";
        // ruleid: php-filter-inclusion
        require_once "a.php";

        // ok: php-filter-inclusion
        // require something
        // ok: php-filter-inclusion
        # include something
        // ok: php-filter-inclusion
        /* require_once something */
        // ok: php-filter-inclusion
        // include once something
    }

    public function loadViaIncludeFunction($url) {
        // ruleid: php-filter-inclusion
        include($url);
        // ruleid: php-filter-inclusion
        include_once($url);
        // ruleid: php-filter-inclusion
        require($url);
        // ruleid: php-filter-inclusion
        require_once($url);

        // ruleid: php-filter-inclusion
        include("a.php");
        // ruleid: php-filter-inclusion
        include_once("a.php");
        // ruleid: php-filter-inclusion
        require("a.php");
        // ruleid: php-filter-inclusion
        require_once("a.php");

        // ok: php-filter-inclusion
        includeo($url);
    }
}