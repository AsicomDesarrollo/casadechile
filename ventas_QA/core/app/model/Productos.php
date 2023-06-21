<?php
class Productos{
	
    public static $productosTB = "productos";
    public static $categoriasTB = "categorias";

    public function Productos(){
        $this->id = "";
		$this->nombre = "";
    }
    public function Categorias(){
        $this->id = "";
        $this->nombre ="";
        $this->estatus ="";
        $this->fecha ="";
    }

    public static function ultimosFolios(){
        $sql= "select id,cliente,folio from venta_tiket where vendedor = ".$_SESSION['id']." and metodoPago is NULL order by id DESC limit 5";
        $query= Database::ExeDoIt($sql);
        $folios = Model::many_assoc($query[0]);
        return $folios;

    }

    public static function todalaVenta($folioTimeStamp){
        $sql = "select c.*,v.id id_tiket from compras c
        inner join venta_tiket v
        on c.id_venta = v.folio
        where id_venta ='".$folioTimeStamp."' ";
        $query = Database::ExeDoIt($sql);
        $venta = Model::many_assoc($query[0]);
        return $venta;

    }

    public static function mostrarCategorias(){
        $sql="SELECT * FROM ". self::$categoriasTB ." WHERE estatus = 1 ORDER BY id ASC";
        $query =Database::ExeDoIt($sql);
        $data = Model::many_assoc($query[0]);
        return $data;
    }

    public static function mostrarProductosCategoria($idCategoria){
        $sql="SELECT * FROM ". self::$productosTB ." WHERE categoria = $idCategoria";
        $query =Database::ExeDoIt($sql);
        $data = Model::many_assoc($query[0]);
        return $data;
    }

}