<?php
class VentaProducto extends Eloquent  {

  protected $table = 'ventas_productos';
  
  public function ventas() {
    return $this->belongsTo('Venta', 'id');
  }

  public function productos() {
    return $this->belongsTo('Producto', 'id');
  }
}