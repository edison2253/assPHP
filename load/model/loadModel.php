<?php
//自动构建model
if ( @$argv[0] != 'loadModel.php' || @$argv[1] != 'run') {
	die('The wrong command line');
}

//项目名称
define('ASS_NAME', 'AssPHP');

//项目文件目录名称
define('APP_NAME', 'application');

//配置文件目录名称
define('CONF_NAME', 'conf');

$config_url = explode('load\model', dirname(__FILE__))[0] . APP_NAME . '/' . CONF_NAME . '/' . 'config.php';
require_once $config_url;
$database = $autoload['database'];

try {
	$pdo = new pdo("mysql:host=" . $database['localhost'] . ";dbname=" . $database['database'], $database['username'], $database['password']);
} catch (PDOException $e) {
	die($e->getMessage());
}

$sql = "SHOW TABLES;";
$smt = $pdo->prepare($sql);
$smt->execute();
$table = $smt->fetchAll();

unset($config_url);
unset($autoload);
unset($database);
unset($smt);
unset($pdo);
unset($sql);

$tableArr = [];
foreach ($table as $k => $v) {
	array_push($tableArr, $v[0]);
}

unset($table);

$model_path =  explode('load\model', dirname(__FILE__))[0] . APP_NAME . '/' . 'model' . '/';
$model_content = file_get_contents('DemoModel.php');
foreach ($tableArr as $v) {
	$file_path = $model_path . ucwords($v) . 'Model.php';
	if ( file_exists($file_path) ) {
		continue;
	}

	$content = str_replace('DemoModel', ucwords($v) . 'Model', $model_content);
	$content = str_replace('getDemoList', 'get' . ucwords($v) . 'List', $content);
	$content = str_replace('addDemo', 'add' . ucwords($v), $content);
	$content = str_replace('updateDemo', 'update' . ucwords($v), $content);
	$content = str_replace('deleteDemo', 'delete' . ucwords($v), $content);
	$content = str_replace('demo', $v, $content);
	file_put_contents($model_path . ucwords($v) . 'Model.php', $content);
	echo ucwords($v) . 'Model.php is ok' . PHP_EOL;
}

echo '-- loadModel end';