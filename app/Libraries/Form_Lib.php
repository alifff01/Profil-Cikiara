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

namespace app\Libraries;

// -------------------------------------------------------------------------------------------------

class Form
{
	protected static $label;
	protected static $color;
	protected static $card;
	protected static $colorstyle = null;

	public function SetLabel($label)
	{
		self::$label = $label;
	}

	public function SetCard()
	{
		self::$card = 'aktif';
	}

	public function SetColor($color)
	{
		self::$color = $color;
	}

	public function SetColorstyle($color)
	{
		self::$colorstyle = $color;
	}

	public function getcolor()
	{
		if (!empty(self::$color))
			return self::$color;
		else
			return self::$color = 'primary';
	}

	public function header($header)
	{
		if (!empty(self::$colorstyle)){
			$colorstyle = "style='background-color : self::$colorstyle';";
			$colour 		= '';
		}else{
			$colorstyle = '';
			$colour 		= self::getcolor();
		}
		$html = "<div class='card mb-2'>
					<div class='card-header text-white p-2 bg-" .$colour. "' ".$colorstyle.">
						".$header."
					</div>";
			if (empty(self::$card))
				$html .= "</div>";		
		echo $html;
	}

	public function head($method,$action,$enctype='multipart/form-data')
	{
		if (!empty(self::$card))
			$html = "<div class='card-body bg-white'>";
		else
			$html = '';
		$link =  BASE_URL.'/'.$action;
		$html .= "<form method='".$method."' action='".$link."' enctype='".$enctype."'>";
		echo $html;
	}

	public function text($name,$placeholder=NULL,$opsi=NULL,$length=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='text' name='".$name."' maxlength='".$length."' value='".$value."' placeholder='".$placeholder."' class='form-control' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function textarea($name, $row='5', $opsi=null, $value=null)
	{
		$html = "<div class='form-group'>";
		if (!empty(self::$label)){
			$html .= "<label>".self::$label."</label>";
			self::$label = NULL;
		}
		$html .= "<textarea name='" . $name . "' rows='" . $row . "' class='form-control' " . $opsi . ">" . $value . "</textarea> </div>";
		echo $html;
	}


	public function hidden($name,$value=NULL){
		$html = "<input type='hidden' name='".$name."' value='".$value."'>
			</div>";
		echo $html;
	}

	public function text2($name,$placeholder=NULL,$opsi=NULL,$length=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='text' name='".$name."' maxlength='".$length."' value='".$value."' placeholder='".$placeholder."' class='form-control' ".$opsi." id='".$name."'>
				<input type='text' name='".$name."' maxlength='".$length."' value='".$value."' placeholder='".$placeholder."' class='form-control' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function url($name,$opsi=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= " <input type='url' name='".$name."' value='".$value."' placeholder='example.domain' class='form-control' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function date($name,$opsi=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='date' name='".$name."' value='".$value."' class='form-control' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function time($name,$opsi=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='time' name='".$name."' value='".$value."' class='form-control' ".$opsi.">
			</div>";
		echo $html;
	}

	public function email($name,$opsi=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='email' name='".$name."' value='".$value."' placeholder='example@domain.com' class='form-control' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function number($name,$opsi=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='number' name='".$name."' value='".$value."' class='form-control' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function tel($name,$opsi=NULL,$length=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='tel' name='".$name."' maxlength='".$length."' value='".$value."' placeholder='Eg. +6280000' class='form-control' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function password($name,$opsi=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='password' name='".$name."' class='form-control' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function select($name,$data,$opsi=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<select name='".$name."' class='form-control' ".$opsi." id='".$name."'>
					<option value=''>-- select --</option>";
					foreach ($data as $key => $row ) {
						$nama = ucfirst($row);
						$html .= "<option value='".$key."'";
							if (!empty($value) AND $value == $key) {
								$html .= ' selected ';
							}
						$html .=">".$nama."</option>";
					}
		$html .= "	</select>
				</div>";
		echo $html;
	}

	public function selectdb($name,$data,$opsi=NULL,$value=NULL){
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<select name='".$name."' class='form-control' ".$opsi." id='".$name."'>
					<option value=''>--pilih--</option>";;
					foreach ($data as $row ) {
						$nama = ucfirst($row[1]);
						$html .= "<option value='".$row[0]."'";
							if (!empty($value) AND $value == $row[0]) {
								$html .= ' selected ';
							}
						$html .=">".$nama."</option>";
					}
		$html .= "	</select>
				</div>";
		echo $html;
	}

	public function radio($name, $data, $opsi=null, $value=null)
	{
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label><br>";
				self::$label = NULL;
			}
		foreach ($data as $key => $label) {
			$html .= "<input type='radio' name='".$name."' value='".$key."'"; 
				if (!empty($value) AND $value == $key) {
					$html .= ' checked ';
				}
					$html .= $opsi."> " .$label."&nbsp;&nbsp;";
		}
		$html .= "</div>";
		echo $html;
	}

	public function checkbox($name,$data,$opsi=null,$value=null)
	{
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label><br>";
				self::$label = NULL;
			}
		foreach ($data as $key => $label) {
			$html .= "<input type='checkbox' name='".$name."' value=".$key."'";
				if (!empty($value)) {
					for ($i=0; $i < count($value); $i++) { 
						if ($value[$i] == $key)
							$html .= ' checked ';		
						else
							$html .= '';
					}
				}
					$html .= $opsi."> " .$label."&nbsp;&nbsp;";
		}
		$html .= "</div>";
		echo $html;
	}

	public function file($name,$opsi=NULL)
	{
		$html = "<div class='form-group'>";
			if (!empty(self::$label)){
				$html .= "<label>".self::$label."</label>";
				self::$label = NULL;
			}
		$html .= "<input type='file' name='".$name."' class='form-control-file' ".$opsi." id='".$name."'>
			</div>";
		echo $html;
	}

	public function submit($nama){
		$html = "<div class='form-group'>
				<input type='submit' value='".$nama."' class='btn btn-".self::getcolor()." btn-sm'>
			  </div>
			  </form>";
		if (!empty(self::$card))
			$html .= '</div></div>';
		echo $html;
	}

	public function reset($nama){
		$html = "<div class='form-group'>
				<input type='reset' value='".$nama."' class='btn btn-".self::getcolor()." btn-sm'>
			  </div>
			  </form>";
		if (!empty(self::$card))
			$html .= '</div></div>';
		echo $html;
	}

	public function submitbtn($nama, $ico=NULL)
	{
		$html = "<div class='form-group'>
				<button type='submit' class='btn btn-".self::getcolor()." btn-sm'><i class='fa fa-".$ico."'></i> ".$nama."</button>
			  	</div>
			  	</form>";
		if (!empty(self::$card))
			$html .= '</div></div>';
		echo $html;
	}
	public function resetbtn($nama, $ico=NULL)
	{
		$html = "<div class='form-group'>
				<button type='reset' class='btn btn-".self::getcolor()." btn-sm'><i class='fa fa-".$ico."'></i> ".$nama."</button>
			  	</div>
			  	</form>";
		if (!empty(self::$card))
			$html .= '</div></div>';
		echo $html;
	}	

	public function aksi($reset,$submit)
	{
		$html = "<div class='form-group'>
				<input type='reset' value='".$reset."' class='btn btn-warning btn-sm'>
				<input type='submit' value='".$submit."' class='btn btn-success btn-sm'>
			  </div>
			  </form>";
		if (!empty(self::$card))
			$html .= '</div></div>';
		echo $html;
	}
}