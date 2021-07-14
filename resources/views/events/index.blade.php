@extends('events.layout')
@section('title')
 Brand
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Event Manager App</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('events.create') }}"> Create New Event</a>
            </div><br>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Lugar</th>
            <th>Fecha</th>
            <th>Precio Adulto</th>
            <th>Precio Menor</th>
            <th>Inventario</th>
            <th width="280px">Opciones</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->title }}</td>
            <th>{{ $event->categories_id }}</th>
            <td>{{ $event->description }}</td>
            <td>{{ $event->location }}</td>
            <td>{{ $event->dateTime }}</td>
            <td>{{ $event->priceAdult }}</td>
            <td>{{ $event->priceKid }}</td>
            <td>{{ $event->inventory }}</td>
            <td>
                <form action="{{ route('events.destroy',$event->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('events.show',$event->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $events->links() !!}
      
@endsection
