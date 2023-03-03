<?php
	const PHP_DIR = __DIR__;
	define('HTML_DIR_INDEX', $_SERVER['SCRIPT_NAME']);

	require_once "includes/core/globals.php";
	require_once "includes/core/tools/Session.php";
	require_once "includes/core/router.php";