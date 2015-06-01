<?php
class DetalleCompra extends Eloquent  {

  protected $table = 'detalles_compras';
  
  public function compras() {
    return $this->belongsTo('Compra', 'id');
  }

  public function productos() {
    return $this->belongsTo('Producto', 'id');
  }
}