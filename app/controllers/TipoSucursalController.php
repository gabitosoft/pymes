<?php
class TipoSucursalController extends BaseController{

  /*
  * Description: Mostrar la lista de todos los tipos sucursales registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarTipoSucursales() { 
    try {
    
      $tipoSucursales = Usuario::all();
      return $tipoSucursales;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nuevo tipo sucursal en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarTipoSucursal() {
    try {

      $tipoSucursal = new TipoSucursal;

      if (Input::has('nombre_tipo_sucursal') ) {
        
        $tipoSucursal->nombre_tipo_sucursal = Input::get('nombre_tipo_sucursal');

        $tipoSucursal-> timestamps = false;
        $tipoSucursal->save();
        
        return $tipoSucursal;

      } else {
      
        $mensaje = 'El campo \'nombre tipo sucursal\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Mostrar informacion de un tipo de sucursal especifico
  * Method: POST
  * Return: JSON
  */
  public function mostrarTipoSucursal() {
  
    try {
    
      if (Input::has('id')) {
      
        $tipoSucursal = TipoSucursal::findOrFail(Input::get('id'));
        return $tipoSucursal;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Eliminar un tipo de sucursal de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarTipoSucursal() {

    try {
    
      if (Input::has('id')) {
    
        $tipoSucursal = TipoSucursal::findOrFail(Input::get('id'));

        $tipoSucursal->delete();
      
        $mensaje = 'Tipo Sucursal con ID: '.Input::get('id').' eliminado';
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
  * Description: Modificar un tipo de sucursal de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarTipoSucursal() {
    try {

      if (Input::has('id')) {
    
        $tipoSucursal = TipoSucursal::findOrFail(Input::get('id'));

        $tipoSucursal->nombre_tipo_sucursal = Input::get('nombre_tipo_sucursal', $tipoSucursal->nombre_tipo_sucursal);

        $tipoSucursal->timestamps = false;
        $tipoSucursal-> save();

        return $tipoSucursal;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}