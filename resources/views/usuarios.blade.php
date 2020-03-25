@extends('template.index')

@section('titulo','Usuários')

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
                            <h3 class="card-title">Listagem de usuários </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row my-3 justify-content-end">
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-block" onclick="adicionarUser()">
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
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Telefone</th>
                                            <th width="20%">Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($usuarios as $usuario)
                                            <tr>
                                                <td>{{ $usuario->nome }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>{{ $usuario->telefone }}</td>
                                                <td>
                                                    <button class="btn btn-primary" onclick="editarUser({{ $usuario->id }}) ">Editar</button>
                                                    <button class="btn btn-danger" onclick="modalApagarUser({{ $usuario->id }})">Apagar</button>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Telefone</th>
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

{{--    <div class="unidades modal fade" id="modal-lg">--}}
{{--        <div class="modal-dialog modal-lg">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">Cadastro Unidade</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form action="{{ route('unidade.cadastrar') }}" method="post">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <label for="nomeUnidade">Nome da Unidade:</label>--}}
{{--                                <input type="text" class="form-control" id="nomeUnidade" name="unidade" placeholder="Digite nome da unidade" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row align-items-end">--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="cep">CEP:</label>--}}
{{--                                <input type="text" class="form-control" onkeypress="mask(this, '#####-###')" maxlength="9" id="cep" name="cep" placeholder="Digite o CEP (ex: 00000-000)" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <button class="btn btn-primary">Carregar</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="rua">Rua:</label>--}}
{{--                                <input type="text" class="form-control" name="endereco" id="rua" required readonly>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <label for="numero">Número:</label>--}}
{{--                                <input type="text" class="form-control" name="numero" id="numero" value="" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <label for="complemento">Complemento:</label>--}}
{{--                                <input type="text" class="form-control" name="complemento" id="complemento">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="cidade">Cidade:</label>--}}
{{--                                <input type="text" class="form-control" name="cidade" id="cidade" required readonly>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="Bairro">Bairro:</label>--}}
{{--                                <input type="text" class="form-control" name="bairro" id="bairro" required readonly>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <label for="instituicao">Instituição</label>--}}
{{--                                <select type="text" class="form-control" id="instituicao" name="instituicao" required>--}}
{{--                                    <option value="">Selecione uma opção</option>--}}
{{--                                    @foreach($instituicoes as $instituicao)--}}
{{--                                        <option value="{{ $instituicao->id }}">{{ $instituicao->instituicao }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer justify-content-between">--}}
{{--                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
{{--                            <button type="submit" class="btn btn-success">Gravar</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- /.modal-content -->--}}
{{--        </div>--}}
{{--        <!-- /.modal-dialog -->--}}
{{--    </div>--}}


    {{--Modal de Edição--}}
    <div class="editarUser modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal-editar" class="modal-body">
                    <form action="{{ route('usuarios.editar') }}" method="post">
                        @csrf
                        @method('put')

                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-6">
                                <label for="login">Login</label>
                                <input type="text" class="form-control" id="loginEditar" name="login" readonly required>
                            </div>
                            <div class="col-6">
                                <label for="nomeUsuario">Nome do usuário</label>
                                <input type="text" class="form-control" id="nomeEditar" name="nome" placeholder="Digite nome do usuário" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="email">Login</label>
                                <input type="email" class="form-control" id="emailEditar" name="email" placeholder="Digite o email" required>
                            </div>
                            <div class="col-6">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefoneEditar" name="telefone" data-mask="(00)0000-0000)" placeholder="(00) 0000-0000" onkeypress="mask(this, '(##) ####-####')" maxlength="14" required>
                            </div>
                        </div>

                        <input type="hidden" id="idUnidade" name="idUnidade">
                        <div class="row">
                            <div class="col-6">
                                <label for="unidade">Unidade</label>
                                <select type="text" class="form-control" id="unidadeEditar" name="unidade" required>
                                    <option value="">Selecione uma opção</option>
                                    @foreach($unidades as $unidade)
                                        <option value="{{ $unidade->id }}">{{ $unidade->unidade }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="tipoAcesso">Tipo de Acesso</label>
                                <select type="text" class="form-control" id="tipoAcessoEditar" name="tipoAcesso" required>
                                    <option value="">Selecione uma opção</option>
                                    @foreach($tipoAcessos as $tipoAcesso)
                                        <option value="{{ $tipoAcesso->id }}">{{ $tipoAcesso->tipo_acesso }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Gravar</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- Modal para pagar usuario -->
    <div class="modal fade modal-danger" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Apagar Usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('usuarios.apagar')}}" method="post">
                    <div class="modal-body">
                        <p>Você realmente deseja pagar esse usuário?</p>
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
        form .row{
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

        //Abrir modal para criar unidade
        function adicionarUser() {
            $('.user').modal('show');
        }

        function editarUser(id) {
            $.getJSON('/api/EditarUser/' + id, function (dados) {
                let login = document.querySelector('#loginEditar');
                let nome = document.querySelector('#nomeEditar');
                let email = document.querySelector('#emailEditar');
                let telefone = document.querySelector('#telefoneEditar');
                let idUser= document.querySelector('#id');

                login.value = dados.login;
                nome.value = dados.nome;
                email.value = dados.email;
                telefone.value = dados.telefone;
                idUser.value = id;
                document.getElementById('unidadeEditar').value = dados.unidade_id;
                document.getElementById('tipoAcessoEditar').value = dados.tipo_acesso_id;

            });

            $('.editarUser').modal('show');
        }

        function modalApagarUser(id) {
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
