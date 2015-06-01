<?php
class DetalleProducto extends Eloquent  {

  protected $table = 'detalles_productos';
  
  public function detalles() {
    return $this->belongsTo('Detalle', 'id');
  }

  public function productos() {
    return $this->belongsTo('Producto', 'id');
  }
}