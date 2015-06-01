<?php
class DetalleProductoController extends BaseController {

  /*
  * Description: Mostrar la lista de todos los detalles productos registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarDetallesProductos() { 
    try {
    
      $detallesProductos = DetalleProducto::all();
      return $detallesProductos;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nuevo detalle producto en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarDetalleProducto() {
    try {

      $detalleProducto = new DetalleProducto;

      if (Input::has('id_producto') && Input::has('id_detalle') ) {

        $compra = Detalle::findOrFail(Input::get('id_detalle'));
        $detalleProducto->id_detalle = $compra->id;

        $producto = Producto::findOrFail(Input::get('id_producto'));
        $detalleProducto->id_producto = $producto->id;

        $detalleProducto-> timestamps = false;
        $detalleProducto->save();
        
        return $detalleProducto;

      } else {
      
        $mensaje = 'Los campos \'id producto\' y \'id detalle\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de un detalle producto especifico
  * Method: POST
  * Return: JSON
  */
  public function mostrarDetalleProducto() {
  
    try {
    
      if (Input::has('id')) {
      
        $detalleCompra = DetalleProducto::findOrFail(Input::get('id'));
        return $detalleCompra;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar un detalle producto de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarDetalleProducto() {
    
    try {
    
      if (Input::has('id')) {
    
        $detalleProducto = DetalleProducto::findOrFail(Input::get('id'));

        $detalleProducto->delete();
      
        $mensaje = 'Detalle producto con ID: '.Input::get('id').' eliminado';
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
  * Description: Modificar un detalle producto de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarDetalleProducto() {
    try {

      if (Input::has('id')) {

        $detalleProducto = DetalleProducto::findOrFail(Input::get('id'));

        $detalleProducto->id_detalle = Input::get('id_detalle', $detalleProducto->id_detalle);
        $detalleProducto->id_producto = Input::get('id_producto', $detalleProducto->id_producto);

        $detalleProducto->timestamps = false;
        $detalleProducto-> save();

        return $detalleProducto;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}