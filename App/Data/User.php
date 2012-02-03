<?php
namespace App\Data;

class User extends \PPI\DataSource\ActiveQuery {
	
	protected $_meta = array(
		'conn'      => 'main',
		'table'     => 'user',
		'primary'   => 'id',
		'fetchmode' => \PDO::FETCH_ASSOC
	);
	
	/**
	 * Create the user
	 * 
	 * @param array $userData
	 * @param string $salt
	 * @return mixed
	 */
	function create(array $userData, $salt) {
		
		$encPass = $this->saltPass($salt, $userData['email'], $userData['password']);
		
		// Override the plaintext pass with the encrypted one 
		$userData['password'] = $encPass;
		
		return $this->insert($userData);
	}
	
	/**
	 * Salt the password
	 * 
	 * @param string $salt
	 * @param string $email
	 * @param string $pass
	 * @return string
	 */
	function saltPass($salt, $email, $pass) {
		return sha1($salt . $email . $pass);
	}
	
	/**
	 * Check the authentication fields to make sure things auth properly
	 * 
	 * @param string $email
	 * @param string $password
	 * @param string $salt
	 * @return boolean
	 */
	function checkAuth($email, $password, $salt) {
		
		$encPass = $this->saltPass($salt, $email, $password);
		
		$row = $this->_conn->createQueryBuilder()
			->select('count(id) as total')
			->from($this->_meta['table'], 'u')
			->andWhere('u.email = :email')
			->andWhere('u.password = :password')
			->setParameter(':email', $email)
			->setParameter(':password', $encPass)
			->execute()
			->fetch($this->_meta['fetchmode']);
		
		return $row['total'] > 0;
	}
	
	/**
	 * Find a user by email
	 * 
	 * @param string $email
	 * @return mixed
	 */
	function findByEmail($email) {
		return $this->_conn->createQueryBuilder()
			->select('u.*')
			->from($this->_meta['table'], 'u')
			->andWhere('u.email = :email')
			->setParameter(':email', $email)
			->execute()
			->fetch($this->_meta['fetchmode']);
	}
	
}