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
	
	
	/**
	 * Get the talk storage class
	 * 
	 * @return \App\Data\Talk
	 */
	public function getTalkStorage() {
		return new \App\Data\Talk();
	}
	
	
	/**
	 * Get the talk storage class
	 * 
	 * @return \App\Data\User
	 */
	protected function getUserStorage() {
		return new \App\Data\User();
	}
	
	/**
	 * @return \App\Data\Content
	 */
	protected function getContentStorage() {
		return new \App\Data\Content();
	}

	/**
	 * Encrypts a text.
	 *
	 * @param $text The plain text
	 * @return string The encrypted text.
	 * @author Alfredo Juarez <alfrekjv@ppi.io>
	 */
	public function encrypt($text) {

		$salt       = $this->getConfig()->auth->salt;
		$iv         = $this->getConfig()->auth->iv;

		$cipher     = mcrypt_module_open(MCRYPT_BLOWFISH,'','cbc','');
		mcrypt_generic_init($cipher, $salt, $iv);
		$encrypted  = mcrypt_generic($cipher, $text);
		mcrypt_generic_deinit($cipher);

		return $encrypted;
	}

	/**
	 * Decrypts a Text.
	 *
	 * @param $text The Encrypted text
	 * @return string Decrypted text
	 * @author Alfredo Juarez <alfrekjv@ppi.io>
	 */
	public function decrypt($text) {

		$salt       = $this->getConfig()->auth->salt;
		$iv         = $this->getConfig()->auth->iv;

		$cipher     = mcrypt_module_open(MCRYPT_BLOWFISH,'','cbc','');

		mcrypt_generic_init($cipher, $salt, $iv);
		$decrypted = mdecrypt_generic($cipher, $text);
		mcrypt_generic_deinit($cipher);

		return $decrypted;
	}
	
}
