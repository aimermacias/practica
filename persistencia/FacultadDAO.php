<?php
class FacultadDAO{
    private $id;
    private $nombre;
    private $direccion;
    private $telefono;
    
    public function facultadDAO($id = "", $nombre = "", $direccion = "", $telefono = ""){
        $this -> idcarrera = $id;
        $this -> nombre = $nombre;
        $this -> cantidadc = $direccion;
        $this -> precio = $telefono;
    }
    
    public function insertar(){
        return "insert into Facultad (nombre, direccion, telefono)
                values ('" . $this -> nombre . "', '" . $this -> direccion . "', '" . $this ->telefono . "')";
    }
    
    public function consultarTodos(){
        return "select id, nombre, direccion, telefono
                from Facultad";
    }
    
    public function consultarPaginacion($cantidad, $pagina){
        return "select id, nombre, direccion, telefono
                from Facultad
                limit " . (($pagina-1) * $cantidad) . ", " . $cantidad;
    }
    
    
}

?>
