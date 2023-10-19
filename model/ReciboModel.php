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
	
	
    public function updateReciboByID($id, $cnn, $dat,$fiel){ 
	
		
				$sql = 'UPDATE w_recibos SET '.$fiel.' = "'.$dat.'" WHERE RecibosID='.$id;
				  echo "<script>alert('Debug Objects: " . $sql . "' );</script>";
				//$sql = 'UPDATE w_recibos SET Numero = "001000000018247"  WHERE RecibosID=1508';
                $stmt = $cnn->query($sql);
                //$stmt->bindParam(":fk_ContribuyenteClave", $id_fk, PDO::PARAM_INT);
                //$stmt->execute();

                return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                
            	
 }

    public function insertReciboByID($idx, $cnn, $Ejerciciox,$Tipox,$Numerox,$ImportePrincipalx){ 
	
				$sql = "INSERT INTO w_recibos
	(ContribuyenteClave, Ejercicio, Tipo, TributoGeneral, TributoDetallado, Numero, Fraccion, ObjetoTributario, CargoDes, EstadoDes, ImportePrincipal, ImporteIva, Bonificacion, ImporteRecargo, InteresDemora, InteresLegal, ImporteCostas, ImporteTotal, Activado, VE, APD, Titulo1, Valor1, Titulo2, Valor2, Titulo3, Valor3, Titulo4, Valor4, Titulo5, Valor5, Titulo6, Valor6, Titulo7, Valor7, Titulo8, Valor8, Titulo9, Valor9, Titulo10, Valor10, EmisoraValor, ReferencajaC60Valor, IdentificadorValor, CB_Referencia, NumeroReferencia, Emisora, ReferenciaC60, Identificador, FechaExpiracion, FechaLiquidacionVol, FechaPagado, PeriodoPago, PeriodoRecibo)
	VALUES ($idx, $Ejerciciox, $Tipox, '', '', $Numerox, '', '', '', '', $ImportePrincipalx, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NOW(), NOW(), NOW(), '', '')";
				  echo "<script>alert('Debug Objects: " . $sql . "' );</script>";
				//$sql = 'UPDATE w_recibos SET Numero = "001000000018247"  WHERE RecibosID=1508';
                $stmt = $cnn->query($sql);
                //$stmt->bindParam(":fk_ContribuyenteClave", $id_fk, PDO::PARAM_INT);
                //$stmt->execute();

                return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                
            	
 }

 public function deleteDetalle($id, $cnn){
        try {
			try {
                $sql = 'DELETE FROM w_recibos WHERE RecibosID =:id';
                $stmt = $cnn->prepare($sql);
                $stmt->bindParam(':id', $id);
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