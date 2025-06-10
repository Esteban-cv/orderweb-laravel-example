@extends('templates.base_reports')
@section('header', 'Reporte general de técnicos')
@section('content')
    <section id="results">
        @if ($technicians) 
            <table id="reportTable">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technicians as $technician)
                        <tr>
                            <td>{{ $technician['document'] }}</td>
                            <td>{{ $technician['name'] }}</td>
                            <td>{{ $technician['speciality'] }}</td>
                            <td>{{ $technician['phone'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        @else
        <p>No existen datos</p>
        @endif
    </section>
@endsection
