@extends('plantillas.cabecera')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Lista de productos</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('productos.create') }}" class="btn btn-info" >Añadir producto</a>
                        </div>
                    </div>
                    <div class="table-container">
                        @if(Session::has('success'))
                            <div class="alert alert-info">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <table class="table table-bordred table-striped">
                            <thead>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)  
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->valor }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ action('productosController@edit', $producto->id) }}" >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ action('productosController@destroy', $producto->id) }}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection