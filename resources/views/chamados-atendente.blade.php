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
                            <h3 class="card-title">Listagem Chamados Atendente </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            {{--                            <div class="row my-3 justify-content-end">--}}
                            {{--                                <div class="col-md-2">--}}
                            {{--                                    <button class="btn btn-success btn-block" onclick="adicionarChamado()">--}}
                            {{--                                        <i class="fas fa-plus"></i>--}}
                            {{--                                        Adicionar--}}
                            {{--                                    </button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="row">
                                <div class="col-12">
                                    <table id="tabela" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Protocolo</th>
                                            <th>Titulo</th>
                                            <th>Tipo Chamado</th>
                                            <th>Data de envio</th>
                                            <th>Status</th>
                                            <th>Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($chamados as $chamado)
                                            @if($chamado->user->unidade->instituicao->id == 1)
                                                <tr>
                                                    <td>{{$chamado->protocolo}}</td>
                                                    <td>{{$chamado->titulo}}</td>
                                                    <td>{{$chamado->tipochamado->tipo_chamado}}</td>
                                                    <td>{{date_format($chamado->created_at,'d/m/Y')}}</td>
                                                    <td>{{$chamado->status->status}}</td>
                                                    <td>
                                                        <a class="btn btn-primary" href="{{route('chamado.visualizar',$chamado->id)}}">Visualizar</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Protocolo</th>
                                            <th>Titulo</th>
                                            <th>Tipo Chamado</th>
                                            <th>Data de envio</th>
                                            <th>Status</th>
                                            <th>Ação</th>
                                        </tr>
                                        </tfoot>
                                    </table>
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
