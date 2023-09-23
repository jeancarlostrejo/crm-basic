@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Usuarios</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('eliminated'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('eliminated') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
                            <table class="table table-bordered" id="user_table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Fecha verificación email</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->email_verified_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="btn btn-success"> Editar</a>

                                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                    id="delete_form" method="POST"
                                                    onsubmit="return confirm('Esta seguro que desea eliminar el registro?')"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="submit" class="btn btn-danger" value="Eliminar">
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
    </div>
@endsection
@section('scripts')
    <script>
        new DataTable('#user_table');
    </script>
@endsection
