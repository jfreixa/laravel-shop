@extends('admin.template')

@section('content')
    <div class='container text-center'>
        <div class="page-header">
            <h1>
                <i class='fa fa-shopping-cart'></i>
                CATEGORIES
                <a href="{{route('category.create')}}" class ='btn btn-warning'><i class ='fa fa-plus-circle'></i> Nova Categoria</a>
            </h1>
        </div>
        <div class="page">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Nom</th>
                        <th>Descripció</th>
                        <th>Color</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($categories as $category)
                        <tr>
                            <td><a href="{{route('category.edit', $category->id)}}" class ='btn btn-primary'><i class ='fa fa-pencil-square'></i></a></td>
                            <td><a href="{{route('destroy-category', $category->id)}}" class ='btn btn-danger'><i class ='fa fa-trash'></i></a></td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->color}}</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection