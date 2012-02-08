<?php
namespace App\Controller;
class User extends Application {

	function preDispatch() {
		$this->addCSS('user/talk', 'user/account');
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

		$errors = array();
		if(!$this->is('post')) {
			return $this->render('user/signup', compact('errors'));
		}
		
		$post = $this->post();
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
				'password'  => $post['password'],
				'salt'      => base64_encode(openssl_random_pseudo_bytes(16))
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
			$this->redirect('account');
		} else {
			$errors['message'] = 'Login failed. Please try again.';
		}
		$this->render('user/login', compact('errors'));
	}
	
	function logout() {
		$this->getSession()->clearAuthData();
		$this->redirect('');
	}
	
	function forgotpw() {
		$this->render('user/forgotpw');
	}
	
	function showaccount() {

		$username = $this->get('username', '');
		$viewingOwnProfile = false;
		if(!empty($username)) {
			$user = $this->getUserStorage()->findByUsername($username);
		} else {
			$this->loginCheck();
			$user = $this->getUserStorage()->findByEmail($this->getUser()->getEmail());
			$viewingOwnProfile = true;
		}
		
		if(empty($user)) {
			$this->setFlash('Invalid Username');
			$this->redirect('');
		}
		
		$userAccount = new \App\Entity\User($user);
		$subPage = 'showaccount';
		$this->render('user/account', compact('userAccount', 'subPage', 'viewingOwnProfile'));
	}
	
	function editaccount() {
		
		$this->loginCheck();
		if($this->is('post')) {
			
			$post = $this->post();
			$requiredKeys = array('userName', 'email', 'firstName', 'lastName');
			$errors = array();
			foreach($requiredKeys as $field) {
				if(!isset($post[$field]) || empty($post[$field])) {
					$errors[$field] = 'This field is required';
				}
			}
			if(empty($errors)) {
				
				$this->getUserStorage()->update(array(

					'firstName'      => $post['firstName'],
					'lastName'       => $post['lastName'],
					'email'          => $post['email'],
					'username'       => $post['userName'],
					'twitter_handle' => $post['twitterHandle'],
					'website'        => $post['website'],
					'job_title'      => $post['jobTitle'],
					'company_name'   => $post['companyName'],
					'bio'            => $post['bio']					
				), array('id' => $this->getUser()->getID()));
				
				$this->setFlash('Account Updated');
				$this->redirect('account');
			}
		}
		
		$userAccount = new \App\Entity\User($this->getUserStorage()->findByEmail($this->getUser()->getEmail()));
		$subPage = 'editaccount';
		$viewingOwnProfile = true;
		$this->render('user/account', compact('userAccount', 'subPage', 'errors', 'viewingOwnProfile'));
	}
	
	function editpassword() {
		
		$this->loginCheck();
		
		$errors = array();
		$post = $this->post();
		if($this->is('post') && isset($post['currentPassword'], $post['password'])) {
			
			$userStorage = $this->getUserStorage();
			$email       = $this->getUser()->getEmail();
			$configSalt  = $this->getConfig()->auth->salt;
			
			// If the existing password is correct.
			if($userStorage->checkAuth($email, $post['currentPassword'], $configSalt)) {
				$userStorage->update(array(
					'password' => $userStorage->saltPass($this->getUser()->getSalt(), $configSalt, $post['password'])
				), array('id' => $this->getUser()->getID()));
				
				$this->setFlash('Password Updated');
				$this->redirect('account');
			} else {
				$errors['currentPassword'] = 'Your current password is incorrect';
			}
		}
		$userAccount = new \App\Entity\User($this->getUserStorage()->findByEmail($this->getUser()->getEmail()));
		$subPage = 'editpassword';
		$viewingOwnProfile = true;
		$this->render('user/account', compact('userAccount', 'subPage', 'errors', 'viewingOwnProfile'));
	}
	
}
