<?php

/**
 * Lida com as imagens
 *
 * @category Classes
 */
class Images
{

	#region Properties

	/**
	 * Primary key da tabela
	 *
	 * @var int
	 */
	private $id;

	/**
	 * Foreign key do carro
	 *
	 * @var int
	 */
	private $car_id;

	/**
	 * Caminho da imagem
	 *
	 * @var string
	 */
	private $path_file;

	#endregion

	#region Methods

	/**
	 * Retorna imagens do banco com base no id
	 * @param  int $id_car Id do produto
	 * @return array
	 */
	public static function getImageById($id_car){
		try{
			$stmt = Database::getInstance()->getConnection()
										   ->prepare("SELECT *
										   			  FROM `galeria`
										   			  WHERE `car_id` = :car_id");
			$stmt->bindParam(":car_id", $id_car);
			$stmt->execute();

			return Database::select($stmt, __CLASS__);
		}catch(PDOException $e){
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';

			return [];
		}
	}

	/**
	 * Apaga todas as imagens relacionadas a um carro
	 * @param  int $id_car Id do carro
	 * @return boolean
	 */
	public static function deleteAll($id_car){
		try {
			$images = getImageById($id_car);

			//Primeiro apaga as imagens da pasta do site.
			foreach($images as $image){
				if($image->getPathFile() != "demoupload.jpg"){
					if(unlink(IMAGE_PATCH . $image->getPathFile()));
				}
			}

			//Depois deleta as imagens do banco
			$stmt = Database::getInstance()->getConnection()
									   	   ->prepare("DELETE FROM `galeria`
									   			  	  WHERE car_id = :car_id");
			$stmt->bindParam(":car_id", $id_car);
			$stmt->execute();

			return true;
		} catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';

			return false;
  		}
	}

	/**
	 * Adiciona uma imagem para o carro
	 * @param int $id_car      Id do carro
	 * @param [type] $image_name  [description]
	 * @param [type] $image_tmp   [description]
	 * @param int $image_error Número do erro
	 * @return boolean
	 */
	public static function add($id_car, $image_name, $image_tmp, $image_error){
		try {
			if (!isset($image_name) || $image_error != 0) {
				return false;
			}

		    $extensao = pathinfo($image_name, PATHINFO_EXTENSION);
	    	if (!strstr('.jpg;.jpeg;.gif;.png', strtolower($extensao))) {
	    		return false;
	    	}

	        $novoNome = uniqid(time()) . "." . strtolower($extensao);
	        $destino = IMAGE_PATCH . $novoNome;

	        if (!(@move_uploaded_file($image_tmp, $destino))) {
	        	return false;
	        }

	        $stmt = Database::getInstance()->getConnection()
									   	   ->prepare("INSERT INTO `galeria` (`car_id`, `path_file`)
									   	   			  VALUES  (:car_id, :pathFile)");
			$stmt->bindParam(":car_id", $id_car);
			$stmt->bindParam(":pathFile", $novoNome);
			$stmt->execute();

			return true;
		}catch (Exception $e) {
			echo $e;
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';

			return false;
	  	}
	}

	#endregion

	#region Setters and Getters

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
     * @return int
     */
    public function getCarId()
    {
        return $this->car_id;
    }

    /**
     * @param int $car_id
     *
     * @return self
     */
    public function setCarId($car_id)
    {
        $this->car_id = $car_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPathFile()
    {
        return $this->path_file;
    }

    /**
     * @param string $path_file
     *
     * @return self
     */
    public function setPathFile($path_file)
    {
        $this->path_file = $path_file;

        return $this;
    }

    #endregion
}

?>