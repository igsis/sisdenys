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
                            <h3 class="card-title">Listagem Chamados </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row my-3 justify-content-end">
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-block" onclick="adicionarChamado()">
                                        <i class="fas fa-plus"></i>
                                        Adicionar
                                    </button>
                                </div>
                            </div>
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
                                            <tr>
                                                <td>{{$chamado->protocolo}}</td>
                                                <td>{{$chamado->titulo}}</td>
                                                <td>{{$chamado->tipoChamado->tipo_chamado}}</td>
                                                <td>{{date_format($chamado->created_at,'d/m/Y')}}</td>
                                                <td>{{$chamado->status->status}}</td>
                                                <td>
                                                    <button class="btn btn-danger" onclick="modalCancelar({{$chamado->id}})" @if($chamado->status_id != 1) disabled @endif>Cancelar</button>
                                                </td>
                                            </tr>
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

    <div class="chamado modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastro de Chamado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('chamados.cadastrar')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="tipoChamado">Tipo do chamado</label>
                                <select name="tipoChamado" id="tipoChamado" class="form-control" required>
                                    <option value="">Selecione um tipo de chamado</option>
                                    @foreach($tipoChamado as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->tipo_chamado}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="titulo">Titulo:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                       placeholder="Diga em poucas palavras o motivo do chamado" required
                                       maxlength="20">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição:</label>
                                    <textarea name="descricao" class="form-control" id="descricao" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" name="telefone" id="telefone"
                                       placeholder="ex: 98765-4321" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Gravar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Modal para pagar Tipo de Chamado -->
    <div class="modal fade modal-danger" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Apagar Tipo de Chamado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('chamados.apagar')}}" method="post">
                    <div class="modal-body">
                        <p>Você realmente deseja cancelar esse Chamado?</p>
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="idChamado" name="id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="reset" class="btn btn-outline-light" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-outline-light">Sim</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

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

        //Abrir modal para criar TipoChamado
        function adicionarChamado() {
            $('.chamado').modal('show');
        }

        function modalCancelar(id) {
            document.querySelector('#idChamado').value = id;
            $('.modal-danger').modal('show');
        }

        @if(session('save'))
        Swal.fire({
            title: '{{session('save')}}.',
            icon: 'success',
            width: 600,
            padding: '15px',
            background: '#fff url(/images/trees.png)',
            backdrop: `rgba(0,0,123,0.4)
                            url("https://media.giphy.com/media/7lsw8RenVcjCM/giphy.gif")`
        })
        @endif
        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{session('error')}}'
        })
        @endif
    </script>
@endsection
