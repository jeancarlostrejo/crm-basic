@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Projectos</h1>
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
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Nuevo Projecto</a>
                            <table class="table table-bordered" id="project_table">
                                <thead>
                                    <tr>
                                        <th>Projecto</th>
                                        <th>Descripción</th>
                                        <th>Fecha límite</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->deadline }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td>{{ $project->user->name }}</td>
                                            <td>{{ $project->client->contact_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                    class="btn btn-success"> Editar</a>

                                                <form action="{{ route('admin.projects.destroy', $project->id) }}"
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
        new DataTable('#project_table');
    </script>
@endsection
