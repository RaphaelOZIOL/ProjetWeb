<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header("X-XSS-Protection: 1; mode=block");
echo "\nERROR: ",
	$heading,
	"\n\n",
	$message,
	"\n\n";
