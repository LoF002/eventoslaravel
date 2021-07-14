@extends('events.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Event</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <!-- img -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Imagen:</strong>
                <input id="image" type="file" name="image" class="form-control">
                <img id="preview" src="{{url('/imgs/preview.png')}}" alt="preview image" style="height:250px">
            </div>
        </div>
        <!-- title -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                <input type="text" name="title" class="form-control" placeholder="Titulo">
            </div>
        </div>
        <!-- category -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="categories_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- description -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <!-- location -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lugar:</strong>
                <input type="text" name="location" class="form-control" placeholder="Sitio del evento">
            </div>
        </div>
        <!-- Fecha -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha:</strong><br>
                <input type="datetime-local" name="dateTime" value="2021-07-07T19:30" min="2021-06-01T00:00" max="2023-12-16T00:00">
            </div>
        </div>
        <!-- Precio adulto -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio adultos:</strong>
                <input type="number" name="priceAdult" class="form-control">
            </div>
        </div>
        <!-- precio ninos -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio niños:</strong>
                <input type="number" name="priceKid" class="form-control">
            </div>
        </div>
        <!-- Disponibilidad -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Disponible:</strong><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="available" value="1" checked>
                <label class="form-check-label">Disponible</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="available" value="0">
                <label class="form-check-label">No disponible</label>
            </div>
        </div>
        <!-- Inventario -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Capacidad maxima:</strong>
                <input type="number" name="inventory" class="form-control"><br>
            </div>
        </div>
        <!-- boton -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div>

</form>
@endsection