<?php
namespace App\Entity\Talk;
class Level {
	
	protected $_levels = array();
	
	function __construct(array $data) {
		if(isset($data['levels'])) {
			$this->_levels = $data['levels'];
		}
	}
	
	function getLevels() {
	}
	
}