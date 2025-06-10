@extends('templates.base_reports')
@section('header', 'Reporte actividades por técnico')
@section('content')
    <section id="results">
        @if (count($activities) != 0) 
            <h4>Tecnico:</h4>
            <table id="reportTableInfo">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Teléfono</th>       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $activities[0]->technician->document }}</td>
                        <td>{{ $activities[0]->technician->name }}</td>
                        <td>{{ $activities[0]->technician->speciality }}</td>
                        <td>{{ $activities[0]->technician->phone }}</td>
                    </tr>
                </tbody>
            </table>

            <br><br>

            <table id="reportTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Horas</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity['id'] }}</td>
                            <td>{{ $activity['description'] }}</td>
                            <td>{{ $activity['hours'] }}</td>
                            <td>{{ $activity->type_activity->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        @else
        <p>No existen datos</p>
        @endif
    </section>
@endsection
