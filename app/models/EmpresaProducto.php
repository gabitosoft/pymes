<?php
class EmpresaProducto extends Eloquent  {

  protected $table = 'empresas_productos';
  
  public function empresas() {
    return $this->belongsTo('Empresa', 'id');
  }

  public function productos() {
    return $this->belongsTo('Producto', 'id');
  }
}