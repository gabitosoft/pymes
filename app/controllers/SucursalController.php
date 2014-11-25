<?php
class SucursalController extends BaseController{
public function mostrarSucursal()
 { 
   $sucursal = Sucursal::all();
    return $sucursal;
    
 }
    
    public function guardarSucursal()
    {
        $tipo_sucursal = new TipoSucursal(array('nombre_tipos_sucursales' => 'almacen'));
        $tipo_sucursal = new TipoSucursal
        //$tipo_sucursal->id = '1';
        //$tipo_sucursal->nombre_tipos_sucursales ='almacen';
        
        
        $sucursal =new Sucursal;
        $sucursal->direccion_sucursal ='av suecia';
        $sucursal->telefono_sucursal = 123456;
        $sucursal->numero_sucursal = 1;
        $sucursal->timestamps=false;
        
        $sucursal->tipoSucursal()->save($tipo_sucursal);
        $sucursal->save();
        
    }
    public function borrarSucursal()
    {
       $sucursal = Sucursal::find();
       $sucursal->delete();
    }
    
   public function modificarSucursal()
    {
        $sucursal = Sucursal::find();
        $sucursal ->direccion_sucursal = 'paisaje';
        $sucursal->telefono_sucursal = 546575;
        $sucursal->numero_sucursal = 2;
        $sucursal->timestamps = false;
        $sucursal-> save();
    }
}


