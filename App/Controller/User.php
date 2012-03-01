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
			$this->redirect('account');
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

		$this->loginCheck();

		$viewingOwnProfile = true;
		$userAccount = $this->getUserStorage()->getByEmail($this->getUser()->getEmail());

		// People can't view someone elses profile
		if($this->getUser()->getID() != $userAccount->getID()) {
			$this->setFlash('Permission Denied');
			$this->redirect('');
		}

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

	/**
	 * SOCIAL SIGN IN USING HYBRIDAUTH
	 */

	function socialsignIn() {

		$provider   = $this->get('socialsignin');
		$baseUrl    = $this->getBaseUrl();
		$ha         = $this->initHybridAuth();
		$adapter    = $ha->authenticate($provider);

		$this->redirect( "user/socialauth/provider/{$provider}/");
	}

	private function initHybridAuth() {

		require_once APPFOLDER . "Vendor/hybridauth/hybridauth/Hybrid/Auth.php";
		require_once CONFIGPATH . "/social.php";

		return new \Hybrid_Auth($social);
	}

	function socialendpoint() {

		require_once( APPFOLDER . "Vendor/hybridauth/hybridauth/Hybrid/Auth.php" );
		require_once( APPFOLDER . "Vendor/hybridauth/hybridauth/Hybrid/Endpoint.php" );

		\Hybrid_Endpoint::process();
	}

	function socialauth() {

		$user       = new \App\Data\User();
		$session    = $this->getSession();

		try {

			$provider       = $this->get('provider');
			$ha             = $this->initHybridAuth();

			$adapter        = $ha->getAdapter($provider);
			$userProfile    = $adapter->getUserProfile();
			$user_id        = null;


			// fetch or create user
			$account        = $user->fetchProviderId($userProfile->identifier);

			if(empty($account)) {

				// add user...
				$values = array(
					'email'             => $userProfile->email,
					'display_name'      => $userProfile->displayName,
					'username'          => $userProfile->displayName,
					'firstName'         => $userProfile->firstName,
					'lastName'          => $userProfile->lastName,
					'photo_url'         => $userProfile->photoURL,
					'provider_id'       => $userProfile->identifier,
					'provider'          => $provider,
					'enabled'           => 1,
					'password'          => ''
				);

				$user_id = $user->insert($values);
			} else {
				// user exists, verified enabled.
				$user_id        = $user->getID("provider_id = {$userProfile->identifier}");
			}

			// set/update profile data.
			$values = array(
				'email'         => $userProfile->email,
				'display_name'  => $userProfile->displayName,
				'firstName'     => $userProfile->firstName,
				'lastName'      => $userProfile->lastName,
				'photo_url'     => $userProfile->photoURL,
				'provider_id'   => $userProfile->identifier,
				'provider'      => $provider
			);

			$user->update($values, array('id' => $user_id));

			// aunthenticate user.
			// What do we do when user is authenticated?
			// do it here...

			var_dump($userProfile);

		} catch( Exception $e ) {
			echo $e->getMessage();
		}
	}
}
