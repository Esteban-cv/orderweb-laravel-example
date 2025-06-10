@extends('templates.base_reports')
@section('header', 'Reporte ordenes por fecha')
@section('content')
    <section id="results">
        @if (count($orders) != 0) 
            <table id="reportTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha legalización</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Causal</th>   
                        <th>Observación</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->legalization_date }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->causal->description ?? 'Sin causal' }}</td>
                            <td>{{ $order->observation->description ?? 'Sin observación' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        @else
            <p>No existen datos</p>
        @endif
    </section>
@endsection