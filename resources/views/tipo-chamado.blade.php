@extends('template.index')

@section('titulo','Tipo Chamado')

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
                            <h3 class="card-title">Listagem Tipos de chamados </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row my-3 justify-content-end">
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-block" onclick="adicionarTipoChamado()">
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
                                            <th>Tipo de Chamado</th>
                                            <th width="20%">Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($tipos as $tipo)
                                            <tr>
                                                <td>{{ $tipo->tipo_chamado }}</td>
                                                <td>
                                                    <button class="btn btn-primary"
                                                            onclick="editarTipoChamado([{{$tipo->id}},'{{$tipo->tipo_chamado}}'])">
                                                        Editar
                                                    </button>
                                                    <button class="btn btn-danger"
                                                            onclick="modalApagarTipoChamado({{$tipo->id}})">Apagar
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Tipo de Chamado</th>
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

    <div class="tipo-chamado modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastro Tipo de chamado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('tipoChamado.cadastrar')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="tipoChamado">Tipo de chamado:</label>
                                <input type="text" class="form-control" id="tipoChamado" name="tipoChamado"
                                       placeholder="Digite o tipo de chamado" required maxlength="20">
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


    <div class="tipo-chamado-edita modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Tipo de chamado</h4>
                    <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('tipoChamado.editar')}}" method="post">
                    <div id='modal-editar' class="modal-body">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <label for="tipoChamado">Tipo de chamado:</label>
                                <input type="text" class="form-control" id="tipoChamadoEditar" name="tipoChamado"
                                       placeholder="Digite o tipo de chamado" required maxlength="20">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Editar</button>
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
                <form action="{{route('tipoChamado.apagar')}}" method="post">
                    <div class="modal-body">
                        <p>Você realmente deseja pagar essa Tipo de Chamado?</p>
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="idApagar" name="id">
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
        function adicionarTipoChamado() {
            $('.tipo-chamado').modal('show');
        }

        function editarTipoChamado(dados) {
            let tipoChamado = document.querySelector('#tipoChamadoEditar');
            tipoChamado.value = dados[1];


            let id = document.createElement('input');
            id.value = dados[0];
            id.type = 'hidden';
            id.name = 'id';

            document.querySelector('#modal-editar').appendChild(id);

            $('.tipo-chamado-edita').modal('show');
        }

        function modalApagarTipoChamado(id) {
            document.querySelector('#idApagar').value = id;
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
