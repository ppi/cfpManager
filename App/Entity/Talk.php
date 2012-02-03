<?php
namespace App\Entity;
/**
 *
 */
class Talk {

	/**
	 * @var null
	 */
	protected $_title = null;
	/**
	 * @var null
	 */
	protected $_author_id = null;
	/**
	 * @var null
	 */
	protected $_level = null;
	/**
	 * @var null
	 */
	protected $_duration = null;


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

	/**
	 * @return null
	 */
	function getTitle() {
		return $this->_title;
	}

	/**
	 * @return null
	 */
	function getAuthorID() {
		return $this->_author_id;
	}

	/**
	 * @param Talk\Level $level
	 */
	function setLevel(\App\Entity\Talk\Level $level) {
		$this->_level = $level;
	}

	/**
	 * @return null
	 */
	function getLevel() {
		return $this->_level;
	}

	/**
	 * @return null
	 */
	function getDuration() {
		return $this->_duration;
	}

	/**
	 * @param $duration
	 */
	function setDuration($duration) {
		$this->_duration = $duration;
	}
	
}