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

/*
* STATUS SESSION
* default AKTIF
*/
define('sessionstatus', TRUE); // TRUE || FALSE


/**

* SESSION penyimpanan variabel selama browser berjalan
* Jika Web terdiri dari 1 session, bisa menggunakan fitur ini
* SetSession tidak akan digunakan jika menentukan session disini
*/
define('session', FALSE); // FALSE | nama session