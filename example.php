<?php

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/src/' . $className . '.php';
});

//$linkedList = new LinkedList(['1', '2', '3']);
$linkedList = new LinkedList();

$linkedList->append('new item1');
$linkedList->append("new item2");
$linkedList->append("new item3");
$linkedList->append("new item4");
$linkedList->append('new item6');

$linkedList->append("new item7");

$linkedList->append("new item8");



$linkedList->displayAll();
//echo '_________' . PHP_EOL;
//
//$linkedList->insertAfterAt('new item5', 2);
//
//$linkedList->displayAll();
//
//$linkedList->insertBeforeAt('new item 15', 1);
//
//echo '_________' . PHP_EOL;
//$linkedList->displayAll();

print_r( $linkedList->search('new item4'));
