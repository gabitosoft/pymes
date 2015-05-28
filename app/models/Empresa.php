<?php
class Empresa extends Eloquent  {

  protected $table = 'empresas';
  
  public function empresasProductos() {
    return $this->hasMany('EmpresaProducto');
  }
}
