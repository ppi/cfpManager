<?php
namespace App\Data;

class Vote extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'    => 'main',
		'table'   => 'vote',
		'primary' => 'id'
	);
	
	function create($direction, $submissionID, $userID) {
		return $this->insert(array(
			'submission_id' => $submissionID,
			'user_id'       => $userID,
			'direction'     => $direction
		));
	}
	
}