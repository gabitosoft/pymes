<?php
class ClienteVenta extends Eloquent  {

  protected $table = 'clientes_ventas';
  
  public function ventas() {
    return $this->belongsTo('Venta', 'id');
  }

  public function clientes() {
    return $this->belongsTo('Cliente', 'id');
  }
}