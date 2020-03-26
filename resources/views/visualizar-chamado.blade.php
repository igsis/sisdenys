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
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <b>Protocolo: </b> {{ $chamado->protocolo }}
                                </div>
                                <div class="col-4">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row form-group">
                                            <label for="status" class="col-sm-4 col-form-label">Status: </label>
                                            <div class="col-sm-6">
                                                <select class="form-control">
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
                                <b>Dados do solicitante</b>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <b>Nome: </b> &nbsp;&nbsp; {{ $chamado->user->nome }}
                                </div>
                                <div class="col-4">
                                    <b>E-mail: </b> &nbsp;&nbsp; {{ $chamado->user->email }}
                                </div>
                                <div class="col-4">
                                    <b>Telefone: </b> &nbsp;&nbsp;{{ $chamado->telefone }}
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
                            <div class="row">
                                <div class="col-12">
                                    <b>Descrição: </b> {{ $chamado->descricao }}
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection

@section('styles')
    {{--  Folha de estilo adiocional para tabela  --}}
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
    <style>
        form .row {
            margin-top: 15px;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(function () {
            //Adicionais para tabela funcionar
            @includeIf('includes.traducaoTabelas')
        });

        @if(session('save'))
        Swal.fire({
            title: '{{session('save')}}.',
            icon: 'success',
            width: 600,
            padding: '15px',
            background: '#fff url(/images/trees.png)',
            backdrop: `rgba(0,0,123,0.4)
                       url("https://media.giphy.com/media/7lsw8RenVcjCM/giphy.gif")`
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{session('error')}}'
        });
        @endif
    </script>
@endsection
