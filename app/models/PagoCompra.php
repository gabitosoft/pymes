<?php
class PagoCompra extends Eloquent  {

  protected $table = 'pagos_compras';
  
  public function compras() {
    return $this->belongsTo('Compra', 'id');
  }
}