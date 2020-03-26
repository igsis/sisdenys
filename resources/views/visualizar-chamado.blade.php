@extends('template.index')

@section('titulo','Atendentes')

@section('conteudo')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="card-title"> Visualizar chamado </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row pb-3">
                                <div class="col-12">
                                    <div class="row">
                                        <h5>Dados do solicitante</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <b>Nome: </b> &nbsp; {{ $chamado->user->nome }}
                                        </div>
                                        <div class="col-4">
                                            <b>E-mail: </b> &nbsp; {{ $chamado->user->email }}
                                        </div>
                                        <div class="col-4">
                                            <b>Telefone: </b> &nbsp;{{ $chamado->telefone }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <b>Unidade: </b>  &nbsp;{{ $chamado->user->unidade->unidade }}
                                        </div>
                                        <div class="col-6">
                                            <b>Endereço: </b>  &nbsp;{{ $chamado->user->unidade->endereco }}, {{ $chamado->user->unidade->numero }} - {{ $chamado->user->unidade->bairro }}, São Paulo - SP, {{ $chamado->user->unidade->cep }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 border-top pt-2">
                                    <h5>Chamado</h5>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <b>Protocolo: </b> {{ $chamado->protocolo }}
                                </div>
                                <div class="col-4">
                                    <form action="{{ route('atualizar.status',$chamado->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row form-group">
                                            <label for="status" class="col-sm-4 col-form-label">Status: </label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="status" id="status">
                                                    @foreach ($status as $st)
                                                        <option value="{{ $st->id }}"
                                                                @if($st->id == $chamado->status_id) checked @endif>
                                                            {{ $st->status }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-success">Atualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <b>Título: </b> &nbsp;&nbsp;{{ $chamado->titulo }}
                                </div>
                                <div class="col-4">
                                    <b>Tipo de chamado: </b> &nbsp;&nbsp; {{ $chamado->tipochamado->tipo_chamado }}
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <b>Descrição: </b> {{ $chamado->descricao }}
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{route('atendente.chamados')}}" class="btn btn-outline-info">
                                Voltar
                            </a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection
