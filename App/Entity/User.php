<?php
namespace App\Entity;
class User {
	
	protected $_id = null;
	protected $_username = null;
	protected $_firstName = null;
	protected $_lastName = null;
	protected $_email = null;
	protected $_country = null;
	
	protected $_twitter_handle = null;
	protected $_website = null;
	protected $_job_title = null;
	protected $_bio = null;
	
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
	 * Talks
	 * 
	 * @var array
	 */
	protected $_talks = array();
	
	function __construct(array $data) {
		foreach ($data as $key => $value) {
			if (property_exists($this, '_' . $key)) {
				$this->{'_' . $key} = $value;
			}
		}
	}
	
	function getID() {
		return $this->_id;
	}
	
	function getTalks() {
		return $this->_talks;
	}
	
	function hasTalks() {
		return !empty($this->_talks);
	}
	
	function setTalks($talks) {
		$this->_talks = $talks;
	}
	
	function getTwitterHandle() {
		return $this->_twitter_handle;
	}
	
	function setTwitterHandle($handle) {
		$this->_twitter_handle = $handle;
	}
	
	function hasTwitterHandle() {
		return !empty($this->_twitter_handle);
	}
	
	function getFirstName() {
		return $this->_firstName;
	}
	
	function getLastName() {
		return $this->_lastName;
	}
	
	function getFullName() {
		return $this->getFirstName() . ' ' . $this->getLastName();
	}
	
	function getEmail() {
		return $this->_email;
	}
	
	function getUsername() {
		return $this->_username;
	}
	
	function getWebsite() {
		return $this->_website;
	}
	
	function hasWebsite() {
		return !empty($this->_website);
	}
	
	function getJobTitle() {
		return $this->_job_title;
	}
	
	function hasJobTitle() {
		return !empty($this->_job_title);
	}
	
	function getBio() {
		return $this->_bio;
	}
	
	function hasBio() {
		return !empty($this->_bio);
	}
	
	function getCountry() {
		return $this->_country;
	}
	
	function hasCountry() {
		return !empty($this->_country);
	}
	
	function isAdmin() {
		return $this->_is_admin == 1;
	}
	
	function canVote() {
		return $this->_can_vote == 1;
	} 
}