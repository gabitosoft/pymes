<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.

*/
Route::get('/', 'Bienvenido a PyMES API :D');
//routes empresas
Route::get('empresas', 'EmpresaController@mostrarEmpresas');
Route::post('empresas', 'EmpresaController@guardarEmpresa');
Route::delete('empresas', 'EmpresaController@borrarEmpresa');
Route::put('empresas', 'EmpresaController@modificarEmpresa');

//routes empresas_productos
Route::get('empresas_productos', 'EmpresaProductoController@mostrarEmpresasProductos');
Route::post('empresas_productos', 'EmpresaProductoController@guardarEmpresaProducto');
Route::delete('empresas_productos', 'EmpresaProductoController@borrarEmpresaProducto');
Route::put('empresas_productos', 'EmpresaProductoController@modificarEmpresaProducto');

//routes vendedores_empresas
Route::get('vendedores_empresas', 'VendedorEmpresaController@mostrarEmpresasProductos');
Route::post('vendedores_empresas', 'VendedorEmpresaController@guardarEmpresaProducto');
Route::delete('vendedores_empresas', 'VendedorEmpresaController@borrarEmpresaProducto');
Route::put('vendedores_empresas', 'VendedorEmpresaController@modificarEmpresaProducto');

//routes clientes
Route::get('clientes', 'ClienteController@mostrarCliente');
Route::post('clientes', 'ClienteController@guardarCliente');
Route::delete('clientes', 'ClienteController@borrarCliente');
Route::put('clientes', 'ClienteController@modificarCliente');

//routes tipos_usuarios
Route:: get('tipos_usuarios', 'TipoUsuarioController@mostrarTiposUsuarios');
Route:: post('tipos_usuarios', 'TipoUsuarioController@guardarTipoUsuario');
Route:: delete('tipos_usuarios', 'TipoUsuarioController@borrarTipoUsuario');
Route:: put('tipos_usuarios', 'TipoUsuarioController@modificarTipoUsuario');

//routes usuarios
Route:: get('usuarios', 'UsuarioController@mostrarUsuarios');
Route:: post('usuario', 'UsuarioController@mostrarUsuario');
Route:: post('autenticar', 'UsuarioController@autenticarUsuario');
Route:: post('usuarios', 'UsuarioController@guardarUsuario');
Route:: delete('usuarios', 'UsuarioController@borrarUsuario');
Route:: put('usuarios', 'UsuarioController@modificarUsuario');

//routes marcas_producto
Route:: get('marcas_productos', 'MarcaProductoController@mostrarMarcaProducto');
Route:: post('marcas_productos', 'MarcaProductoController@guardarMarcaProducto');
Route:: delete('marcas_productos', 'MarcaProductoController@borrarMarcaProducto');
Route:: put('marcas_productos', 'MarcaProductoController@modificarMarcaProducto');

//routes producto
Route:: get('productos', 'ProductoController@mostrarProductos');
Route:: post('productos', 'ProductoController@mostrarProducto');
Route:: post('productos', 'ProductoController@guardarProducto');
Route:: delete('productos', 'ProductoController@borrarProducto');
Route:: put('productos', 'ProductoController@modificarProducto');

//routes tipo_sucrusal
Route:: get('tipos_sucursales', 'TipoSucursalController@mostrarTipoSucursal');
Route:: post('tipos_sucursales', 'TipoSucursalController@guardarTipoSucursal');
Route:: delete('tipos_sucursales', 'TipoSucursalController@borrarTipoSucursal');
Route:: put('tipos_sucursales', 'TipoSucursalController@modificarTipoSucursal');

//route compras
Route:: get('compras', 'CompraController@mostrarCompras');
Route:: post('compras', 'CompraController@mostrarCompra');
Route:: post('compras', 'CompraController@guardarCompra');
Route:: delete('compras', 'CompraController@borrarCompra');
Route:: put('compras', 'CompraController@modificarCompra');

