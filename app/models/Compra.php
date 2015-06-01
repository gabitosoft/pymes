<?php
class Compra extends Eloquent  {

  protected $table = 'compras';
  
  public function usuarios() {
    return $this->belongsTo('Usuario', 'id');
  }
  
  public function sucursales() {
    return $this->belongsTo('Sucursal', 'id');
  }
  
  public function detallesCompras() {
    return $this->hasMany('DetalleCompra');
  }

  public function pagosCompras() {
    return $this->hasMany('PagoCompra');
  }
}