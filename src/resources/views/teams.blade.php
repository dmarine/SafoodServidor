@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Teams</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Conferencia</th>
                            <th scope="col">Division</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <th scope="row">{{ $team->Nombre }}</th>
                                    <td>{{ $team->Ciudad }}</td>
                                    <td>{{ $team->Conferencia }}</td>
                                    <td>{{ $team->Division }}</td>
                                    <td>
                                        <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                                            <a style='cursor:pointer;color:white;' class='btn btn-secondary' href='team/{{ $team->Nombre }}'>
                                                <i class='far fa-eye'></i>
                                            </a>
                                            <a style='cursor:pointer;color:white;' class='btn btn-secondary' href='update/team/{{ $team->Nombre }}'>
                                                <i class='far fa-edit'></i>
                                            </a>
                                            <a style='cursor:pointer;color:white;' class='btn btn-secondary' href='delete/team/{{ $team->Nombre }}'>
                                                <i class='fas fa-trash-alt'></i>
                                            </a>
                                        </div>
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
