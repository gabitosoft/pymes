<?php
class Venta extends Eloquent  {

  protected $table = 'ventas';
  
  public function usuarios() {
    return $this->belongsTo('Usuario', 'id');
  }

  public function clienteVentas() {
    return $this->hasMany('ClienteVenta');
  }
}