@extends('layout')
@section('content')
    <div class="row p-4">
        <div class="col-md-9">
            <h4 class="text-uppercase">Nuevo Pago</h4>
        </div>
        <div class="col-md-3 text-end">
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Volver a Pagos</a>
        </div>
        <br>
        <br>
        <hr>
        <div class="col-md-12">
            {{-- MUESTRA ERRORES DE VALIDACION --}}
            @if ($errors->any())
                @php
                    $errorMessages = implode('<br>', $errors->all()); // Usar <br> para separar los mensajes de error
                    $error = 'Se encontraron los siguientes errores: <br>' . $errorMessages;
                @endphp
                <div class="alert alert-danger" role="alert">
                    {!! $error !!}
                </div>
            @endif

            {{-- MUESTRA ERRORES PERSONALIZADOS --}}
            @if (session('alert-error'))
                <div class="alert alert-danger" role="alert">
                    {!! session('alert-error') !!}
                </div>
            @endif

            <form action="{{ route('payments.update', [$payment->id]) }}" method="POST">
                @csrf
                @method('PUT')
                @include('payments.form')
                <br>
                <div class="row">
                    <div class="col-md-12 p-2 text-center">
                        <button class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection