<?php

namespace Laurent\App\Models;

class Users
{
	/**
	 * 
	 * @var int
	 * @access protected
	 */
	protected $id;

	/**
	 * 
	 * @var string
	 * @access protected
	 */
	protected $lastname;

	/**
	 * 
	 * @var string
	 * @access protected
	 */
	protected $firstname;

	/**
	 * 
	 * @var string
	 * @access protected
	 */
	protected $email;

	/**
	 * 
	 * @var datetime
	 * @access protected
	 */
	protected $username;

	/**
	 * 
	 * @var string
	 * @access protected
	 */
	protected $password;

	/**
	 * 
	 * @var int
	 * @access protected
	 */
	protected $rank;

	/**
	 * 
	 * @var timestamp
	 * @access protected
	 */
	protected $confirmedAt;

	/**
	 * 
	 * @var timestamp
	 * @access protected
	 */
	protected $timeToDelete;
	
	/**
	 * @access public
	 * @param array $values 
	 * @return void
	 */
	public function __construct($values = []) 
	{
		if(!empty($values))
		{
			$this->hydrate($values);
		}
	}

	/**
	 * @access public
	 * @param array $data 
	 * @return void
	 */
	public function hydrate($datas) 
	{
		foreach ($datas as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	/**
	 * @access public
	 * @return bool
	 */
	public function isValable() 
	{
		return !(empty($this->lastname) || empty($this->firstname) || empty($this->email)) || empty($this->username);
	}

/////////////////////////////////////////////////////////////
//////////////////////SETTERS////////////////////////////////
/////////////////////////////////////////////////////////////

	/**
	 * @access public
	 * @param int $id 
	 * @return void
	 */
	public function setId($id) 
	{
		{
			$this->id = (int) $id;
		}
	}

	/**
	 * 					
	 * @access public
	 * @param string $lastname 
	 * @return void
	 */
	public function setLastname($lastname) 
	{
		if(is_string($lastname) && strlen($lastname) <= 100 && !empty($lastname))
		{
			$this->lastname = $lastname;			
		}
		else
		{
			$this->errors[] = self::INVAILABLE_LASTNAME;
		}
	}

	/**
	 * @access public
	 * @param string $firstname 
	 * @return void
	 */
	public function setFirstname($firstname) 
	{
		if(is_string($firstname) && strlen($firstname) <= 100 && !empty($firstname))
		{
			$this->firstname = $firstname;			
		}
		else
		{
			$this->errors[] = self::INVAILABLE_FIRSTNAME;
		}
	}

	/**
	 * @access public
	 * @param string $email 
	 * @return void
	 */
	public function setEmail($email) 
	{
		if(is_string($email) && strlen($email) <= 100 && !empty($email))
		{
			$this->email = $email;			
		}
		else
		{
			$this->errors[] = self::INVAILABLE_EMAIL;
		}
	}

	/**
	 * @access public
	 * @param datetime $username 		
	 * @return void
	 */
	public function setUsername($username) 
	{
		if(is_string($username) && strlen($username) <= 50 && !empty($username))
		{
			$this->username = $username;			
		}
		else
		{
			$this->errors[] = self::INVAILABLE_FIRSTNAME;
		}
	}

	/**
	 * @access public
	 * @param datetime $password 
	 * @return void
	 */
	public function setPassword($password) 
	{
		$this->password = $password;
	}

	/**
	 * @access public
	 * @param int $rank 
	 * @return void
	 */
	public function setRank($rank) 
	{
		{
			$this->rank = (int) $rank;
		}
	}

	/**
	 * @access public
	 * @param int $confirmedAt 
	 * @return void
	 */
	public function setConfirmedAt($confirmedAt) 
	{
		{
			$this->confirmedAt = $confirmedAt;
		}
	}

	/**
	 * @access public
	 * @param datetime $passwordVerif 
	 * @return void
	 */
	public function setTimeToDelete($timeToDelete) 
	{
		$this->timeToDelete = $timeToDelete;
	}
/////////////////////////////////////////////////////////////
//////////////////////GETTERS////////////////////////////////
/////////////////////////////////////////////////////////////

	/**
	 * @access public
	 * @return array
	 */
	public function errors() 
	{
		return $this->errors;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function id() 
	{
		return $this->id;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function lastname() 
	{
		return $this->lastname;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function firstname() 
	{
		return $this->firstname;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function email() 
	{
		return $this->email;
	}

	/**
	 * @access public
	 * @return datetime
	 */
	public function username() 
	{
		return $this->username;
	}

	/**
	 * @access public
	 * @return datetime
	 */
	public function password() 
	{
		return $this->password;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function rank() 
	{
		return $this->rank;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function confirmedAt() 
	{
		return $this->confirmedAt;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function timeToDelete() 
	{
		return $this->timeToDelete;
	}
}
