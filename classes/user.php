<?php

/**
 * Auxilia nas interações com a tabela user
 */
class User {

	#region Prorperties

	/**
	 * Primary key da tabela
	 *
	 * @var int
	 */
	private $id;

	/**
	 * Nome de usuário
	 *
	 * @var string
	 */
	private $user;

	/**
	 * Senha do usuário
	 * @var string
	 */
	private $pass;

	#endregion

	#region Methods

	/**
	 * Tenta logar com base no seu nome de usuário e senha
	 * @param  string $user Nome de usuário
	 * @param  string $pass Senha do usuário
	 * @return array
	 */
	public static function logIn($user, $pass){
		try{
			$stmt = Database::getInstance()->getConnection()
										   ->prepare("SELECT *
										   			  FROM `usuarios`
										   			  WHERE `user` = :user
										   			  AND `pass` = :pass");
			$stmt->bindParam(":user", $user);
			$stmt->bindParam(":pass", $pass);
			$stmt->execute();

			if(count(Database::select($stmt, __CLASS__)) > 0)
				return true;

			return false;
		}catch(PDOException $e){
			return false;
		}
	}

	#endregion

	#region Getters and Setters




    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     *
     * @return self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    #endregion
}
 ?>