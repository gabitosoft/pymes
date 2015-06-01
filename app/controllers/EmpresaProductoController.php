<?php
class EmpresaProductoController extends BaseController {

  /*
  * Description: Mostrar la lista de todas las empresas productos registradas
  * Method: GET
  * Return: JSON
  */
  public function mostrarEmpresasProductos() { 
    try {
    
      $empresaProducto = EmpresaProducto::all();
      return $empresaProducto;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Insertar nueva empresa producto en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarEmpresaProducto() {
    try {

      $empresaProducto = new EmpresaProducto;

      if (Input::has('id_empresa') && Input::has('id_producto') ) {

        $producto = Producto::findOrFail(Input::get('id_producto'));
        $empresaProducto->id_producto = $producto->id;

        $empresa = Empresa::findOrFail(Input::get('id_empresa'));
        $empresaProducto->id_empresa = $empresa->id;

        $empresaProducto-> timestamps = false;
        $empresaProducto->save();
        
        return $empresaProducto;

      } else {
      
        $mensaje = 'Los campos \'id empresa\' y \'id producto\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de una empresa producto especifica
  * Method: POST
  * Return: JSON
  */
  public function mostrarEmpresaProducto() {
  
    try {
    
      if (Input::has('id')) {
      
        $empresaProducto = EmpresaProducto::findOrFail(Input::get('id'));
        return $empresaProducto;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar una empresa producto de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarEmpresaProducto() {
    
    try {
    
      if (Input::has('id')) {
    
        $empresaProducto = EmpresaProducto::findOrFail(Input::get('id'));

        $empresaProducto->delete();
      
        $mensaje = 'Empres Producto con ID: '.Input::get('id').' eliminada';
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
  * Description: Modificar una empresa producto de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarEmpresaProducto() {
    try {

      if (Input::has('id')) {
    
        $empresaProducto = EmpresaProducto::findOrFail(Input::get('id'));
        $empresaProducto->id_empresa = Input::get('id_empresa', $empresaProducto->id_empresa);
        $empresaProducto->id_producto = Input::get('id_producto', $empresaProducto->id_producto);

        $empresaProducto->timestamps = false;
        $empresaProducto-> save();

        return $empresaProducto;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}