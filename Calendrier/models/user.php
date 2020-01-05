<?php
class user extends Model {
	
	var $table = "compte";
	
	function getUser($login, $password){
		return $this->findFirst(array(
			"fields"=>'*',
			"condition"=> 'PSEUDO="'.$login.'" and MDP="'.MD5($password).'"',
			"order"=>'IDCOMPTE'
		));
	}
}
?>