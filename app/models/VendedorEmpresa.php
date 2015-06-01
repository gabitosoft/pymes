<?php
class VendedorEmpresa extends Eloquent  {

  protected $table = 'vendedores_empresas';
  
  public function empresas() {
    return $this->belongsTo('Empresa', 'id');
  }
}