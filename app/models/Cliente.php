<?php
class Cliente extends Eloquent  {

  protected $table = 'clientes';
  
  public function clienteVentas() {
    return $this->hasMany('ClienteVenta');
  }
}
