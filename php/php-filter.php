<?php

use Dicoding\DomainServices\Files\CompressionUtility;
class Example
{
    public function read($url)
    {
        // don't remove this line
        // it's used to detect wrong regex used in the rule
        // ok: php-stream-exploit
        if (file_exists($url)) {
            return;
        }
        // ruleid: php-stream-exploit
        echo file_get_contents($url);
    }

    public function readFromRequest()
    {
        // ruleid: php-stream-exploit
        return file_get_contents($_GET['url']);
    }

    public function readFromRequestTwo()
    {
        $url = $_GET['url'];

        // ruleid: php-stream-exploit
        return file_get_contents($url);
    }

    public function safe($url)
    {
        // ok: php-stream-exploit
        echo file_get_contents("/path/to/file");

        // ok: php-stream-exploit
        echo file_get_contents("/path/to/file" . $url);

        // ok: php-stream-exploit
        echo file_get_contents("/path/to/file" + $url);
    }

    public function readFile($url)
    {
        // ruleid: php-stream-exploit
        $a = readfile($url);
        // ruleid: php-stream-exploit
        $b = readfile($_POST['file']);
        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = readfile($newFile);
        // ok: php-stream-exploit
        echo readfile("this/is/safe");

        // ok: php-stream-exploit
        echo readfile("this/is/safe" + $url);
    }

    public function getImageSize($url)
    {
        // ruleid: php-stream-exploit
        $a = getimagesize($url);
        // ruleid: php-stream-exploit
        $b = getimagesize($_POST['file']);
        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = getimagesize($newFile);
        // ok: php-stream-exploit
        echo getimagesize("this/is/safe");

        // ok: php-stream-exploit
        echo getimagesize("this/is/safe" . $url);
    }

    public function md5file($url)
    {
        // ruleid: php-stream-exploit
        $a = md5_file($url);
        // ruleid: php-stream-exploit
        $b = md5_file($_POST['file']);
        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = md5_file($newFile);
        // ok: php-stream-exploit
        return md5_file("this/is/safe");
    }

    public function sha1File($url)
    {
        // ruleid: php-stream-exploit
        $a = sha1_file($url);
        // ruleid: php-stream-exploit
        $b = sha1_file($_POST['file']);
        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = sha1_file($newFile);
        // ok: php-stream-exploit
        return sha1_file("this/is/safe");
    }

    public function hashFile($url)
    {
        // ruleid: php-stream-exploit
        $a = hash_file("sha256", $url);
        // ruleid: php-stream-exploit
        $b = hash_file("sha256", $_POST['file']);
        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = hash_file("sha256", $newFile);
        
        // ok: php-stream-exploit
        echo hash_file("sha256", "this/is/safe");
        // ok: php-stream-exploit
        echo hash_file("sha256", "this/is/safe" + $url);
        // ok: php-stream-exploit
        return hash_file("sha256", "this/is/safe" . $url);
    }

    public function file($url)
    {
        // ruleid: php-stream-exploit
        $a = file($url);
        // ruleid: php-stream-exploit
        $b = file($_POST['file']);
        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = file($newFile);
        // ok: php-stream-exploit
        return file("this/is/safe", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    public function parseIniFile($url)
    {
        // ruleid: php-stream-exploit
        $a = parse_ini_file($url);
        // ruleid: php-stream-exploit
        $b = parse_ini_file($_POST['file']);
        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = parse_ini_file($newFile);
        // ok: php-stream-exploit
        return parse_ini_file("this/is/safe", true);
    }

    public function copyFile($from, $to)
    {
        // ruleid: php-stream-exploit
        $a = copy($from, $to);
        // ruleid: php-stream-exploit
        $b = copy($_POST['file'], $to);

        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = copy($newFile, $to);
        // ok: php-stream-exploit
        return parse_ini_file("this/is/safe", $to);
    }

    public function putContens($file, $content)
    {
        // ruleid: php-stream-exploit
        $a = file_put_contents($file, $content);
        // ruleid: php-stream-exploit
        $b = file_put_contents($_POST['file'], $content);

        $newFile = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = file_put_contents($newFile, $content);
        // ok: php-stream-exploit
        return file_put_contents("this/is/safe", $content);
    }

    public function streamContent($file)
    {
        // ruleid: php-stream-exploit
        $a = stream_get_contents($file);
        // ruleid: php-stream-exploit
        $b = stream_get_contents($_POST['file']);

        $f = $_POST['file'];
        // ruleid: php-stream-exploit
        $c = stream_get_contents($f);
        // ok: php-stream-exploit
        return parse_ini_file("this/is/safe");
    }

    public function fOpen($file)
    {
        // ruleid: php-stream-exploit
        $b = fopen($file, "r");
        // ruleid: php-stream-exploit
        $c = fopen($_POST['file'], "r");

        // ok: php-stream-exploit
        $d = fopen("/this/is/safe", "r");
        // ok: php-stream-exploit
        $e = fopen("/this/is/safe" + $file, "r");
    }

    public function compression($path)
    {
        // ruleid: php-stream-exploit
        CompressionUtility::compressFile($path);
        // ruleid: php-stream-exploit
        \Dicoding\DomainServices\Files\CompressionUtility::compressFile($path);
        
        // ok: php-stream-exploit
        CompressionUtility::compressFile("/this/is/safe");

        // ok: php-stream-exploit
        CompressionUtility::compressFile("/this/is/safe" + $path);
    }
}