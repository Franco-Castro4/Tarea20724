<?php

namespace App\Http\Controllers;

use App\Models\usuariomodel;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function Crear(Request $request)
    {
        if ($request->has("nombre") && $request->has("apellido")) {


            $usuario = new usuariomodel();
            $usuario->nombre = $request->post("nombre");
            $usuario->apellido = $request->post("apellido");
            $usuario->telefono = $request->post("telefono");
            $usuario->save();
            return $usuario;
        }
        return response()->json(["error mesage" => "No se pudo crear el usuario, revise posibles errores"]);
    }

    public function Eliminar(Request $request, $id)
    {
        $usuario = usuariomodel::findOrFail($id);
        $usuario->delete();
        return ['mensaje' => 'usuario eliminado'];
    }

    public function Modificar(Request $request, $id)
    {
        $usuario = usuariomodel::findOrFail($id);
        $usuario->nombre = $request->post("nombre");
        $usuario->apellido = $request->post("apellido");
        $usuario->telefono = $request->post("telefono");
        $usuario->save();
        return $usuario;
    }

    public function ListarTodos(Request $request)
    {
        return usuariomodel::all();
    }

    public function BuscarUnId(Request $request, $id)
    {
        return usuariomodel::findOrFail($id);
    }
}
