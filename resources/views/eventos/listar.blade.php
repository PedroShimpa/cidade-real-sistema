@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between align-items-center">EVENTOS
                                <a class="btn btn-primary text-right mr-2" href="{{ route('eventos.ver.criar')}}">
                                    ADICIONAR EVENTO
                                </a>
                            </h6>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2 m-2">
                        <div class="table-responsive p-0">
                            <table id="table" class="table align-items-center table-bordered  justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        @foreach($headers as $header)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder "> {{ $header }}</th>
                                        @endforeach
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                    <tr>
                                        @foreach($campos as $campo)
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm"> {{ $item->$campo }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach
                                        <td class="align-middle">
                                            @if(!empty($routeEditar))
                                            <a class="btn btn-success" href="{{ route($routeEditar, $item->id)}}">
                                                EDITAR
                                            </a>
                                            @endif
                                            @if(!empty($routeVer))
                                            <a class="btn btn-primary" href="{{ route($routeVer, $item->id)}}">
                                                VER
                                            </a>
                                            @endif
                                            @if(!empty($routeRemover) && auth()->user()->is_admin == 1)
                                            <a class="btn btn-danger" href="{{ route($routeRemover, $item->id)}}">
                                                REMOVER
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection