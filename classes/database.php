<?php
require_once("../inc/config.php");

/**
 * Auxilia nas conexões com o banco de dados.
 *
 * @category Classes
 */
class Database
{
    #region Properties

    /**
     * Conexão com o banco de dados
     *
     * @var PDOConnection
     */
    private $_connection;

    /**
     * Instância da conexão com o banco de dados
     *
     * @var PDOConnection
     */
    private static $_instance; //The single instance

    /**
     * Host do banco de dados
     *
     * @var string
     */
    private $_host = DB_HOST;

    /**
     * Nome do usuário do banco de dados
     *
     * @var string
     */
    private $_username = DB_USER;

    /**
     * Senha do usuário do banco de dados
     *
     * @var string
     */
    private $_password = DB_PASSWORD;

    /**
     * Nome do banco de dados
     *
     * @var string
     */
    private $_database = DB_NAME;

    #endregion

    #region Constructor

    /**
     * Construtor padrão
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $this->_connection  = new PDO("mysql:host=$this->_host;dbname=$this->_database", $this->_username, $this->_password);
            //$this->_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    #endregion

    #region Methods

    /**
    * Get an instance of the Database
    *
    * @return instance
    */
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Magic method clone is empty to prevent duplication of connection
    *
    * @return void
    */
    private function __clone(){ }

    /**
     * Get mysql pdo connection
     *
     * @return pdoConnection
     */
    public function getConnection()
    {
        return $this->_connection;
    }

    /**
    * Faz uma consulta no banco e retorna o seu resultado
    *
    * @return array
    */
    public static function select($stmt, $class){
		$objects = array();
        while ($object = $stmt->fetchObject($class)) {
            $objects[] = $object;
        }
		return $objects;
    }

    #endregion
}
?>