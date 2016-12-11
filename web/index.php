<?
require __DIR__ . '/../vendor/autoload.php';

require __DIR__ .'/../config.php';

require __DIR__ .'/../routes.php';

global $config;
$config = new Config();

$module = $config->controllers.'HomeController';
$action = 'index';

$params  = array();


$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//echo "<pre>";print_r($url_path);echo "</pre>";


foreach ($routes as $k=>$map)
{
	if (preg_match($map['pattern'], $url_path, $matches))
	{
		//echo $k;
		//echo "<pre>";print_r($matches);echo "</pre>";
		
		array_shift($matches);

 		foreach ($matches as $index => $value)
		{
			$params[$index] = $value;
		}

		$module = $config->controllers.$map['class'];
		$action = $map['method'];

		break;
	}
}


$route = new $module($params);

$route->$action();




?>