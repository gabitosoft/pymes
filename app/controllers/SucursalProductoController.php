<?php
class SucursalProductoController extends BaseController {

  /*
  * Description: Mostrar la lista de todas las sucursales productos
  * Method: GET
  * Return: JSON
  */
  public function mostrarSucursalesProductos() { 
    try {
    
      $sucursalesProductos = SucursalProductoController::all();
      return $sucursalesProductos;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nueva sucursal producto en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarSucursalProducto() {
    try {

      $sucursalProducto = new SucursalProducto;

      if (Input::has('id_sucursal') && Input::has('id_producto') && Input::has('unidad_sucursal_producto') ) {

        $sucursalProducto->unidad_sucursal_producto = Input::get('unidad_sucursal_producto');

        $sucursal = Sucursal::findOrFail(Input::get('id_sucursal'));
        $sucursalProducto->id_sucursal = $sucursal->id;

        $producto = Producto::findOrFail(Input::get('id_producto'));
        $sucursalProducto->id_producto = $producto->id;

        $sucursalProducto-> timestamps = false;
        $sucursalProducto->save();
        
        return $sucursalProducto;

      } else {
      
        $mensaje = 'Los campos \'id producto\' y \'id sucursal\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de una sucursal producto especifica
  * Method: POST
  * Return: JSON
  */
  public function mostrarSucursalProducto() {
  
    try {
    
      if (Input::has('id')) {
      
        $sucursalProducto = SucursalProducto::findOrFail(Input::get('id'));
        return $sucursalProducto;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar una sucursal producto de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarUsuario() {

    try {
    
      if (Input::has('id')) {
    
        $sucursalProducto = SucursalProducto::findOrFail(Input::get('id'));

        $sucursalProducto->delete();
      
        $mensaje = 'Sucursal producto con ID: '.Input::get('id').' eliminada';
        return Utils::enviarRespuesta('OK', $mensaje, 200);
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Modificar una sucursal producto de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarSucursalProducto() {
    try {

      if (Input::has('id')) {
    
        $sucursalProducto = SucursalProducto::findOrFail(Input::get('id'));

        $sucursalProducto->unidad_sucursal_producto = Input::get('unidad_sucursal_producto', $sucursalProducto->unidad_sucursal_producto);
        $sucursalProducto->id_sucursal = Input::get('id_sucursal', $sucursalProducto->id_sucursal);
        $sucursalProducto->id_producto = Input::get('id_producto', $sucursalProducto->id_producto);

        $sucursalProducto->timestamps = false;
        $sucursalProducto-> save();

        return $sucursalProducto;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}