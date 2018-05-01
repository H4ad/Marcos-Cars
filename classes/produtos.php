<?php

/**
 * Classe modelo para carros
 * @category Classes
 * @author Vinicius
 */
class Produtos
{
	#region Properties

	/**
	 * Primary key a tabela
	 *
	 * @var int
	 */

	private $id;

	/**
	 * Nome do modelo do carro
	 *
	 * @var string
	 */
	private $nome;

	/**
	 * Preço do carro a venda
	 *
	 * @var float
	 */
	private $preco;

	/**
	 * Ano do carro
	 *
	 * @var string
	 */
	private $ano;

	/**
	 * Km rodados
	 *
	 * @var int
	 */
	private $km;

	/**
	 * Cor do carro
	 *
	 * @var string
	 */
	private $cor;

	/**
	 * Número de portas do carro
	 *
	 * @var int
	 */
	private $portas;

	/**
	 * Tipo de combustível
	 *
	 * @var string
	 */
	private $combustivel;

	/**
	 * Tipo de cambio
	 *
	 * @var string
	 */
	private $cambio;

	/**
	 * Número de final de placa
	 *
	 * @var int
	 */
	private $final_placa;

	/**
	 * Tipo de carroceria
	 *
	 * @var string
	 */
	private $carroceria;

	/**
	 * Data de anuncio
	 *
	 * @var string
	 */
	private $data_anuncio;

	/**
	 * Observações sobre o carro
	 *
	 * @var string
	 */
	private $observacoes;

	/**
	 * Detalhes a mais sobre o carro
	 *
	 * @var string
	 */
	private $detalhes;

	/**
	 * Caminho para as imagens do carro
	 *
	 * @var string
	 */
	private $image_path;

	#endregion

	#region Methods

