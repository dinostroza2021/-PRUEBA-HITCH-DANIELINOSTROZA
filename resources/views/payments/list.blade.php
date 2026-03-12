@extends('layout')
@section('content')
    <div class="row p-4">
        <div class="col-md-9">
            <h4 class="text-uppercase">Listado de Pagos</h4>
        </div>
        <div class="col-md-3 text-end">
            <a href="{{ route('payments.create') }}" class="btn btn-primary">Crear Pago</a>
        </div>
        <br>
        <br>
        <hr>
        @if (session()->has('alert-success'))
            <div class="alert alert-success" role="alert">
                {!! session()->get('alert-success') !!}
            </div>
        @endif
        @if (session('alert-error'))
            <div class="alert alert-danger" role="alert">
                {!! session('alert-error') !!}
            </div>
        @endif
        <div class="col-md-12">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">DESCRIPCION</th>
                        <th class="text-center">PRECIO</th>
                        <th class="text-center">ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($payments as $payment)

                        <tr>
                            <td class="text-center">{{ $payment->id }}</td>
                            <td class="text-center">{{ $payment->description }}</td>
                            <td class="text-center">${{ number_format($payment['price'], 0, ',', '.') }}</td>
                            <td class="text-center">
                                <div class="btn-group">

                                    <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-primary">Ver
                                        <i class="fa fa-eye"></i></a>
                                    <a href="{{ route('payments.edit', $payment->id) }}"
                                        class="btn btn-sm btn-warning">Editar <i class=" fa fa-pencil"></i></a>
                                    <form id="form-delete-{{ $payment->id }}"
                                                action=" {{ route('payments.destroy', $payment->id) }}" method="POST"
                                        style="display:inline;" onsubmit="confirmDelete(event, {{ $payment->id }})">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Eliminar <i class="fa fa-trash-o"></i>
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>

                    @endforeach

                    {{-- <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">Pago 1</td>
                        <td class="text-center">1000</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#table').DataTable();

        function confirmDelete(event, id) {

            event.preventDefault(); // Stop frente a la confirmación. 

            Swal.fire({
                title: '¿Está seguro?',
                text: "Este registro será eliminado",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {

                if (result.isConfirmed) {

                    document.getElementById('form-delete-' + id).submit();

                }

            });

        }

    </script>
@endsection