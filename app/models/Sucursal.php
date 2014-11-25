<?php
class Sucursal extends Eloquent {

    protected $table = 'sucursales';
    
    public function tipoSucursal() {
    
        return $this->hasOne('TipoSucursal');
    }
}