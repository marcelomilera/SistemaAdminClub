<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Producto;
use papusclub\Models\PrecioProducto;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Models\ProductoxFacturacion;
use papusclub\Models\Persona;
use papusclub\Models\Socio;
use papusclub\Http\Requests\StoreFacturacionRequest;
use papusclub\Http\Requests\EditFacturacionRequest;
use papusclub\Http\Requests\StoreProductoxFacturacionRequest;

class VentaProductoController extends Controller
{
    //Muestra la lista de productos que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar un nuevo producto
    public function index() {
		$facturas = Facturacion::all();        
        return view('admin-general.venta-producto.index', compact('facturas'));
	}	

	public function create()
    {
        $factura = new Facturacion();        
                
        $estados = Configuracion::where('grupo','=','7')->get();                                
        $tipo_pagos = Configuracion::where('grupo','=','8')->get();
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $personas = Persona::all();
    	return view('admin-general.venta-producto.newVentaProducto', compact('factura','tipo_pagos','tipo_comprobantes','estados','personas'));
    }
    
    public function store(StoreFacturacionRequest $request)
    {    	
    	$input = $request->all();
        $persona = Persona::find($input['persona_id']);
        if ($persona==null){
            $errorPersona = 'ID de persona ingresado no es válido';
            return back()->withErrors($errorPersona);
        }
        $factura = new Facturacion();
    	$factura->persona_id = $input['persona_id'];
		$factura->tipo_pago = $input['tipo_pago'];
        $factura->tipo_comprobante = $input['tipo_comprobante'];
		$factura->estado = $input['estado'];		
    	
        $factura->save();	    
        
        return view('admin-general.venta-producto.addVentaProducto', compact('factura'));
    }	   

    public function createVentaProducto($id)
    {       
        $factura = Facturacion::find($id);
        $productos = Producto::all();

        return view('admin-general.venta-producto.add', compact('factura','productos'));
    }      

    public function storeVentaProducto(StoreProductoxFacturacionRequest $request)
    {   $cantidad = 0;
        $subtotal = 0;
        $input = $request->all();
        $producto = Producto::find($input['producto_id']);
        if ($producto==null){
            $errorProducto = 'ID de producto ingresado no es válido';
            return back()->withErrors($errorProducto);
        }

        $productoxfacturacion = new ProductoxFacturacion();
        $productoxfacturacion = ProductoxFacturacion::where('facturacion_id','=',$input['facturacion_id'])
                                                    ->where('producto_id','=',$input['producto_id'])
                                                    ->first();
        if ($productoxfacturacion==null){
            $productoxfacturacion = new ProductoxFacturacion();                
        }        
        else{
            $cantidad = $productoxfacturacion->cantidad;
            $subtotal = $productoxfacturacion->subtotal;
        }
        $productoxfacturacion->producto_id = $input['producto_id'];
        $productoxfacturacion->facturacion_id = $input['facturacion_id'];
        $productoxfacturacion->cantidad = $input['cantidad'] + $cantidad;  
        $productoxfacturacion->subtotal = $productoxfacturacion->producto->precioproducto->first()['precio'] * $input['cantidad'] + $subtotal;
        $productoxfacturacion->save();

        $productoxfacturacion->facturacion->total = $productoxfacturacion->facturacion->total + $productoxfacturacion->subtotal - $subtotal;
        $productoxfacturacion->facturacion->save();
        $factura = Facturacion::find($input['facturacion_id']);

        return view('admin-general.venta-producto.addVentaProducto', compact('factura'));
    }      

	//Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        $factura = Facturacion::find($id);
        $estados = Configuracion::where('grupo','=','7')->get();
        return view('admin-general.venta-producto.editVentaProducto', compact('factura','estados'));
    }

     public function editProducto($id)
    {        
        $producto = ProductoxFacturacion::find($id);
        return view('admin-general.venta-producto.editVentaProductoDetail', compact('producto'));
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(EditFacturacionRequest $request, $id)
    {
        $input = $request->all();
        $factura = Facturacion::find($id);
        
        $factura->estado = $input['estado'];        
        $factura->save();        
        
        return redirect('venta-producto/index')->with('stored', 'Se actualizó el producto correctamente.');

    }

    public function updateProducto(StoreProductoxFacturacionRequest $request, $id)
    {
        $input = $request->all();
        $producto = Producto::find($input['producto_id']);
        if ($producto==null){
            $errorProducto = 'ID de producto ingresado no es válido';
            return back()->withErrors($errorProducto);
        }

        $productoxfacturacion = ProductoxFacturacion::find($id);
        $productoxfacturacion->facturacion->total = $productoxfacturacion->facturacion->total - $productoxfacturacion->subtotal;

        $productoxfacturacion->producto_id = $input['producto_id'];
        $productoxfacturacion->facturacion_id = $input['facturacion_id'];
        $productoxfacturacion->cantidad = $input['cantidad'];  
        $productoxfacturacion->subtotal = $productoxfacturacion->producto->precioproducto->first()['precio'] * $input['cantidad'];
        $productoxfacturacion->save();

        $productoxfacturacion->facturacion->total = $productoxfacturacion->facturacion->total + $productoxfacturacion->subtotal;
        $productoxfacturacion->facturacion->save();
        $factura = Facturacion::find($input['facturacion_id']);

        return view('admin-general.venta-producto.addVentaProducto', compact('factura'));

    }

    //Se cambia el estado de un producto a inactiva
    public function destroy($id)    
    {
        $factura = Facturacion::find($id);
        
        foreach ($factura->productoxfacturacion as $productoxfacturacion) {
            $productoxfacturacion->delete();
        }       
        $factura->delete();
        return redirect('venta-producto/index');
    }

    public function destroyProducto($id)    
    {
        $producto = ProductoxFacturacion::find($id);
        
        $factura = Facturacion::find($producto->facturacion_id);
        $factura->total = $factura->total - $producto->subtotal;
        $factura->save();
        $producto->delete();

        return view('admin-general.venta-producto.addVentaProducto', compact('factura'));
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        $factura = Facturacion::find($id);
        return view('admin-general.venta-producto.detailVentaProducto', compact('factura'));
    }

    public function back($id)
    {
        $factura = Facturacion::find($id);
        return view('admin-general.venta-producto.addVentaProducto', compact('factura'));
    }

}
