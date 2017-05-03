<?
date_default_timezone_set('Asia/Yakutsk');

define('ENGINE_PathFsRoot', __DIR__);
define('ENGINE_PathFsInclude', ENGINE_PathFsRoot . '/include');

require ENGINE_PathFsInclude . '/Engine/Engine.php';
Engine::run();
