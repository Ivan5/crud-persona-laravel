@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          {!! Form::open(['route' => ['persona.update',$persona], 'method' => 'PUT', 'files' => true]) !!}
            <div class="row form-group">
                {!! Form::label('Nombre', 'Nombre')!!} 
                {!! Form::text('Nombre', $persona->Nombre, ['class' => 'form-control'] )!!} 
            </div>
            <div class="row form-group">
                {!! Form::label('Ape_Pat', 'Apellido Paterno')!!} 
                {!! Form::text('Ape_Pat', $persona->Ape_Pat, ['class' => 'form-control'] )!!} 
            </div>
             <div class="row form-group">
                {!! Form::label('Ape_Mat', 'Apellido Materno')!!} 
                {!! Form::text('Ape_Mat', $persona->Ape_Pat, ['class' => 'form-control'] )!!} 
            </div>
            <div class="row form-group">
                {!! Form::label('RFC', 'RFC')!!} 
                {!! Form::text('RFC', $persona->RFC, ['class' => 'form-control'] )!!} 
            </div>
            <div class="row form-group">
                {!! Form::label('CURP', 'CURP')!!} 
                {!! Form::text('CURP', $persona->CURP, ['class' => 'form-control'] )!!} 
            </div>
            <div class="row form-group">
                {!! Form::label('Fecha_Nacimiento', 'Fecha Nacimiento')!!} 
                {!! Form::date('Fecha_Nacimiento', $persona->Fecha_Nacimiento, ['class' => 'form-control'] )!!} 
            </div>
             <div class="row form-group">
                <img src="/img/persona/{{$persona->Avatar}}" alt="">
                {!! Form::file('Avatar')!!} 
            </div>
            <div class="row form-group">
              <div class="col-sm-6">
                {!! Form::submit('Save',["class" => "btn btn-success"]) !!} 
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    
@endsection