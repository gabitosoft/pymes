<?php
class TipoUsuarioController extends BaseController {
  
  /*
  * Description: Mostrar la lista de todos los tipos de usuarios registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarTiposUsuarios() { 
   
    $tiposUsuarios = TipoUsuario::all();
    return $tiposUsuarios;
  }
  
  /*
  * Description: Insertar nuevo tipo de usuario en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarTipoUsuario() {
    
    try {
    
      $tipoUsuario = new TipoUsuario;
      
      if (Input::has('tipo_usuario')) {
        
        $tipoUsuario->tipo_usuario = Input::get('tipo_usuario');

        $tipoUsuario-> timestamps = false;
        $tipoUsuario->save();
        
        return $tipoUsuario;

      } else {
      
        $mensaje = 'El campo \'tipo_usuario\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
   
  /*
  * Description: Mostrar informacion de un tipo de usuario especifico
  * Method: GET
  * Return: JSON
  */
  public function mostrarTipoUsuario() {
  
    try {
    
      if (Input::has('id')) {
      
        $tipo_usuario = TipoUsuario::findOrFail(Input::get('id'));
        return $tipo_usuario;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Eliminar un tipo de usuario de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarTipoUsuario() {
    
    try {
    
      if (Input::has('id')) {
    
        $tipoUsuario = TipoUsuario::findOrFail(Input::get('id'));

        $tipoUsuario->delete();
      
        $mensaje = 'TipoUsuario con ID: '.Input::get('id').' eliminado';
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
  public function modificarTipoUsuario() {

    try {

      if (Input::has('id')) {

        $tipoUsuario = TipoUsuario::findOrFail(Input::get('id'));
        $tipoUsuario->tipo_usuario = Input::get('tipo_usuario', $tipoUsuario->tipo_usuario);
        $tipoUsuario->timestamps = false;
        $tipoUsuario-> save();

        return $tipoUsuario;
      } else {

        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {

      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}