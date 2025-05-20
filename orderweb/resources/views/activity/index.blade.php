@extends('templates.base')
@section('title','Actividades')
@section('header', 'Actividades')
@section('content')

    <div class="row">
        <div class="col-lg-12 mb-4 d-grid gap-2 d-md-block">
            <a href="{{ route('activity.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>    
    
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Horas</th>
                        <th>técnico</th>
                        <th>tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <body>
                    <tr>
                        <td>1</td>
                        <td>Actividad Prueba</td>
                        <td>16</td>
                        <td>Altor Tilla</td>
                        <td>Tipo Prueba</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-circle btn-sm" title="Editar"><i class="far fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm" class="Eliminar" onclick="return remove();"><i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                </body>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection