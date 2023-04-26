@extends('index')

@section('contenido')

<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="d-grid mx-auto">
            <h1>
                Materias de {{$carrera->carrera}}
            </h1>
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
                        <td>
                            <a href="" class="btn btn-warning">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ url('deleteMateria', [$carrera->id ,$row->id]) }}" class="delete-confirm">
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