<?php
class PagoCompraController extends BaseController {

  /*
  * Description: Mostrar la lista de todos los pagos compras registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarPagosCompras() { 
    try {

      $pagosCompras = PagoCompra::all();
      return $pagosCompras;
    } catch(Exception $e) {

      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

    /*
  * Description: Insertar nuevo pago compra en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarPagoCompra() {
    try {

      $pagoCompra = new PagoCompra;

      if (Input::has('fecha_pago_compra') && Input::has('monto_pago_compra')) {
        
        $pagoCompra->monto_pago_compra = Input::get('monto_pago_compra');
        $pagoCompra->fecha_pago_compra = Input::get('fecha_pago_compra');

        $pagoCompra-> timestamps = false;
        $pagoCompra->save();

        return $pagoCompra;

      } else {
      
        $mensaje = 'Los campos \'fecha pago compra\' y \'monto pago compra\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de un pago compra especifico
  * Method: POST
  * Return: JSON
  */
  public function mostrarPagoCompra() {
  
    try {

      if (Input::has('id')) {
      
        $pagoCompra = PagoCompra::findOrFail(Input::get('id'));
        return $pagoCompra;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
     
  /*
  * Description: Eliminar un pago compra de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarPagoCompra() {
    
    try {
    
      if (Input::has('id')) {
    
        $pagoCompra = PagoCompra::findOrFail(Input::get('id'));

        $pagoCompra->delete();
      
        $mensaje = 'Pago Compra con ID: '.Input::get('id').' eliminado';
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
  * Description: Modificar un pago compra de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarPagoCompra() {
    try {

      if (Input::has('id')) {
    
        $pagoCompra = PagoCompra::findOrFail(Input::get('id'));

        $pagoCompra->monto_pago_compra = Input::get('monto_pago_compra', $pagoCompra->monto_pago_compra);
        $pagoCompra->fecha_pago_compra = Input::get('fecha_pago_compra', $pagoCompra->fecha_pago_compra);

        $pagoCompra->timestamps = false;
        $pagoCompra-> save();

        return $pagoCompra;

      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}
