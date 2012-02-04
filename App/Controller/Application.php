<?php
/**
 * Shared Application Controller Class
 * this file is used to create generic controller functions
 * to share accross all of your application Controllers
 */
namespace App\Controller;
abstract class Application extends \PPI\Controller {

	public function render($template, array $params = array(), $options = array()) {
		
		if($this->isLoggedIn()) {
			$params['authUser'] = $this->getUser(); 
		}
		
		$params['helper'] = new \App\Helper\ViewHelper();
		
		return parent::render($template, $params, $options);
	}
	
	/**
	 * Check if the user is logged in
	 * 
	 * @return bool
	 */
	protected function isLoggedIn() {
		$session = $this->getSession();
		$authData = $session->getAuthData();
		return !empty($authData);
//		$params['isLoggedIn'] = $this->getSession()->isLoggedIn();
	}
	
	public function setAuthData($data) {
		$this->getSession()->setAuthData($data);
	}
	
	public function loginCheck() {
		if(!$this->isLoggedIn()) {
			$this->redirect('user/login');
		}
	}
	
}
