<?php
class SucursalController extends BaseController{

  /*
  * Description: Mostrar la lista de todas los sucursales registradas
  * Method: GET
  * Return: JSON
  */
  public function mostrarSucursales() { 
    try {
    
      $sucursales = Sucursal::all();
      return $sucursales;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nueva sucursal en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarSucursal() {
    try {

      $sucursal = new Sucursal;

      if (Input::has('direccion_sucursal') && Input::has('numero_sucursal') ) {
        
        $sucursal->direccion_sucursal = Input::get('direccion_sucursal');
        $sucursal->numero_sucursal = Input::get('numero_sucursal');
        $tipo = TipoSucursal::findOrFail(Input::get('id_tipo_sucursal'));
        $sucursal->id_tipo_sucursal = $tipo->id;
        
        //Columnas opcionales, si no existe dato, seran 0
        $sucursal->telefono_sucursal = Input::get('telefono_sucursal', 0);

        $sucursal-> timestamps = false;
        $sucursal->save();
        
        return $sucursal;

      } else {
      
        $mensaje = 'Los campos \'direccion sucursal\' y \'numero sucursal\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de una sucursal especifica
  * Method: POST
  * Return: JSON
  */
  public function mostrarSucursal() {
  
    try {
    
      if (Input::has('id')) {
      
        $sucursal = Sucursal::findOrFail(Input::get('id'));
        return $sucursal;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar una sucursal de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarSucursal() {
    
    try {
    
      if (Input::has('id')) {
    
        $sucursal = Sucursal::findOrFail(Input::get('id'));

        $sucursal->delete();
      
        $mensaje = 'Sucursal con ID: '.Input::get('id').' eliminada';
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
  * Description: Modificar una sucursal de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarSucursal() {
    try {

      if (Input::has('id')) {
    
        $sucursal = Sucursal::findOrFail(Input::get('id'));

        $sucursal->direccion_sucursal = Input::get('direccion_sucursal', $sucursal->direccion_sucursal);
        $sucursal->numero_sucursal = Input::get('numero_sucursal', $sucursal->numero_sucursal);
        $sucursal->telefono_sucursal = Input::get('telefono_sucursal', $sucursal->telefono_sucursal);
        $sucursal->id_tipo_sucursal = Input::get('id_tipo_sucursal', $sucursal->id_tipo_sucursal);

        $sucursal->timestamps = false;
        $sucursal-> save();

        return $sucursal;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}


