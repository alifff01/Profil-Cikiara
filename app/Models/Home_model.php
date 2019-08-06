<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 */

// -------------------------------------------------------------------------------------------------

namespace app\Models;

use app\Core\ModelClass;

// -------------------------------------------------------------------------------------------------\
/**
 * class model umum
 */
/**
 * 
 */
class Home extends ModelClass
{
	
 public function ceklogin()
 	{
 	$username 	= $this->filter_input($_POST['username']);
 	$password 	= $this->filter_input($_POST['password']);

 	$data		= $this->_db->fetch('admin', "username = '$username' ");

 	if ($data){
 		$password_db=$data[0]['password'];
 	
	 	if (password_verify($password, $password_db)) {
	 		$_SESSION['admin']	= $data[0]['id_admin'];
	 		return true;
	 		}else{
	 			return false;
	 		}
 		}else{
 			return false;
 		}
 	}
 }

?>




