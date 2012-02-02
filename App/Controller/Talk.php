<?php
namespace App\Controller;
class Talk extends Application {
	
	function index() {
		
		$talks = $this->getTalkStorage()->getAll();
		$this->addJS('talk/index');
		$this->render('talk/index', compact('talks'));
		
	}
	
	function create() {
		
		if($this->is('post')) {
			$talkID = $this->getTalkStorage()->create($this->post());
			$this->redirect('talk/show/' . $talkID);
		}
		
		$this->render('talk/create');
		
	}
	
	function edit() {
		
		// Save the edit submit
		if($this->is('post')) {
			
		}
		
		$talkID = $this->get('edit');
		$talk = $this->getTalkStorage()->getTalkFromID($talkID);
		$this->render('talk/edit', compact('talk'));
		
	}
	
	function remove() {
		
		$talkID = $this->get('remove');
		$talk = $this->getTalkStorage()->getByID($talkID);
		
		// Do you haz control?
		if($talk->getOwnerID() == $this->getUser()->getID()) {
			
		}
		
	}
	
	/**
	 * Get the talk storage class
	 * 
	 * @return \App\Data\Talk
	 */
	protected function getTalkStorage() {
		return new \App\Data\Talk();
	}
	
	
}