//route detalles
Route:: get('detalles', 'DetalleController@mostrarDetalles');
Route:: post('detalles', 'DetalleController@mostrarDetalle');
Route:: post('detalles', 'DetalleController@guardarDetalle');
Route:: delete('detalles', 'DetalleController@borrarDetalle');
Route:: put('detalles', 'DetalleController@modificarDetalle');

//route detalles_compras
Route:: get('detalles_compras', 'DetalleCompraController@mostrarDetallesCompras');
Route:: post('detalles_compras', 'DetalleCompraController@mostrarDetalleCompra');
Route:: post('detalles_compras', 'DetalleCompraController@guardarDetalleCompra');
Route:: delete('detalles_compras', 'DetalleCompraController@borrarDetalleCompra');
Route:: put('detalles_compras', 'DetalleCompraController@modificarDetalleCompra');

//route detalles_productos
Route:: get('detalles_productos', 'DetalleProductoController@mostrarDetallesProductos');
Route:: post('detalles_productos', 'DetalleProductoController@mostrarDetalleProducto');
Route:: post('detalles_productos', 'DetalleProductoController@guardarDetalleProducto');
Route:: delete('detalles_productos', 'DetalleProductoController@borrarDetalleProducto');
Route:: put('detalles_productos', 'DetalleProductoController@modificarDetalleProducto');

//routes pagos_compras
Route:: get('pagos_compras', 'PagoCompraController@mostrarPagosCompras');
Route:: post('pagos_compras', 'PagoCompraController@mostrarPagoCompra');
Route:: post('pagos_compras', 'PagoCompraController@guardarPagoCompra');
Route:: delete('pagos_compras', 'PagoCompraController@borrarPagoCompra');
Route:: put('pagos_compras', 'PagoCompraController@modificarPagoCompra');

//routes sucursales
Route:: get('sucursales', 'SucursalController@mostrarSucursales');
Route:: post('sucursales', 'SucursalController@mostrarSucursal');
Route:: post('sucursales', 'SucursalController@guardarSucursal');
Route:: delete('sucursales', 'SucursalController@borrarSucursal');
Route:: put('sucursales', 'SucursalController@modificarSucursal');

//routes sucursales_productos
Route:: get('sucursales_productos', 'SucursalProductoController@mostrarSucursalesProductos');
Route:: post('sucursales_productos', 'SucursalProductoController@mostrarSucursalProducto');
Route:: post('sucursales_productos', 'SucursalProductoController@guardarSucursalProducto');
Route:: delete('sucursales_productos', 'SucursalProductoController@borrarSucursalProducto');
Route:: put('sucursales_productos', 'SucursalProductoController@modificarSucursalProducto');

//routes ventas
Route:: get('ventas', 'VentaController@mostrarVentas');
Route:: post('ventas', 'VentaController@mostrarVenta');
Route:: post('ventas', 'VentaController@guardarVenta');
Route:: delete('ventas', 'VentaController@borrarVenta');
Route:: put('ventas', 'VentaController@modificarVenta');

//routes ventas_productos
Route:: get('ventas_productos', 'VentaProductoController@mostrarVentas');
Route:: post('ventas_productos', 'VentaProductoController@mostrarVenta');
Route:: post('ventas_productos', 'VentaProductoController@guardarVenta');
Route:: delete('ventas_productos', 'VentaProductoController@borrarVenta');
Route:: put('ventas_productos', 'VentaProductoController@modificarVenta');

//routes clientes_ventas
Route:: get('clientes_ventas', 'ClienteVentaController@mostrarClientesVentas');
Route:: post('clientes_ventas', 'ClienteVentaController@mostrarClienteVenta');
Route:: post('clientes_ventas', 'ClienteVentaController@guardarClienteVenta');
Route:: delete('clientes_ventas', 'ClienteVentaController@borrarClienteVenta');
Route:: put('clientes_ventas', 'ClienteVentaController@modificarClienteVenta');