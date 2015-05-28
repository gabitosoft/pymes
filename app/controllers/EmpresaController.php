<?php
class EmpresaController extends BaseController{

  /*
  * Description: Mostrar la lista de todas las empresas registradas
  * Method: GET
  * Return: JSON
  */
  public function mostrarEmpresas() { 
    try {
    
      $empresas = Empresa::all();
      return $empresas;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
    
  /*
  * Description: Insertar nueva empresa en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarEmpresa() {
    try {
    
      $empresa = new Empresa;

      if (Input::has('nombre') && Input::has('telefono') && Input::has('direccion') ) {
        
        $empresa->nombre_empresa = Input::get('nombre');
        $empresa->telefono_empresa = Input::get('telefono');
        $empresa->direccion_empresa = Input::get('direccion');

        $empresa-> timestamps = false;
        $empresa->save();
        
        return $empresa;

      } else {
      
        $mensaje = 'Los campos \'nombre\', \'direccion\' y \'telefono\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de una empresa especifica
  * Method: POST
  * Return: JSON
  */
  public function mostrarEmpresa() {

    try {
    
      if (Input::has('id')) {
      
        $empresa = Empresa::findOrFail(Input::get('id'));
        return $empresa;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar una empresa de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarEmpresa() {

    try {
    
      if (Input::has('id')) {
    
        $empresa = Empresa::findOrFail(Input::get('id'));

        $empresa->delete();
      
        $mensaje = 'Empresa con ID: '.Input::get('id').' eliminada';
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
  * Description: Modificar una empresa de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarEmpresa() {
    try {
    
      if (Input::has('id')) {
    
        $empresa = Empresa::findOrFail(Input::get('id'));

        $empresa->nombre_empresa = Input::get('nombre', $empresa->nombre_empresa);
        $empresa->direccion_empresa = Input::get('direccion', $empresa->direccion_empresa);
        $empresa->telefono_empresa = Input::get('telefono', $empresa->telefono_empresa);

        $empresa->timestamps = false;
        $empresa-> save();

        return $empresa;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}
