<?php
class VentaController extends BaseController {

  /*
  * Description: Mostrar la lista de todos las ventas registradas
  * Method: GET
  * Return: JSON
  */
  public function mostrarVentas() { 
    try {
    
      $ventas = Venta::all();
      return $ventas;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Insertar nueva venta en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarVenta() {
    try {
    
      $venta = new Venta;

      if (Input::has('nombres') && Input::has('usuario') && 
              Input::has('contrasena') && Input::has('id_tipo_usuario') && Input::has('apellidos')) {
        
        $venta->fecha_venta = Input::get('fecha');
        $venta->monto_venta = Input::get('monto');
        $usuario = Usuario::findOrFail(Input::get('id_usuario'));
        $venta->id_usuario = $usuario->id;

        $venta->timestamps = false;
        $venta->save();
        
        return $venta;

      } else {
      
        $mensaje = 'Los campos \'fecha venta\' y \'monto venta\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de un usuario especifico
  * Method: GET
  * Return: JSON
  */
  public function mostrarVenta() {
  
    try {
    
      if (Input::has('id')) {
      
        $venta = Venta::findOrFail(Input::get('id'));
        return $venta;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar un usuario de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarVenta() {
    
    try {
    
      if (Input::has('id')) {
    
        $venta = Venta::findOrFail(Input::get('id'));

        $venta->delete();
      
        $mensaje = 'Venta con ID: '.Input::get('id').' eliminada';
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
  * Description: Modificar un usuario de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarVenta() {
    try {
    
      if (Input::has('id')) {
    
        $venta = Venta::findOrFail(Input::get('id'));

        $venta->fecha_venta = Input::get('fecha', $venta->fecha_venta);
        $venta->monto_venta = Input::get('monto', $venta->monto_venta);

        $venta->id_usuario = Input::get('usuario', $venta->id_usuario);
        $venta->timestamps = false;

        $venta-> save();

        return $venta;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}