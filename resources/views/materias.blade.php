@extends('index')

@section('contenido')

<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="d-grid mx-auto">
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalMateria">
                <i class="fa-solid fa-circle-plus"></i> Agregar Materia
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
                        <th>MATERIA</th>
                        <th>CARRERA</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php $i = 1; @endphp
                    @foreach($materias as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->materia }}</td>
                        <td>{{ $row->carrera }}</td>
                        <td>
                            <a href="{{ url('materias', [$row]) }}" class="btn btn-warning">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ url('materias', [$row]) }}" class="delete-confirm">
                                @method("delete")
                                @csrf
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMateria" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tituloModal">Agregar materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmMateria" method="POST" action="{{ url('materias') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-book-font"></i>
                        </span>
                        <input type="text" class="form-control" name="materia" maxlength="50" placeholder="Nombre..." required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <select name="id_carrera" class="form-select" required>
                            <option value="">Carrera</option>
                            @foreach($carreras as $row)
                            <option value="{{ $row->id }}"> {{$row->carrera}} </option>
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
            <div class="modal-footer">
                <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

@if( session('confirmacion') == 'ok' )
<script type="text/javascript">
    Swal.fire(
        'Eliminado!',
        'La materia se ha sido eliminada!',
        'success'
    )
</script>
@endif

<script type="text/javascript">
    $('.delete-confirm').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Esta seguro?',
            text: "No podras restaurar los cambios",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
@endsection