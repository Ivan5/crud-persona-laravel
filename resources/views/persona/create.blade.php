@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          {!! Form::open(['route' => ['persona.store'], 'method' => 'POST', 'files' => true]) !!}
            <div class="row form-group">
                {!! Form::label('Nombre', 'Nombre')!!} 
                {!! Form::text('Nombre', null, ['class' => 'form-control'] )!!} 
            </div>
            <div class="row form-group">
                {!! Form::label('Ape_Pat', 'Apellido Paterno')!!} 
                {!! Form::text('Ape_Pat', null, ['class' => 'form-control'] )!!} 
            </div>
             <div class="row form-group">
                {!! Form::label('Ape_Mat', 'Apellido Materno')!!} 
                {!! Form::text('Ape_Mat', null, ['class' => 'form-control'] )!!} 
            </div>
            <div class="row form-group">
                {!! Form::label('RFC', 'RFC')!!} 
                {!! Form::text('RFC', null, ['class' => 'form-control'] )!!} 
            </div>
            <div class="row form-group">
                {!! Form::label('CURP', 'CURP')!!} 
                {!! Form::text('CURP', null, ['class' => 'form-control'] )!!} 
            </div>
            <div class="row form-group">
                {!! Form::label('Fecha_Nacimiento', 'Fecha Nacimiento')!!} 
                {!! Form::date('Fecha_Nacimiento', null, ['class' => 'form-control'] )!!} 
            </div>
             <div class="row form-group">
                {!! Form::label('Avatar', 'Avatar')!!} 
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