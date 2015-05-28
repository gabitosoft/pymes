<?php
class Detalle extends Eloquent  {

  protected $table = 'detalles';

  public function detallesProductos() {
    return $this->hasMany('DetalleProducto');
  }
}
