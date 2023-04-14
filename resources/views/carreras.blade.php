@extends('index')
<!-- Incluye todo lo el contenido de la vista index !-->

@section('contenido')

<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="d-grid mx-auto"> <!--clases para que el boto sea responsivo-->
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                <i class="fa-solid fa-circle-plus"></i>  Agregar
            </button>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-lg-8 offset-0 offset-lg-2">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CARRERA</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
