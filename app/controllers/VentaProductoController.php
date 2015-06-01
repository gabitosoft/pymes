<?php
class VentaProductoController extends BaseController {

  /*
  * Description: Mostrar la lista de todas las ventas productos registradas
  * Method: GET
  * Return: JSON
  */
  public function mostrarVentasProductos() { 
    try {
    
      $ventaProducto = VentaProducto::all();
      return $ventaProducto;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Insertar nueva venta producto en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarVentaProducto() {
    try {

      $ventaProducto = new VentaProducto;

      if (Input::has('unidad_producto') && Input::has('id_producto') && Input::has('id_venta') ) {
        
        $ventaProducto->unidad_producto = Input::get('unidad_producto');
        
        $producto = Producto::findOrFail(Input::get('id_producto'));
        $ventaProducto->id_producto = $producto->id;
        $venta = Venta::findOrFail(Input::get('id_venta'));
        $ventaProducto->id_producto = $venta->id;

        $ventaProducto-> timestamps = false;
        $ventaProducto->save();
        
        return $ventaProducto;

      } else {
      
        $mensaje = 'Los campos \'unidad producto\', \'id producto\' y \'id venta\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de una venta producto especifica
  * Method: POST
  * Return: JSON
  */
  public function mostrarVentaProducto() {
  
    try {
    
      if (Input::has('id')) {
      
        $ventaProducto = VentaProducto::findOrFail(Input::get('id'));
        return $ventaProducto;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar una venta producto de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarVentaProducto() {
    
    try {
    
      if (Input::has('id')) {
    
        $ventaProducto = VentaProducto::findOrFail(Input::get('id'));

        $ventaProducto->delete();
      
        $mensaje = 'Venta producto con ID: '.Input::get('id').' eliminada';
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
  * Description: Modificar una venta producto de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarVentaProducto() {
    try {

      if (Input::has('id')) {
    
        $ventaProducto = VentaProducto::findOrFail(Input::get('id'));
        $ventaProducto->unidad_producto = Input::get('unidad_producto', $ventaProducto->unidad_producto);
        $ventaProducto->id_producto = Input::get('id_producto', $ventaProducto->id_producto);
        $ventaProducto->id_venta = Input::get('id_venta', $ventaProducto->id_venta);

        $ventaProducto->timestamps = false;
        $ventaProducto-> save();

        return $ventaProducto;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}