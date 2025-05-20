@extends('templates.base')
@section('title','Editar orden')
@section('header', 'Editar orden')
@section('content')
    
    <div class="row">
         <div class="col-lg-12 mb-4">
            <form action="" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="legalization_date">Fecha Legalización</label>
                        <input type="legalization_date" class="form-control" name="legalization_date" id="legalization_date" required>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="city">Ciudad</label>
                        <select name="city" id="technician_id" class="form-control">
                            <option value="tulua">TULUÁ</option>
                            <option value="cali">CALI</option>
                            <option value="buga">BUGA</option>
                            <option value="palmira">PALMIRA</option>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="causal_id">Id Causal</label>
                        <select name="causal_id" id="causal_id" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="observation_id">Observación</label>
                        <select name="observation_id" id="observation_id" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('order.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
         </div>
    </div>
@endsection