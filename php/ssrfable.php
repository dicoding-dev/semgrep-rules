<?php

function test1($url){
//ruleid: ssrfable
    $ch = curl_init($url);
}

function test1safe(){
    //ok: ssrfable
    $ch = curl_init("/some/path");
}

function test3($url){
    $ch = curl_init();
    //ruleid: ssrfable
    curl_setopt($ch, CURLOPT_URL, $url);
}

function test3safe($url){
    $ch = curl_init();
    //ok: ssrfable
    curl_setopt($ch, CURLOPT_URL, "/some/path");
}


function test5($url){
    //ruleid: ssrfable
    $file = fopen($url, 'rb');
}

function test5safe(){
    //ok: ssrfable
    $file = fopen("/some/path", 'rb');
}

function test7($url){
    //ruleid: ssrfable
    $file = file_get_contents($url);
}

function test9(){
    //ok: ssrfable
    $file = file_get_contents("index.php");
}

function test10($url){
    //ruleid: ssrfable
    $file = readfile($url);
}

function test10safe(){
    //ok: ssrfable
    $file = readfile("index.php");
}

function test11($url) {
    //ruleid: ssrfable
    $remote->post($url);
}

function test11safe($url) {
    //ok: ssrfable
    $remote->post("/some/path");
}

function test12($url) {
    //ruleid: ssrfable
    $remote->fetch($url);
}

function test12safe($url) {
    //ok: ssrfable
    $remote->fetch("/some/path");
}

function test13($url) {
    //ruleid: ssrfable
    $remote->mtlsPost($url);
}

function test13safe($url) {
    //ok: ssrfable
    $remote->mtlsPost("/some/path");
}