<?php
require dirname(__FILE__). '/../benchmark.php';
require dirname(__FILE__) . '/../libs/lightncandy/src/lightncandy.php';

$data = json_decode(file_get_contents(dirname(__FILE__). '/../data/data.json'), true);

$simple_filename = dirname(__FILE__) . '/cache/lightncandy/simple.php';
$story_native = dirname(__FILE__). '/templates/story.mustache';
$simple_php = LightnCandy::compile(file_get_contents($story_native));
file_put_contents($simple_filename, $simple_php);

$loop_filename = dirname(__FILE__) . '/cache/lightncandy/loop.php';
$comment_native = dirname(__FILE__). '/templates/comment.mustache';
$loop_php = LightnCandy::compile(file_get_contents($comment_native));
file_put_contents($loop_filename, $loop_php);

function test_simple() {
    global $data;
    global $simple_filename;

    $renderer = require $simple_filename;
    $renderer($data['story_view']);
}

function test_loop() {
    global $data;
    global $loop_filename;
	$renderer = require $loop_filename;
    $renderer($data['comment_view']);
}

$simpleResults =  benchmark(10, 10000, 'test_simple');
echo 'Simple Test: ', $simpleResults['time'], 'ms, ', $simpleResults['PhpMemory'], 'byte PHP, ', $simpleResults['RealMemory'], 'byte System',PHP_EOL;
$loopResults =  benchmark(10, 10000, 'test_loop');
echo 'Loop Test: ', $loopResults['time'], 'ms, ', $loopResults['PhpMemory'], 'byte PHP, ', $loopResults['RealMemory'], 'byte System',PHP_EOL;
