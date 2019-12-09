@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Players</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Procedencia</th>
                            <th scope="col">Altura</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Posicion</th>
                            <th scope="col">Equipo</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                                <tr>
                                    <th scope="row">{{ $player->codigo }}</th>
                                    <td>{{ $player->Nombre }}</td>
                                    <td>{{ $player->Procedencia }}</td>
                                    <td>{{ $player->Altura }}</td>
                                    <td>{{ $player->Peso }}</td>
                                    <td>{{ $player->Posicion }}</td>
                                    <td>{{ $player->Nombre_equipo }}</td>
                                    <td>
                                        <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                                            <a style='cursor:pointer;color:white;' class='btn btn-secondary' href='players/{{ $player->codigo }}'>
                                                <i class='far fa-eye'></i>
                                            </a>
                                            <a style='cursor:pointer;color:white;' class='btn btn-secondary' href='update/players/{{ $player->codigo }}'>
                                                <i class='far fa-edit'></i>
                                            </a>
                                            <a style='cursor:pointer;color:white;' class='btn btn-secondary' href='delete/players/{{ $player->codigo }}'>
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
