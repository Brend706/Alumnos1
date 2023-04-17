@extends('index')

@section('contenido')
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card text-center">
            <div class="card-header bg-dark text-white">
                Editar Alumno
            </div>
            <div class="card-body">
                <form id="frmAlumnos" method="POST" action="{{ url('alumnos', [$alumno]) }}">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="nombre" maxlength="50" placeholder="Nombre..."
                        value="{{ $alumno->nombre }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-at"></i>
                        </span>
                        <input type="text" class="form-control" name="correo" maxlength="50" placeholder="Correo..."
                        value="{{ $alumno->correo }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select name="id_carrera" class="form-select" required>
                            @foreach($carreras as $row)
                            @if( $row->id == $alumno->id_carrera)
                            <option selected value="{{ $row->id }}"> {{$row->carrera}} </option>
                            @else
                            <option value="{{ $row->id }}"> {{$row->carrera}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection