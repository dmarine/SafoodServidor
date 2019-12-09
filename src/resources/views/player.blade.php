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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $player->codigo }}</th>
                                <td>{{ $player->Nombre }}</td>
                                <td>{{ $player->Procedencia }}</td>
                                <td>{{ $player->Altura }}</td>
                                <td>{{ $player->Peso }}</td>
                                <td>{{ $player->Posicion }}</td>
                                <td>{{ $player->Nombre_equipo }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
