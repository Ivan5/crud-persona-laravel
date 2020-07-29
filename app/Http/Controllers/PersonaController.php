<?php

namespace App\Http\Controllers;

use App\Persona;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PersonaController extends Controller
{
    /**
     * El metodo index lista todos los registros contenidos en la base de datos crud-persona y en la tabla personas.
     * y retorna un vista index que se encuentra en la carpeta views/persona/index.blade.php y manda como parametro la variable personas
     */
    public function index()
    {
        //Se obtienen todos registros de la tabla persona
        $personas = Persona::all();
        //se retorna la vista con la variable que contiene los registros
        return view('persona.index', compact('personas'));
    }

    /**
     * El metodo create mustra el formulario para la creación de un nuevo registro en la tabla
     */
    public function create()
    {
        //Se retorna la vista correspondiente al formulario 
        return view('persona.create');
    }

    /**
     * El metodo store sirve para guardar los registros dentro de la base de datos
     */
    public function store(Request $request)
    {
        //Se crea una nueva instacia de persona con los datos provenientes del $request y se asigna a la variable persona
        $persona = new Persona($request->all());
        //Verificamos si en el campo Avatar se encientra un archivo
         if($request->hasFile('Avatar')):
            //de ser asi, lo almacenamos en un variable
            $avatar = $request->file('Avatar');
            //definimos la ruta donde se debe almacenar el archivo
             $ruta = public_path('/img/persona/'.$request->file('Avatar')->getClientOriginalName());
             //copiamos el archivo que viene del $request a la ruta que definimos
            copy($avatar->getRealPath(), $ruta);
            //Guardamos en el atributo Avatar de la base de datos, el nombre del archivo par hacer referencia a el cuando se necesite
            $persona->Avatar = $avatar->getClientOriginalName();
        endif;
        //Guardamos el registro de la persona con los datos del $request y con la asignación de el archivo avatar
        $persona->save();
        //redireccionamos a la vista principal
        return redirect()->route('persona.index');
    }

    /**
     * El metodo edit muestra el formulario para editar
     */
    public function edit($id)
    {
        //Se obtiene el registro de la persona que sera editada y se almacena en la variable persona
        $persona = Persona::whereId($id)->first();
        //Se retorna una vista con el registro de la persona
        return view('persona.edit',compact('persona'));
    }

    /**
     * El metodo update sirve para actualizar los datos en un registro
     */
    public function update(Request $request, $id)
    {
        //Se busca el registro de la persona a editar
        $persona = Persona::findOrFail($id);
        //se rellenan los datos con los datos provenientes del request
        $persona->fill($request->all());
        //Verificamos si en el campo Avatar se encientra un archivo
         if($request->hasFile('Avatar')):
            //de ser asi, lo almacenamos en un variable
            $avatar = $request->file('Avatar');
            //definimos la ruta donde se debe almacenar el archivo
             $ruta = public_path('/img/persona/'.$request->file('Avatar')->getClientOriginalName());
             //copiamos el archivo que viene del $request a la ruta que definimos
            copy($avatar->getRealPath(), $ruta);
            //Guardamos en el atributo Avatar de la base de datos, el nombre del archivo par hacer referencia a el cuando se necesite
            $persona->Avatar = $avatar->getClientOriginalName();
        endif;
        //Se modifica el atributo fecha de modificacion con la fecha actual
        $persona->Fecha_Modificacion = new DateTime();
        //Se guarda el registro en la base de datos
        $persona->save();
        //se redirecciona a la pagina principal
        return redirect()->route('persona.index');
    }

    /**
     * Remueve un registro en especifico determinado por el id
     */
    public function destroy($id)
    {
        //Se encuentra el registro a eliminar
        $persona = Persona::findOrFail($id);
        //se llama al metodo delete
        $persona->delete();

        //se redirecciona a la pagina principal
        return redirect()->route('persona.index');
    }
}
