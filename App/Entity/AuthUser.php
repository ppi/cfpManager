<?php
namespace App\Entity;
class AuthUser {

	protected $_username = null;
	protected $_firstName = null;
	protected $_lastName = null;
	protected $_email = null;
	
	/**
	 * @param array $data
	 */
	function __construct(array $data) {
		foreach ($data as $key => $value) {
			if (method_exists($this, 'set' . $key)) {
				$this->{'set' . $key}($value);
			} elseif (property_exists($this, '_' . $key)) {
				$this->{'_' . $key} = $value;
			}
		}
		
	}
	
	function getFirstName() {
		return $this->_firstName;
	}
	
	function getLastName() {
		return $this->_lastName;
	}
	
	function getEmail() {
		return $this->_email;
	}
	
	function getUsername() {
		return $this->_username;
	}

}