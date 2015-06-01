<?php
class Producto extends Eloquent  {

  protected $table = 'productos';
    
  public function marcas() {
    return $this->belongsTo('MarcaProducto', 'id');
  }
  
  public function sucursalesProductos() {
    return $this->hasMany('SucursalProducto');
  }
  
  public function empresasProductos() {
    return $this->hasMany('EmpresaProducto');
  }

  public function detallesCompras() {
    return $this->hasMany('DetalleCompra');
  }

  public function detallesProductos() {
    return $this->hasMany('DetalleProducto');
  }
}