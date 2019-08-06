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
class DEtail_agenda extends ModelClass
{
	public function listDetail_agenda()
	{
		return $this->_db->fetch('detail_agenda');
	}
	public function hapusDetail_agenda()
	{
		return $this->_db->delete('detail_agenda');
	}
