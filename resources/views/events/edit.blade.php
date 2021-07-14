@extends('events.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Event</h2>
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

<form action="{{ route('events.store') }}" method="POST">
    @csrf

    <div class="row">

        <!-- img -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Imagen:</strong>
                <input type="text" name="image" value="{{ $event->image }}" class="form-control" placeholder="Image">
            </div>
        </div>
        <!-- title -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                <input type="text" name="title" value="{{ $event->title }}" class="form-control" placeholder="Titulo">
            </div>
        </div>
        <!-- category -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="categories_id">
                    @foreach ($categories as $category)
                    @if($category->id==$event->categories_id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <!-- description -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $event->detail }}></textarea>
            </div>
        </div>
        <!-- location -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lugar:</strong>
                <input type="text" name="location" value="{{ $event->title }}" class="form-control" placeholder="Sitio del evento">
            </div>
        </div>
        <!-- Fecha -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha:</strong><br>
                <input type="datetime-local" name="dateTime" value="{{ $event->dateTime }}" min="2021-06-01T00:00" max="2023-12-16T00:00">
            </div>
        </div>
        <!-- Precio adulto -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio adultos:</strong>
                <input type="number" name="priceAdult" value="{{ $event->priceAdult }}" class="form-control">
            </div>
        </div>
        <!-- precio ninos -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio niños:</strong>
                <input type="number" name="priceKid" value="{{ $event->priceKid }}" class="form-control">
            </div>
        </div>
        <!-- Disponibilidad -->

        @if ($event->available === 1)
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
        @else
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Disponible:</strong><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="available" value="1">
                <label class="form-check-label">Disponible</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="available" value="0" checked>
                <label class="form-check-label">No disponible</label>
            </div>
        </div>
        @endif

        <!-- Inventario -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Capacidad maxima:</strong>
                <input type="number" name="inventory" value="{{ $event->inventory }}" class="form-control"><br>
            </div>
        </div>
        <!-- boton -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div>

</form>
@endsection