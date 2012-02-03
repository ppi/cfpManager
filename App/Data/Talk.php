<?php
namespace App\Data;

class Talk extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'      => 'main',
		'table'     => 'conference',
		'primary'   => 'id',
		'fetchmode' => \PDO::FETCH_ASSOC
	);
	
	function create() {
		
	}
	
	/**
	 * Get all the talks
	 * 
	 * @return mixed
	 */
	function getAll() {

		return $this->_conn->createQueryBuilder()
			->select('t.*')
			->from($this->_meta['table'], 't')
			->orderBy('t.title', 'ASC')
			->execute()
			->fetchAll($this->_meta['fetchmode']);
	}
	
	function remove($talkID) {
		
		// Remove all votes, comments and CFP submissions on this talk
		$voteDataStorage       = new \App\Data\Vote();
		$commentDataStorage    = new \App\Data\Comment();
		$cfpSubmissionsStorage = new \App\Data\Conference\Submission();

		$cfpSubmissionsStorage->deleteByTalkID($talkID);
		
	}
	
}