@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
      <div class="row justify-content-center">
        
        <div class="col-md-8">
          <a class="btn btn-primary mb-5" href="{{route('persona.create')}}">Agregar Persona</a>
          {{-- Se verifica si la variable personas cuenta con al menos un registro para poder mostrar la tabla --}}
          @if(count($personas) > 0) 
          <table class="table">
            <thead>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>Fecha de Nacimiento</th>
              <th>Acciones</th>
            </thead>
            <tbody>
              {{-- Se recorre la variable persona para obtener cada uno de los registros obtenidos y poderlos mostrar --}}
            @foreach ($personas as $persona)
                <tr>
                  <td>{{$persona->id}}</td>
                  <td>{{$persona->Nombre}}</td>
                  <td>{{$persona->Ape_Pat}}</td>
                  <td>{{$persona->Ape_Mat}}</td>
                  <td>{{$persona->Fecha_Nacimiento}}</td>
                  <td>
                    <a class="btn btn-warning mb-2" href="{{route('persona.edit',$persona->id)}}">Editar Persona</a>
                    {!! Form::open(['method' => 'DELETE', 'route' =>['persona.destroy', $persona->id], 'style' => 'display:inline']) !!}
                      {!! Form::submit('Eliminar Persona',['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    
                  </td>
                </tr>
              @endforeach 
              @else
              <h2>No hay Registros</h2>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection