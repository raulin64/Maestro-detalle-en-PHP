<?php
//clase Maestra
class ContribuyenteModel{

    private $nombre;
    private $apellidos;
    private $dni;
    private $ContribuyenteClave;

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of dni
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of contribuyenteClave
     */
    public function getContribuyenteClave(){
        return $this->contribuyenteClave;
    }

    /**
     * Set the value of contribuyenteClave
     *
     * @return  self
     */
    public function setContribuyenteClave($contribuyenteClave){
        $this->contribuyenteClave = $contribuyenteClave;

        return $this;
    }

 
    function getAllContribuyente($cnn){
        try {
            $sql = 'SELECT * FROM w_Contribuyentes order by ContribuyenteID desc';
            $stmt = $cnn->prepare($sql);
            $stmt->execute();

            return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            //throw $th;
            echo 'Mensaje : -> ' . $e->getMessage();
            return 0;
            die();
        }
    }
}
