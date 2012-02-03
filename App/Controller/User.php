<?php
namespace App\Controller;
class User extends Application {

	function preDispatch() {
		$this->addCSS('user/signup');
		$this->addJS('libs/jquery-validationEngine-en', 'libs/jquery-validationEngine', 'app/user/general');
	}
	
	function index() {
		
	}
	
	/**
	 * This is the registration process
	 * 
	 * @return void
	 */
	function signup() {
		
		$post = $this->post();
		$errors = array();
		$requiredKeys = array('userName', 'email', 'firstName', 'lastName', 'password');
		
		foreach($requiredKeys as $field) {
			if(!isset($post[$field]) || empty($post[$field])) {
				$errors[$field] = 'Field is required';
			}
		}
		
		if(empty($errors)) {
		
			$user = array(
				'username'  => $post['userName'],
				'email'     => $post['email'],
				'firstName' => $post['firstName'],
				'lastName'  => $post['lastName'],
				'password'  => $post['password']
			);
			
			$userStorage = $this->getUserStorage();
			$newUserID = $userStorage->create($user, $this->getConfig()->auth->salt);
			$this->redirect('user/login');
		}
		
		$this->render('user/signup', compact('errors'));
	}
	
	function login() {
		
		// Check if we are already logged in
		if($this->isLoggedIn()) {
			$this->redirect('myaccount');
		}
		
		$errors = array();
		if(!$this->is('post')) {
			return $this->render('user/login', compact('errors'));
		}
		
		$post = $this->post();
		
		$userStorage = $this->getUserStorage();
		if($userStorage->checkAuth($post['email'], $post['password'], $this->getConfig()->auth->salt)) {
			$this->setAuthData(new \App\Entity\AuthUser($userStorage->findByEmail($post['email'])));
			$this->redirect('myaccount');
		} else {
			$errors['message'] = 'Login failed. Please try again.';
		}
		$this->render('user/login', compact('errors'));
	}
	
	function logout() {
		$this->getSession()->clearAuthData();
		$this->redirect('');
	}

	function activate() {
		
	}
	
	function forgotpw() {
		$this->render('user/forgotpw');
	}
	
	protected function getUserStorage() {
		return new \App\Data\User();
	}
	
	function showaccount() {
		
		$userAccount = new \App\Entity\User($this->getUserStorage()->findByEmail($this->getUser()->getEmail()));
		$subPage = 'showaccount';
		$this->render('user/account', compact('userAccount', 'subPage'));
	}
	
	function editaccount() {
		$userAccount = new \App\Entity\User($this->getUserStorage()->findByEmail($this->getUser()->getEmail()));
		$subPage = 'editaccount';
		$this->render('user/account', compact('userAccount', 'subPage'));
	}
	
}
