<?php
class CompraController extends BaseController {

  /*
  * Description: Mostrar la lista de todas las compras registradas
  * Method: GET
  * Return: JSON
  */
  public function mostrarCompras() { 
    try {
    
      $compras = Compra::all();
      return $compras;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nueva compra en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarCompra() {
    try {

      $compra = new Compra;

      if (Input::has('num_factura_compra') && Input::has('fecha_recepcion_compra') 
          && Input::has('fecha_vencimiento_compra') && Input::has('monto_compra') &&
         Input::has('estado_compra') && Input::has('id_usuario') && Input::has('id_usuario') ) {
        
        $compra->num_factura_compra = Input::get('num_factura_compra');
        $compra->fecha_recepcion_compra = Input::get('fecha_recepcion_compra');
        $compra->fecha_vencimiento_compra = Input::get('fecha_vencimiento_compra');
        $compra->monto_compra = Input::get('monto_compra');
        $compra->estado_compra = Input::get('estado_compra');

        $usuario = Usuario::findOrFail(Input::get('id_usuario'));
        $compra->id_usuario = $usuario->id;

        $sucursal = Sucursal::findOrFail(Input::get('id_sucursal'));
        $compra->id_sucursal = $sucursal->id;

        $compra-> timestamps = false;
        $compra->save();
        
        return $compra;

      } else {
      
        $mensaje = 'Los campos \'numero factura\', \'fecha recepcion\', \'fecha vencimiento\', \'monto\', '.
                '\'id usuario\', \'id sucursal\' y \'estado\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de una compra especifica
  * Method: POST
  * Return: JSON
  */
  public function mostrarCompra() {
  
    try {
    
      if (Input::has('id')) {
      
        $compra = Compra::findOrFail(Input::get('id'));
        return $compra;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar una compra de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarCompra() {
    
    try {
    
      if (Input::has('id')) {
    
        $compra = Compra::findOrFail(Input::get('id'));

        $compra->delete();
      
        $mensaje = 'Compra con ID: '.Input::get('id').' eliminada';
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
  * Description: Modificar una compra de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarCompra() {
    try {

      if (Input::has('id')) {
    
        $compra = Compra::findOrFail(Input::get('id'));

        $compra->num_factura_compra = Input::get('num_factura_compra', $compra->num_factura_compra);
        $compra->fecha_recepcion_compra = Input::get('fecha_recepcion_compra', $compra->fecha_recepcion_compra);
        $compra->fecha_vencimiento_compra = Input::get('fecha_vencimiento_compra', $compra->fecha_vencimiento_compra);
        $compra->monto_compra = Input::get('monto_compra', $compra->monto_compra);
        $compra->estado_compra = Input::get('estado_compra', $compra->estado_compra);
        $compra->id_usuario = Input::get('id_usuario', $compra->id_usuario);
        $compra->id_sucursal = Input::get('id_sucursal', $compra->id_sucursal);

        $compra->timestamps = false;
        $compra-> save();

        return $compra;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}