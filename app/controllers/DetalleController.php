<?php
class DetalleController extends BaseController{
  
  /*
  * Description: Mostrar la lista de todos los detalles registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarDetalles() { 
    try {
    
      $detalles = Detalles::all();
      return $detalles;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
   
  /*
  * Description: Insertar nuevo detalle en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarDetalle() {
    try {

      $detalle = new Detalle;

      if (Input::has('fecha_vencimiento') && Input::has('fecha_elaboracion') ) {
        
        $detalle->fecha_venc_detalle = Input::get('fecha_vencimiento');
        $detalle->fecha_elab_detalle = Input::get('fecha_elaboracion');

        $detalle-> timestamps = false;
        $detalle->save();
        
        return $detalle;

      } else {
      
        $mensaje = 'Los campos \'fecha vencimiento\' y \'fecha elaboracion\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de un detalle especifico
  * Method: POST
  * Return: JSON
  */
  public function mostrarDetalle() {

    try {

      if (Input::has('id')) {
      
        $detalle = Detalle::findOrFail(Input::get('id'));
        return $detalle;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
    
  /*
  * Description: Eliminar un detalle de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarDetalle() {
    
    try {
    
      if (Input::has('id')) {
    
        $detalle = Detalle::findOrFail(Input::get('id'));

        $detalle->delete();
      
        $mensaje = 'Detalle con ID: '.Input::get('id').' eliminado';
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
  * Description: Modificar un detalle de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarDetalle() {
    try {
    
      if (Input::has('id')) {

        $detalle = Detalle::findOrFail(Input::get('id'));

        $detalle->fecha_venc_detalle = Input::get('fecha_vencimiento', $detalle->fecha_venc_detalle);
        $detalle->fecha_elab_detalle = Input::get('fecha_elaboracion', $detalle->fecha_elab_detalle);

        $detalle->timestamps = false;
        $detalle-> save();

        return $detalle;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}