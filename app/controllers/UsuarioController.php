<?php
class UsuarioController extends BaseController{
public function mostrarUsuario()
 { 
   $usuario = Usuario::all();
    return $usuario;
 }
    
    public function guardarUsuario()
    {
        $usuario = new Usuario;
        $usuario->nombre_usuarios ='romero';
        $usuario-> timestamps = false;
        $usuario ->save();
    }
    
    public function borrarUsuario()
    {
        $usuario = Usuario::find(4);
        $usuario->delete();
        
    }
    public function modificarUsuario()
    {
        $usuario = Usuario:: find(2);
        $usuario->nombre_usuarios = 'gabriel';
        $usuario->timestamps = false;
        $usuario-> save();
    
    }
    
        
    
}