<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Producto;
use papusclub\Models\PrecioProducto;
use papusclub\Models\Configuracion;
use papusclub\Http\Requests\StoreProductoRequest;
use papusclub\Http\Requests\EditProductoRequest;
use papusclub\Http\Requests\StoreConfiguracionRequest;


class ProductoController extends Controller
{
    //Muestra la lista de productos que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar un nuevo producto
    public function index() {
		$productos = Producto::all();        
        return view('admin-general.producto.index', compact('productos'));
	}	

	public function create()
    {
        $tipo_productos = Configuracion::where('grupo','=','6')->get();
    	return view('admin-general.producto.newProducto', compact('tipo_productos'));
    }
    
    public function store(StoreProductoRequest $request)
    {    	
    	$input = $request->all();
        $producto = new Producto();
    	$producto->nombre = $input['nombre'];
		$producto->descripcion = $input['descripcion'];
		$producto->estado = 1;
		$producto->tipo_producto = $input['tipo_producto'];		
    	
        $producto->save();	    
        
        $precio = new PrecioProducto();
        $precio->producto_id = $producto->id;
        $precio->precio = $input['precio'];
        $precio->estado = 1;
        $precio->save();
        return redirect('producto/index')->with('stored', 'Se registró el producto correctamente.');
    }
	
	//Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        $producto = Producto::find($id);
        
        $precio = PrecioProducto::where('producto_id', '=', $id)
                                ->where('estado', '=', 1)->first();

        if ($precio==null){
            $precio = new PrecioProducto();
            $precio->producto_id = $producto->id;
            $precio->precio = 0;
            $precio->estado = 1;
            $precio->save();
        }

        $tipo_productos = Configuracion::where('grupo','=','6')->get();

        return view('admin-general.producto.editProducto', compact('producto'), compact('tipo_productos'));
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(StoreProductoRequest $request, $id)
    {
        $input = $request->all();
        $producto = Producto::find($id);

        $producto->nombre = $input['nombre'];
        $producto->descripcion = $input['descripcion'];
        $producto->estado = $input['estado'];
        $producto->tipo_producto = $input['tipo_producto'];           
        $producto->save();

        $precioAnt = PrecioProducto::where('producto_id', '=', $id)
                                    ->where('estado', '=', 1)->first();
        $precioAnt->estado = 0;
        $precioAnt->save();
        $precioAnt->delete();

        $precioNuevo = new PrecioProducto();
        $precioNuevo->producto_id = $producto->id;
        $precioNuevo->precio = $input['precio'];
        $precioNuevo->estado = 1;
        $precioNuevo->save();
        
        return redirect('producto/index')->with('stored', 'Se actualizó el producto correctamente.');

    }

    //Se cambia el estado de un producto a inactiva
    public function destroy($id)    
    {
        $producto = Producto::find($id);
        
        $producto->precioproducto->first()->estado = 0;
        $producto->precioproducto->first()->delete();
        $producto->delete();
        return back();
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        $producto = Producto::find($id);        
        return view('admin-general.producto.detailProducto', compact('producto'));
    }

    public function storeTipoProducto(StoreConfiguracionRequest $request)
    {       
        $input = $request->all();
        $configuracion = new Configuracion();
        $configuracion->valor = $input['valor'];
        $configuracion->grupo = 6;
        $configuracion->descripcion = 'Tipo de Producto';
               
        $configuracion->save();      
        
        return redirect('producto/new');
    }

}
