<?
$routes = array();

$routes[] = array('pattern'=>'/^\/import\/$/','class'=>'HomeController','method'=>'import');

$routes[] = array('pattern'=>'/^\/([a-z0-9_\/-]+)\/([0-9]+)\/$/','class'=>'HomeController','method'=>'article');

$routes[] = array('pattern'=>'/^\/([a-z0-9_\/-]+)\/$/','class'=>'HomeController','method'=>'articles');

$routes[] = array('pattern'=>'/^\/$/','class'=>'HomeController','method'=>'index');




?>