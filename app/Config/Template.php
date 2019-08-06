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

// ------------------------------------- ADMINISTRATOR ---------------------------------------
/**
* Template Administrator || HALAMAN ADMIN
* Aktifkan bila ingin menggunakan Template Administrator
* method adminpage akan aktif
*/
define('administrator', TRUE); // TRUE | FALSE

/**
* konfigurasi theme admin
* Halaman admin akan aktif bila Template Admin Aktif
* Halaman Default akan AKTIF
* Ubah halaman dengan tema yang ada
* Data Thema : Default, Darkgreen
*/
define('themeadmin', 'darkgreen'); //darkgreen

// -------------------------------------------------------------------------------------------

// ------------------------------------- HOMEPAGE --------------------------------------------

/**
* Template HomePage || HALAMAN USER 
* Aktifkan bila ingin menggunakan Template Administrator
* method homepage akan AKTIF
*/
define('homepage', FALSE); // TRUE | FALSE

/**
* konfigurasi theme login
* Halaman Homepage akan aktif bila Template Homepage Aktif
* Halaman Default akan AKTIF
* Ubah halaman dengan tema yang ada
* Data Thema : Default, panel
*/

define('themehome', 'default'); // default

// --------------------------------------------------------------------------------------------

// ---------------------------------- LOGIN --------------------------------------------------
/**
* Template Login || HALAMAN LOGIN 
* Aktifkan bila ingin menggunakan Template lOGIN
* FILE login akan tersimpan di folder home
* Data Theme : default, modern
*/
define('login', 'modern'); // default || modern

// --------------------------------------------------------------------------------------------