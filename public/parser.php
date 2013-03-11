<?php

header('Content-Type: text/plain');

$urls = array(
    'http://www.avito.ru/moskva/kvartiry?user=1&params=201_1059&view=list'
);

$cache_dir = dirname($_SERVER['DOCUMENT_ROOT']) . '/storage/_realty/cache/';


$parse = function($url) use ($cache_dir) {
    $content = file_get_contents($url);
    $cache_file_name = $cache_dir .  md5($url) . '.' . time() . '.html';
    file_put_contents($cache_file_name, $content);
};

if (count((array) $urls) > 0) {
    foreach ((array) $urls AS $url) {
        //$parse($url);
    }
}


$cache_files = scandir($cache_dir);

foreach ($cache_files AS $cache_file) {
    if ( !is_dir($cache_file) ) {
        
        $pattern = '/\<a name="(\d+)" href="\/moskva\/kvartiry\/(.*)" title="(.*)"\>/';
        
        $content = file_get_contents($cache_dir . $cache_file);
        
        preg_match_all($pattern, $content, $matches);
        
        print_r($matches[2]);
        
        if (count($matches[2]) > 0) {
            foreach ($matches[2] AS $url) {
                $parse('http://www.avito.ru/moskva/kvartiry/' . $url);
            }
        }
    }
}