<?php
require dirname(__FILE__). '/../benchmark.php';
require dirname(__FILE__). '/../libs/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();
$mustache = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates'),
    'cache' => dirname(__FILE__). '/cache/mustache.php/'
));
$data = json_decode(file_get_contents(dirname(__FILE__). '/../data/data.json'), true);

function test_simple() {
    global $mustache;
    global $data;
    $mustache->render('story', $data['story_view']);
}

function test_loop() {
    global $mustache;
    global $data;
    $mustache->render('comment', $data['comment_view']);
}

$simpleResults =  benchmark(10, 10000, 'test_simple');
echo 'Simple Test: ', $simpleResults['time'], 'ms, ', $simpleResults['PhpMemory'], 'byte PHP, ', $simpleResults['RealMemory'], 'byte System',PHP_EOL;
$loopResults =  benchmark(10, 10000, 'test_loop');
echo 'Loop Test: ', $loopResults['time'], 'ms, ', $loopResults['PhpMemory'], 'byte PHP, ', $loopResults['RealMemory'], 'byte System',PHP_EOL;
