<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 *
 * ---------------------------------------------------------------------------------------------------------------
 */

// ---------------------------------------------------------------------------------------------------------------
// scan file dalam direktori Config

$dir = scandir(__DIR__ . '/Config');

// ---------------------------------------------------------------------------------------------------------------

// pemanggilan file dalam folder Config 
for ($i=2; $i <= count($dir)-1; $i++) { 
	require_once __DIR__ . '/Config/' . $dir[$i];
}

// ---------------------------------------------------------------------------------------------------------------

spl_autoload_register(function( $class ){
	$class = explode('\\', $class);
	$class = end($class);
	require_once 'Core/' . $class . '.php';
});