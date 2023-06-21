<?php
class Clientes{
	
    public static $clientesTB = "clientes";

    public static function mostrarTodos(){
        $sql="SELECT * FROM ". self::$clientesTB ." ORDER BY id ASC";
        $query =Database::ExeDoIt($sql);
        $data = Model::many_assoc($query[0]);
        return $data;
    }


}