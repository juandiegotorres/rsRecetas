<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }

    public function index()
    {
        $usuario = auth()->user()->id;
        $recetas = Receta::where('user_id', $usuario)->paginate(10);
        $likes = auth()->user()->meGusta;
        //$recetas = auth()->user()->recetas;
        return view("recetas.index")
            ->with('recetas', $recetas)
            ->with('likes', $likes);
    }

    public function create()
    {
        //Obtener categorias con modelo de
        $categorias = CategoriaReceta::all(['id', 'nombre']);
        return view('recetas.create')->with('categorias', $categorias);
    }

    public function store(Request $request)
    {
        //Validacion
        $data = request()->validate([
            'titulo' => 'required|min:3',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image'
        ]);

        //Obtener ruta imagen y almacenar sin modelo 
        //'upload-recetas' -> carpeta donde se va a guardar
        //'public' -> carpeta donde se va a guardar la carpeta anterior

        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        //resize image con intervention image
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

        //Guardado de nueva receta
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);

        //Redireccion
        return redirect()->action('RecetaController@index');

        //Insertar en la base de datos
        // DB::table('recetas')->insert([
        //     'titulo'=> $data['titulo'],
        //     'ingredientes'=> $data['ingredientes'],
        //     'preparacion'=> $data['preparacion'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id'=> $data['categoria']   
        // ]);
        // auth()->user()->recetas()->create([
    }


    public function show(Receta $receta)
    {
        //Obtener si el usuario actual le gusta la receta y esta autenticado
        $like = (auth()->user()) ? auth()->user()->meGusta->contains($receta->id) : false;

        //Pasa la cantidad de likes a la vista
        $likes = $receta->likes->count();

        return view('recetas.show')
            ->with('receta', $receta)
            ->with('like', $like)
            ->with('likes', $likes);
    }


    public function edit(Receta $receta)
    {
        //Ejecutar policy
        $this->authorize('view', $receta);

        $categorias = CategoriaReceta::all(['id', 'nombre']);
        return view('recetas.edit')
            ->with('receta', $receta)
            ->with('categorias', $categorias);
    }


    public function update(Request $request, Receta $receta)
    {
        //Revisar el policy 
        $this->authorize('update', $receta);

        //Validacion
        $data = request()->validate([
            'titulo' => 'required|min:3',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
        ]);

        //Asignamos los valores nuevos
        $receta->titulo = $data['titulo'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->preparacion = $data['preparacion'];
        $receta->categoria_id = $data['categoria'];

        //Si el usuario sube una nueva imagen
        if (request('imagen')) {
            //Obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

            //resize image con intervention image
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            $img->save();

            //Asignamos al objeto
            $receta->imagen = $ruta_imagen;
        }

        $receta->save();

        return redirect()->action('RecetaController@index');
    }

    public function destroy(Receta $receta)
    {
        //Ejectuar policy
        $this->authorize('delete', $receta);

        // //Eliminar receta 
        $receta->delete();

        return redirect()->action('RecetaController@index');
    }

    public function search(Request $request)
    {
        $busqueda = $request['buscar'];

        $recetas = Receta::where('titulo', 'like', '%' . $busqueda . '%')->paginate(9);
        $recetas->appends(['buscar' => $busqueda]);

        return view('busquedas.show')
            ->with('recetas', $recetas)
            ->with('busqueda', $busqueda);
    }
}
