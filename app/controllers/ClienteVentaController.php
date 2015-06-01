<?php
class ClienteVentaController extends BaseController {

  /*
  * Description: Mostrar la lista de todos los clientes ventas registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarClientesVentas() { 
    try {
    
      $clientesVentas = ClienteVenta::all();
      return $clientesVentas;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nuevo cliente venta en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarClienteVenta() {
    try {

      $clienteVenta = new ClienteVenta;

      if (Input::has('id_cliente') && Input::has('id_venta') ) {

        $cliente = Cliente::findOrFail(Input::get('id_cliente'));
        $clienteVenta->id_cliente = $cliente->id;
        
        $venta = Venta::findOrFail(Input::get('id_venta'));
        $clienteVenta->id_venta = $venta->id;

        $clienteVenta-> timestamps = false;
        $clienteVenta->save();

        return $clienteVenta;

      } else {
      
        $mensaje = 'Los campos \'id cliente\' y \'id venta\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de un cliente venta especifico
  * Method: POST
  * Return: JSON
  */
  public function mostrarClienteVenta() {
  
    try {
    
      if (Input::has('id')) {
      
        $clienteVenta = ClienteVenta::findOrFail(Input::get('id'));
        return $clienteVenta;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar un cliente venta de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarClienteVenta() {
    
    try {
    
      if (Input::has('id')) {
    
        $clienteVenta = ClienteVenta::findOrFail(Input::get('id'));

        $clienteVenta->delete();
      
        $mensaje = 'Cliente venta con ID: '.Input::get('id').' eliminado';
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
  * Description: Modificar un cliente venta de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarClienteVenta() {
    try {

      if (Input::has('id')) {
    
        $clienteVenta = ClienteVenta::findOrFail(Input::get('id'));
        $clienteVenta->id_cliente = Input::get('id_cliente', $clienteVenta->id_cliente);
        $clienteVenta->id_venta = Input::get('id_venta', $clienteVenta->id_venta);

        $clienteVenta->timestamps = false;
        $clienteVenta-> save();

        return $clienteVenta;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}