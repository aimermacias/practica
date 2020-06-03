<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/FacultadDAO.php";
class Producto{
    private $id;
    private $nombre;
    private $direccion;
    private $telefono;
    private $conexion;
    private $facultadDAO;
    
    public function getId(){
        return $this -> id;
    }
    
    public function getNombre(){
        return $this -> nombre;
    }
    
    public function getDireccion(){
        return $this -> direccion;
    }
    
    public function getTelefono(){
        return $this -> telefono;
    }
        
    public function Producto($id = "", $nombre = "", $direccion = "", $telefono = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> direccion = $direccion;
        $this -> telefono = $telefono;
        $this -> conexion = new Conexion();
        $this -> facultadDAO = new FacultadDAO($this -> id, $this -> nombre, $this -> telefono, $this -> direccion);
    }
    
    public function insertar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> facultadDAO -> insertar());        
        $this -> conexion -> cerrar();        
    }
    
    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facultadDAO -> consultarTodos());
        $productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $p = new facultadDAO($resultado[0], $resultado[1], $resultado[2], $resultado[3]);
            array_push($productos, $p);
        }
        $this -> conexion -> cerrar();        
        return $facultadDAO;
    }
    
    public function consultarPaginacion($cantidad, $pagina){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> facultadDAO -> consultarPaginacion($cantidad, $pagina));
        $productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $p = new facultadDAO($resultado[0], $resultado[1], $resultado[2], $resultado[3]);
            array_push($productos, $p);
        }
        $this -> conexion -> cerrar();
        return $productos;
    }
    
}

?>
