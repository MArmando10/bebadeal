@extends('layouts.main')

@section('content')

<style>

</style>
{{-- {{$categorias}} --}}
<div class="card content"  style="border: double">
  <div class="card-header text-center logoClass" >
    <h2 style="font-size: 3rem;">Subasta un producto</h2>
  </div>
  <div class="card-body" >

      {!! Form::open(['action' => 'ProductController@store', 'method' => 'post', 'files' => true], ['class' => 'inline-form']) !!}

        {{-- {{$errors}} --}}
        @csrf
      <div class="form-group col-12">
        <h3 class="font-weight-bold" style="font-size: 2rem">Detalles de producto</h3>

        <!-- Titulo -->
        <div class="form-group row">
          {{ Form::label('Titulo', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::text('titulo', '', array_merge(['class' => 'form-control'] )) }}
          </div>
        </div>
        <!-- Fotos -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="FormUpload">Fotos</span>
          </div>

          <div class="custom-file">
            {!! Form::file('images[]', array('id' => 'FormPhotos', 'aria-describedby' =>
            'FormUpload','multiple'=>true,'class'=>'custom-file-input')) !!}
            {{ Form::label('Archivos seleccionados', null, ['for'=> 'FormPhotos','class' => 'custom-file-label']) }}
          </div>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" style="font-weight: bold">
                    <option value="">--> Seleccione <-- </p></option>
                    @foreach($categorias as $id => $categoria)
                        <option value="{{ $id }}">{{$categoria}}</option>
                    @endforeach
                </select>
                @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <!-- Condicion -->
        <div class="form-group row">
          {{ Form::label('Condición', null, ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::select('condicion', ['1' => 'Nuevo', '2' => 'Usado'], 'condicion', ['class' => 'form-control']) }}
            </div>
        </div>

        <!-- Marca -->
        <div class="form-group row">
          {{ Form::label('Marca', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::text('marca', '', array_merge(['class' => 'form-control'] )) }}
          </div>
        </div>

        <!-- Descripcion -->
        <div class="form-group row">
          {{ Form::label('Descripción', null, ['class' => 'col-sm-3 col-form-label']) }}
          <div class="col-sm-12">
            {{ Form::textarea('descripcion', null, ['id' => 'keterangan', 'rows' => 4, 'class' => 'form-control']) }}
          </div>
        </div>
        <br>

        <div class="border-lines"></div>
       <br><br>

       <!--Duración-->
        <h3 class="font-weight-bold" style="font-size: 2rem">Detalles de la venta</h3>
        <div class="form-group row">
          {{ Form::label('Duración', null, ['class' => 'col-sm-2 col-form-label']) }}
           <div class="col-sm-10">
            {{ Form::select('duracion', ['1' => '1 Día', '2' => '2 Días', '3' => '3 Días', '4' => '7 Días', '5' => '15 Días'], 'duracion', ['class' => 'form-control']) }}
          </div>
        </div>

        <!-- Horario para comenzar -->
        <div class="form-group row">
          {{ Form::label('Inicio', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-10">
            {{ Form::datetimeLocal('fechaInicio', \Carbon\Carbon::now(), ['id' => 'fechaInicio',  'class' => 'form-control']) }}
          </div>
        </div>
        <!-- fecha y hora final -->
        <div class="form-group row">
          {{ Form::label('final', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-10">
            {{ Form::datetimeLocal('fechaFinal', \Carbon\Carbon::now(), ['id' => 'fechaFinal', 'class' => 'form-control']) }}
          </div>
        </div>
        <!-- Precio inicial -->
        <div class="form-group row">
          {{ Form::label('Precio Inicial (BEBA)', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            <div class="input-group">
              {{ Form::text('precioInicial', '', ['aria-label'=> 'Dollar amount (with dot and two decimal places)', 'class' => 'form-control']) }}
              <div class="input-group-append">
                <span class="input-group-text">$</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Precio reserva -->
        <div class="form-group row">
          {{ Form::label('Precio reserva', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            <div class="input-group">
              {{ Form::text('precioReserva', '', ['aria-label'=> 'Dollar amount (with dot and two decimal places)', 'class' => 'form-control']) }}
              <div class="input-group-append">
                <span class="input-group-text">$</span>
              </div>
            </div>
          </div>
        </div>

        <!-- cantidad -->
        <div class="form-group row">
          {{ Form::label('Cantidad', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::number('cantidad', '', ['class' => 'form-control']) }}
          </div>
        </div>
        <br>

        <div class="border-lines"></div>
        <br><br>

  <h3 class="font-weight-bold" style="font-size: 2rem">Detalles de envío</h3>

  <!-- Destino -->
  <div class="form-group row">
    {{ Form::label('Destino', null, ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
      {{ Form::select('Destino', ['1' => 'Nacional', '2' => 'Internacional'], 'condition_id', ['class' => 'form-control']) }}
    </div>
  </div>
<br>
  <!-- dimensiones del producto -->
  <!-- dimensiones de alto -->
  <h2><strong>Peso y dimensiones del paquete</strong></h2>
  <div class="form-group row">
    <div class="col-sm-6">
      {{ Form::label('Alto',null,['class'=>'row justify-content-between col-form-label']) }}
      {{ Form::number('Alto', '', ['class' => 'form-control']) }}
      {{ Form::select('Alto', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Alto', ['class' => 'form-control']) }}
    </div>
    <!-- dimensiones de ancho -->
    <div class="col-sm-6">
      {{ Form::label('Ancho',null,['class'=>'row justify-content-between col-form-label']) }}
      {{ Form::number('Ancho', '', ['class' => 'form-control']) }}
      {{ Form::select('Ancho', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Ancho', ['class' => 'form-control']) }}
    </div>
  </div>

  <!-- dimensiones de largo -->
  <div class="form-group row">
    <div class="col-sm-6">
      {{ Form::label('Largo',null,['class'=>'row justify-content-between col-form-label']) }}
      {{ Form::number('Largo', '', ['class' => 'form-control']) }}
      {{ Form::select('Largo', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Largo', ['class' => 'form-control']) }}
    </div>
  <!-- Peso del producto -->
    <div class="col-sm-6">
      {{ Form::label('Peso',null,['class'=>'row justify-content-between col-form-label']) }}
      {{ Form::number('Peso', '', ['class' => 'form-control']) }}
      {{ Form::select('Peso', ['1' => 'kg', '2' => 'mg', '3' => 'g'], 'Peso', ['class' => 'form-control']) }}
    </div>
  </div>
<br><br>

<div class="row footer justify-content-center  ">
    <h5 style="text-shadow: -1px -1px white, 1px 1px #333">Los gastos de envío serán cargados a tu cuenta</h5>
</div>

</div>
</div>
    <div class="d-flex justify-content-between mb-8">
      <a class="btn btn-primary logoClass" role="button" href="{{route('product.index')}}"><i class="fas fa-arrow-left"></i> CANCELAR</a>
        {{Form::submit('PUBLICAR', ['class' => 'btn btn-success fas fa-save'])}}

    {!! Form::close() !!}
    </div>

  </div>
  <br>
@endsection
