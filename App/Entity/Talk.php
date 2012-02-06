<?php
namespace App\Entity;
/**
 *
 */
class Talk {
	
	/**
	 * The Talk ID
	 * 
	 * @var null
	 */
	protected $_id = null;

	/**
	 * The title of the talk
	 * 
	 * @var null
	 */
	protected $_title = null;
	
	/**
	 * The owner ID aka user ID of the talk
	 * 
	 * @var null
	 */
	protected $_owner_id = null;
	
	/**
	 * The Talk Description
	 * 
	 * @var null
	 */
	protected $_abstract = null;
	
	/**
	 * The URL to the slides of the talk
	 * 
	 * @var null
	 */
	protected $_slides_url = null;
	
	/**
	 * The technical level of the talk
	 * 
	 * @var null
	 */
	protected $_level = null;
	
	/**
	 * The time duration of the talk
	 * 
	 * @var null
	 */
	protected $_duration = null;
	
	/**
	 * Remark
	 * 
	 * @var null
	 */
	protected $_remark = null;


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

	/**
	 * @return null
	 */
	function getTitle() {
		return $this->_title;
	}

	/**
	 * @return null
	 */
	function getOwnerID() {
		return $this->_owner_id;
	}

	/**
	 * @param Talk\Level $level
	 */
	function setLevel($level) {
		$this->_level = $level;
	}

	/**
	 * @return null
	 */
	function getLevel() {
		return $this->_level;
	}
	
	function hasLevel() {
		return !empty($this->_level);
	}

	/**
	 * @return null
	 */
	function getDuration() {
		return $this->_duration;
	}
	
	function hasDuration() {
		return !empty($this->_duration);
	}
	
	function getAbstract() {
		return $this->_abstract;
	}
	
	function setAbstract($abstract) {
		$this->_abstract = $abstract;
	}
	
	function hasAbstract() {
		return !empty($this->_abstract);
	}

	/**
	 * @param $duration
	 */
	function setDuration($duration) {
		$this->_duration = $duration;
	}
	
	function getSlidesURL() {
		return $this->_slides_url;
	} 
	
	function setSlidesURL($url) {
		$this->_slides_url = $url;
	}
	
	function hasSlidesURL() {
		return !empty($this->_slides_url);
	}
	
	function hasRemark() {
		return !empty($this->_remark);
	}
	
	function getRemark() {
		return $this->_remark;
	}
	
	function setRemark($remark) {
		$this->_remark = $remark;
	}
	
	
	
}