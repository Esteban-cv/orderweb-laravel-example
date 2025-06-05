@extends('templates.base')
@section('title', 'Reportes')
@section('header', 'Reportes')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Reporte general de tecnicos</h5>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-danger btn-block col-lg-1" title="PDF">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
