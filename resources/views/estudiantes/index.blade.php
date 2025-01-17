@extends('estudiantes.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('estudiantes.create') }}"> Create New estudiante</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($estudiantes as $estudiante)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $estudiante->Nombre }}</td>
            <td>{{ $estudiante->detail }}</td>
            <td>
                <form action="{{ route('estudiantes.destroy',$estudiante->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('estudiantes.show',$estudiante->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('estudiantes.edit',$estudiante->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $estudiantes->links() !!}
      
@endsection