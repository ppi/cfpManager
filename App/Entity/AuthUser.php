<?php
namespace App\Entity;
class AuthUser {

	/**
	 * The User ID
	 * 
	 * @var null
	 */
	protected $_id = null;
	
	/**
	 * The Username
	 * 
	 * @var null
	 */
	protected $_username = null;
	
	/**
	 * The First Name
	 * 
	 * @var null
	 */
	protected $_firstName = null;
	
	/**
	 * The Last Name
	 * 
	 * @var null
	 */
	protected $_lastName = null;
	
	/**
	 * The Email Address
	 * 
	 * @var null
	 */
	protected $_email = null;
	
	/**
	 * The Users Salt
	 * 
	 * @var null
	 */
	protected $_salt = null;
	
	/**
	 * Are they an admin
	 * 
	 * @var null
	 */
	protected $_is_admin = null;
	
	/**
	 * Can Vote
	 * 
	 * @var null
	 */
	protected $_can_vote = null;
	
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
	
	function getID() {
		return $this->_id;
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
	
	function getSalt() {
		return $this->_salt;
	}
	
	function isAdmin() {
		return $this->_is_admin == 1;
	}
	
	function canVote() {
		return $this->_can_vote == 1;
	} 
	
}