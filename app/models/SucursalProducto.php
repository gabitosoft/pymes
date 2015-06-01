<?php
class SucursalProducto extends Eloquent  {

  protected $table = 'sucursales_productos';
  
  public function productos() {
    return $this->belongsTo('Producto', 'id');
  }
  
  public function sucursales() {
    return $this->belongsTo('Sucursal', 'id');
  }
}