<?php
class Sucursal extends Eloquent {

    protected $table = 'sucursales';

    public function tipos() {

      return $this->belongsTo('TipoSucursal', 'id');
    }
    
    public function sucursalesProductos() {
      return $this->hasMany('SucursalProducto');
    }
}