	/**
	 * Retorna uma lista com os carros recentemente adicionados.
	 * @return array
	*/
	public function loadNewCars(){
		$stmt = Database::getInstance()->getConnection()
									   ->query("SELECT id, nome, preco
									   			FROM produtos
									   			ORDER BY id DESC
									   			LIMIT 3");

		return Database::select($stmt, __CLASS__);
	}

	/**
	 * Retorna os carros para serem exibidos na Home
	 * @return void
	 */
	public function loadCarsHome(){
        try{
    		$stmt = Database::getInstance()->getConnection()
    									   ->query("SELECT id, nome, preco
    												FROM produtos
    												ORDER BY id DESC
    												LIMIT 9 OFFSET 3");

    		return Database::select($stmt, __CLASS__);
        }catch(PDOException $e){
            return [];
        }
	}

    /**
     * Deleta um carro do banco
     * @param  int $id_car Id do carro
     * @return array
     */
    public static function delete($id_car){
        try{
            $stmt = Database::getInstance()->getConnection()
                                           ->prepare("DELETE FROM `produtos`
                                                      WHERE `produtos`.`id` = :id_car");
            $stmt->bindParam(":id_car", $id_car);
            $stmt->execute();

            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    /**
     * Busca informações no banco baseado em um texto.
     * @param  string $busca       Texto de pesquisa
     * @param  string $orderby     Indica a coluna e se é DESC ou ASC
     * @param  int $pagina         Página de pesquisa, ajuda na paginação
     * @param  int $carsperpage    Itens por página
     * @return array
     */
    public static function find($busca, $orderby, $pagina, $carsperpage){
        try{
            $stmt = Database::getInstance()->getConnection()
                                           ->prepare("SELECT *
                                                    FROM produtos
                                                    WHERE `nome` = :busca
                                                    OR `preco` = :busca
                                                    OR `ano` = :busca
                                                    OR `km` = :busca
                                                    OR `cor` = :busca
                                                    OR `portas` = :busca
                                                    OR `combustivel` = :busca
                                                    OR `cambio` = :busca
                                                    OR `final_placa` = :busca
                                                    OR `carroceria` = :busca
                                                    OR `data_anuncio` = :busca
                                                    OR `observacoes` = :busca
                                                    OR `detalhes` = :busca
                                                    ORDER BY :orderby
                                                    LIMIT :carsperpage OFFSET :offset");

            $stmt->bindParam(":busca", $busca);
            $stmt->bindParam(":orderby", $orderby);
            $stmt->bindParam(":carsperpage", $carsperpage);
            $offsetValue = ($pagina * $carsperpage) - $carsperpage;
            $stmt->bindParam(":offset", $offsetValue);
            $stmt->execute();

            return Database::select($stmt, __CLASS__);
        }catch(PDOException $e){
            return [];
        }
    }

    /**
     * Faz um simples select no banco com páginação
     * @param  string $orderby     Indica a coluna e se é DESC ou ASC
     * @param  int $pagina         Página de pesquisa, ajuda na paginação
     * @param  int $carsperpage    Itens por página
     * @return array
     */
    public static function pagination($orderby, $pagina, $carsperpage){
        try{
            $stmt = Database::getInstance()->getConnection()
                                           ->prepare("SELECT *
                                                      FROM produtos
                                                      ORDER BY :orderby
                                                      LIMIT :carsperpage OFFSET :offset");

            $stmt->bindParam(":orderby", $orderby);
            $stmt->bindParam(":carsperpage", $carsperpage);
            $offsetValue = ($pagina * $carsperpage) - $carsperpage;
            $stmt->bindParam(":offset", $offsetValue);
            $stmt->execute();

            return Database::select($stmt, __CLASS__);
        }catch(PDOException $e){
            return [];
        }
    }

    /**
     * Adiciona um carro no banco de dados
     * @param string $nome        Nome do modelo do carro
     * @param float $preco        Preço do carro
     * @param int $ano            Ano de fabricação do carro
     * @param int $km             Quilometragem do carro
     * @param string $cor         Cor do carro
     * @param int $portas         Número de portas do carro
     * @param string $combustivel Tipo de combustivel
     * @param string $cambio      Tipo de cambio
     * @param int $final_placa    Número final da placa
     * @param string $carroceria  Tipo de carroceria
     * @param string $observacoes Observações para o carro
     * @param string $detalhes    Detalhes a mais do carro
     * @return boolean
     */
    public static function add($nome, $preco, $ano, $km, $cor, $portas, $combustivel, $cambio, $final_placa, $carroceria, $observacoes, $detalhes){
        try{
            $stmt = Database::getInstance()->getConnection()
                                           ->prepare("INSERT INTO `produtos`(`nome`, `preco`, `ano`, `km`, `cor`, `portas`, `combustivel`, `cambio`, `final_placa`, `carroceria`, `observacoes`, `detalhes`)
                                                    VALUES (
                                                        :nome,
                                                        :preco,
                                                        :ano,
                                                        :km,
                                                        :cor,
                                                        :portas,
                                                        :combustivel,
                                                        :cambio,
                                                        :final_placa,
                                                        :carroceria,
                                                        :observacoes,
                                                        :detalhes
                                                    )");

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":ano", $ano);
            $stmt->bindParam(":km", $km);
            $stmt->bindParam(":cor", $cor);
            $stmt->bindParam(":portas", $portas);
            $stmt->bindParam(":combustivel", $combustivel);
            $stmt->bindParam(":cambio", $cambio);
            $stmt->bindParam(":final_placa", $final_placa);
            $stmt->bindParam(":carroceria", $carroceria);
            $stmt->bindParam(":observacoes", $observacoes);
            $stmt->bindParam(":detalhes", $detalhes);
            $stmt->execute();

            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    /**
     * Busca o ultimo carro adicionado
     * @return array
     */
    public static function getLastCar(){
        try{
            $stmt = Database::getInstance()->getConnection()
                                           ->query("SELECT *
                                                    FROM produtos
                                                    ORDER BY id DESC
                                                    LIMIT 1");

            return Database::select($stmt, __CLASS__);
        }catch(PDOException $e){
            return [];
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return float
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     *
     * @return self
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * @return string
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param string $ano
     *
     * @return self
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * @return int
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @param int $km
     *
     * @return self
     */
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }

    /**
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param string $cor
     *
     * @return self
     */
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * @return int
     */
    public function getPortas()
    {
        return $this->portas;
    }

    /**
     * @param int $portas
     *
     * @return self
     */
    public function setPortas($portas)
    {
        $this->portas = $portas;

        return $this;
    }

    /**
     * @return string
     */
    public function getCombustivel()
    {
        return $this->combustivel;
    }

    /**
     * @param string $combustivel
     *
     * @return self
     */
    public function setCombustivel($combustivel)
    {
        $this->combustivel = $combustivel;

        return $this;
    }

    /**
     * @return string
     */
    public function getCambio()
    {
        return $this->cambio;
    }

    /**
     * @param string $cambio
     *
     * @return self
     */
    public function setCambio($cambio)
    {
        $this->cambio = $cambio;

        return $this;
    }

    /**
     * @return int
     */
    public function getFinalPlaca()
    {
        return $this->final_placa;
    }

    /**
     * @param int $final_placa
     *
     * @return self
     */
    public function setFinalPlaca($final_placa)
    {
        $this->final_placa = $final_placa;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarroceria()
    {
        return $this->carroceria;
    }

    /**
     * @param string $carroceria
     *
     * @return self
     */
    public function setCarroceria($carroceria)
    {
        $this->carroceria = $carroceria;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataAnuncio()
    {
        return $this->data_anuncio;
    }

    /**
     * @param string $data_anuncio
     *
     * @return self
     */
    public function setDataAnuncio($data_anuncio)
    {
        $this->data_anuncio = $data_anuncio;

        return $this;
    }

    /**
     * @return string
     */
    public function getObservacoes()
    {
        return $this->observacoes;
    }

    /**
     * @param string $observacoes
     *
     * @return self
     */
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;

        return $this;
    }

    /**
     * @return string
     */
    public function getDetalhes()
    {
        return $this->detalhes;
    }

    /**
     * @param string $detalhes
     *
     * @return self
     */
    public function setDetalhes($detalhes)
    {
        $this->detalhes = $detalhes;

        return $this;
    }

    /**
     * @return stirng
     */
    public function getImagePath()
    {
        return $this->image_path;
    }

    /**
     * @param stirng $image_path
     *
     * @return self
     */
    public function setImagePath(stirng $image_path)
    {
        $this->image_path = $image_path;

        return $this;
    }

    #endregion
}
?>