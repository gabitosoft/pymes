<?php
class DetalleCompraController extends BaseController {

  /*
  * Description: Mostrar la lista de todos los detalles compras registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarDetallesCompras() { 
    try {
    
      $detalleCompra = DetalleCompra::all();
      return $detalleCompra;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nuevo detalle compra en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarDetalleCompra() {
    try {

      $detalleCompra = new DetalleCompra;

      if (Input::has('unidad_compra') && Input::has('id_compra') ) {
        
        $detalleCompra->unidad_compra = Input::get('unidad_compra');
        $compra = Compra::findOrFail(Input::get('id_compra'));
        $detalleCompra->id_compra = $compra->id;

        $producto = Producto::findOrFail(Input::get('id_producto'));
        $detalleCompra->id_producto = $producto->id;

        $detalleCompra-> timestamps = false;
        $detalleCompra->save();
        
        return $detalleCompra;

      } else {
      
        $mensaje = 'Los campos \'unidad compra\', \'id producto\' y \'id compra\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de un detalle compra especifico
  * Method: POST
  * Return: JSON
  */
  public function mostrarDetalleCompra() {
  
    try {
    
      if (Input::has('id')) {
      
        $detalleCompra = DetalleCompra::findOrFail(Input::get('id'));
        return $detalleCompra;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar un detalle compra de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarDetalleCompra() {
    
    try {
    
      if (Input::has('id')) {
    
        $detalleCompra = DetalleCompra::findOrFail(Input::get('id'));

        $detalleCompra->delete();
      
        $mensaje = 'Detalle Compra con ID: '.Input::get('id').' eliminado';
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
  * Description: Modificar un detalle compra de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarDetalleCompra() {
    try {

      if (Input::has('id')) {

        $detalleCompra = DetalleCompra::findOrFail(Input::get('id'));

        $detalleCompra->unidad_compra = Input::get('unidad_compra', $detalleCompra->unidad_compra);
        $detalleCompra->id_compra = Input::get('id_compra', $detalleCompra->id_compra);
        $detalleCompra->id_producto = Input::get('id_producto', $detalleCompra->id_producto);

        $detalleCompra->timestamps = false;
        $detalleCompra-> save();

        return $detalleCompra;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}