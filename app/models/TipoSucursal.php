<?php
class TipoSucursal extends Eloquent  {

  protected $table = 'tipos_sucursales';
    
  public function sucursales() {
  
    return $this->hasMany('Sucursal');
  }
}