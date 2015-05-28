<?php
class ClienteController extends BaseController{

  /*
  * Description: Mostrar la lista de todos los clientes registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarClientes() { 

    try {

      $cliente = Cliente::all();
      return $cliente;

    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nuevo cliente en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarCliente() {

    try {
      
      $cliente = new Cliente;

      if (Input::has('nombres') && Input::has('ci') ) {
        
        $cliente->nombre_cliente = Input::get('nombres');
        $cliente->ci_cliente = Input::get('ci');

        $cliente->timestamps=false;
        $cliente->save();

        return $cliente;

      } else {
      
        $mensaje = 'Los campos \'nombres\' y \'ci\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
    /*
  * Description: Mostrar informacion de un cliente especifico
  * Method: POST
  * Return: JSON
  */
  public function mostrarCliente() {
  
    try {
    
      if (Input::has('id')) {
      
        $cliente = Cliente::findOrFail(Input::get('id'));
        return $cliente;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar un cliente de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarCliente() {
    
    try {
    
      if (Input::has('id')) {
    
        $cliente = Cliente::findOrFail(Input::get('id'));

        $cliente->delete();
      
        $mensaje = 'Cliente con ID: '.Input::get('id').' eliminado';
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
  * Description: Modificar un cliente de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarCliente() {
    try {
    
      if (Input::has('id')) {
    
        $cliente = Usuario::findOrFail(Input::get('id'));
        $cliente->nombre_cliente = Input::get('nombres', $cliente->nombre_cliente);
        $cliente->ci_cliente = Input::get('ci', $cliente->ci_cliente);

        $cliente->timestamps = false;
        $cliente-> save();

        return $cliente;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}