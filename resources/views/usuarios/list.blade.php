@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('usuarios/new') }}">Novo usuario</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h1>Lista simples</h1>
                   <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                   @foreach( $usuarios as $u )
                            <tr>
                            <th scope="row"> {{ $u->id }}</th>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                <a href="usuarios/{{ $u ->id }}/edit" class="btn btn-info">Editar</a>
                            </td>
                            <td>
                                <form action="usuarios/delete/{{ $u ->id }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Deletar</button>

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
</div>
@endsection