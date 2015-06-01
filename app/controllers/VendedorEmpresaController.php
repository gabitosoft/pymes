<?php
class VendedorEmpresaController extends BaseController {

  /*
  * Description: Mostrar la lista de todos los vendedores emrpesas registrados
  * Method: GET
  * Return: JSON
  */
  public function mostrarVendedoresEmpresas() { 
    try {
    
      $vendedoresEmpresas = VendedorEmpresa::all();
      return $vendedoresEmpresas;
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Insertar nuevo vendedor empresa en BD
  * Method: POST
  * Return: JSON
  */
  public function guardarVendedorEmpresa() {
    try {

      $vendedorEmpresa = new VendedorEmpresa;

      if (Input::has('nombre_vendedor') && Input::has('id_empresa') ) {
        
        $vendedorEmpresa->nombre_vendedor = Input::get('nombre_vendedor');
        $empresa = Empresa::findOrFail(Input::get('id_empresa'));
        $vendedorEmpresa->id_empresa = $empresa->id;

        $vendedorEmpresa-> timestamps = false;
        $vendedorEmpresa->save();
        
        return $vendedorEmpresa;
      } else {
      
        $mensaje = 'Los campos \'nombre vendedor\' y \'id empresa\' son requeridos.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 500);
      }
    } catch(Exception $e) {
      
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
  
  /*
  * Description: Mostrar informacion de un vendedor empresa especifico
  * Method: POST
  * Return: JSON
  */
  public function mostrarVendedorEmpresa() {
  
    try {
    
      if (Input::has('id')) {
      
        $vendedorEmpresa = VendedorEmpresa::findOrFail(Input::get('id'));
        return $vendedorEmpresa;
      }
    } catch(Exception $e) {
    
      return Utils::enviarRespuesta('Exception', $e->getMessage(), 500);
    }
  }

  /*
  * Description: Eliminar un vendedor empresa de BD
  * Method: DELETE
  * Return: JSON
  */
  public function borrarVendedorEmpresa() {

    try {

      if (Input::has('id')) {
    
        $vendedorEmpresa = VendedorEmpresa::findOrFail(Input::get('id'));

        $vendedorEmpresa->delete();
      
        $mensaje = 'Vendedor empresa con ID: '.Input::get('id').' eliminado';
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
  * Description: Modificar un vendedor empresa de BD
  * Method: PUT
  * Return: JSON
  */
  public function modificarVendedorEmpresa() {
    try {

      if (Input::has('id')) {
    
        $vendedorEmpresa = VendedorEmpresa::findOrFail(Input::get('id'));

        $vendedorEmpresa->nombre_vendedor = Input::get('nombre_vendedor', $vendedorEmpresa->nombre_vendedor);
        $vendedorEmpresa->id_empresa = Input::get('id_empresa', $vendedorEmpresa->id_empresa);

        $vendedorEmpresa->timestamps = false;
        $vendedorEmpresa-> save();

        return $vendedorEmpresa;
      } else {
      
        $mensaje = 'El campo \'id\' es requerido.';
        return Utils::enviarRespuesta('Datos incompletos', $mensaje, 406);
      }
    } catch (Exception $e) {
    
      return Utils::enviarRespuesta('Error', $e->getMessage(), 500);
    }
  }
}