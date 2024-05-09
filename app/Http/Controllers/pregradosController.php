<?php

namespace App\Http\Controllers;

use App\Models\pregrado;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class pregradosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pregrado = pregrado::all();

        return view('crudpre.index', compact('pregrado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudpre.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* Metodo 1 =  UPDATEORCREATE*/

        $validate = $request->validate([
            'nombre' => '',
            'img' => '',
            'plasEs' => '',
            'duracion' => '',
            'facultad' => '',
            'titulo' => '',
            'estado' => ''
        ]);

        $id = $request->route('pregrados');

        $pregrado = pregrado::find($id);
        if ($request->file('img')) {
            if ($pregrado && $pregrado->img) {
                Storage::delete($pregrado->img);
            }
            $path = $request->file('img')->store('img');
            $validate['img'] = $path;
        }
        ;
        $pregrado = pregrado::updateOrCreate(['id' => $request->id], $validate);

        return redirect('pregrados');

        /* END metodo 1 */

        /* Metodo 3 = ASIGNANDO VALORES VALIDADOS */
        /*  $validate = $request->validate([
             'nombre'  => '',
             'img'     => '',
             'plasEs'  => '',
             'duracion'=> '',
             'facultad'=> '',
             'titulo'  => '',
             'estado'  => ''
            ]);

            $pregrado = new pregrado();

           
            $pregrado->nombre   =  $validate['nombre'];
            $pregrado->plasEs   =  $validate['plasEs'];
            $pregrado->duracion =  $validate['duracion'];
            $pregrado->facultad =  $validate['facultad'];
            $pregrado->titulo   =  $validate['titulo'];
            $pregrado->estado   =  $validate['estado'];

            if($request->file('img')){
             $path = $request->file('img')->store('public/img');
             $pregrado->img = str_replace('public', '', $path);
            };

            $pregrado->save();

            return redirect('pregrados'); */


        /* END metodo 3 */

        /* Medoto 2 = LLENANDO LOS ATRIBUTOS */

        /*  $pregrado = new pregrado();

         if($request->hasFile('img')){
             $file = $request->file('img');
             $desimg = 'img/';
             $filename = time(). '_'. $file->getClientOriginalName();
             $fileup = $file->move($desimg, $filename);
             $url = url($desimg . $filename);
             $pregrado->img = $url;
         }
         $pregrado->fill($request->input());
         $pregrado->save();


         return redirect('pregrados');
*/

        /* END metodo 2 */
        /*     dd($request);

       */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pregrado = pregrado::find($id);

        return view('crudpre.edit', compact('pregrado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nombre' => '',
            'img' => '',
            'plasEs' => '',
            'duracion' => '',
            'facultad' => '',
            'titulo' => '',
            'estado' => ''
        ]);

        $pregrado = pregrado::find($id);

        $pregrado->nombre = $validate['nombre'];
        $pregrado->plasEs = $validate['plasEs'];
        $pregrado->duracion = $validate['duracion'];
        $pregrado->facultad = $validate['facultad'];
        $pregrado->titulo = $validate['titulo'];
        $pregrado->estado = $validate['estado'];

        if ($request->file('img')) {
            $path = $request->file('img')->store('public/img');
            $pregrado->img = str_replace('public', '', $path);
        }
        ;

        $pregrado->save();

        return redirect('pregrados');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pregrado = pregrado::find($id);
        $pregrado->delete();
        return redirect('pregrados');
    }
}
