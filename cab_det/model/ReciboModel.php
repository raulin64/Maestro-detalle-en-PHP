<?php 
//clase Detalle
class ReciboModel{

    private $ejercicio;
    private $domicilio;
    private $numero;
    private $pais;
    private $fk_ContribuyenteClave;

    /**
     * Get the value of 	ejercicio
     */ 
    public function getEjercicio(){
        return $this->ejercicio;
    }

    /**
     * Set the value of ejercicio
     *
     * @return  self
     */ 
    public function setEjercicio($ejercicio){
        $this->ejercicio = $ejercicio;

        return $this;
    }

    /**
     * Get the value of domicilio
     */ 
    public function getTipo(){
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo){
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero(){
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero){
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of objetoTributario
     */ 
    public function getObjetoTributario(){
        return $this->objetoTributario;
    }

    /**
     * Set the value of objetoTributario
     *
     * @return  self
     */ 
    public function setObjetoTributario($objetoTributario){
        $this->objetoTributario = $objetoTributario;

        return $this;
    }

     /**
     * Get the value of fk_ContribuyenteClave
     */ 
    public function getfk_ContribuyenteClave()
    {
        return $this->fk_ContribuyenteClave;
    }

    /**
     * Set the value of fk_ContribuyenteClave
     *
     * @return  self
     */ 
    public function setfk_ContribuyenteClave($fk_ContribuyenteClave){
        $this->fk_ContribuyenteClave = $fk_ContribuyenteClave;

        return $this;
    }

 

    public function getReciboByID($id_fk, $cnn){        
			try {
                $sql  = ' SELECT * FROM w_recibos where ContribuyenteClave = '.$id_fk;
                $stmt = $cnn->query($sql);
                //$stmt->bindParam(":fk_ContribuyenteClave", $id_fk, PDO::PARAM_INT);
                //$stmt->execute();

                return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                
            } catch (PDOException $e) {
                //throw $th;
                echo 'Mensaje : -> ' . $e->getMessage();
                return 0;
                die();
            }		
    }

    public function getReciboByCi($id, $cnn){
        try {
			try {
                $sql = 'SELECT * FROM w_recibos WHERE fk_ContribuyenteClave =:id';
                $stmt = $cnn->prepare($sql);
                $stmt->bindParam(':fk_ContribuyenteClave', $id);
                $stmt->execute();
                if (!$stmt->rowCount()){
                    echo "Deletion failed";
                    return 0;
                } 
                
            } catch (PDOException $e) {
                //throw $th;
                echo 'Mensaje : -> ' . $e->getMessage();
                return 0;
                die();
            }
		} catch (PDOException $e) {
			//throw $th;
			echo 'Mensaje : -> '.get_class($this).' - '.$e->getMessage();
            return 1 ;
			die();
		}

    }

    public function getAllRecibo($cnn){

    }
}

?>