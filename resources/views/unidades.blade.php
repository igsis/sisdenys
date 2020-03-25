@extends('template.index')

@section('titulo','Unidades')

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
                            <h3 class="card-title">Listagem de unidades </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row my-3 justify-content-end">
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-block" onclick="adicionarUnidade()">
                                        <i class="fas fa-plus"></i>
                                        Nova Unidade
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table id="tabela" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Unidade</th>
                                            <th width="20%">Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($unidades as $unidade)
                                            <tr>
                                                <td>{{ $unidade->unidade }}</td>
                                                <td>
                                                    <button class="btn btn-primary" onclick="editarUnidade({{ $unidade->id }})">Editar</button>
                                                    <button class="btn btn-danger" onclick="modalApagarUnidade({{ $unidade->id }})">Apagar</button>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Unidade</th>
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

    <div class="unidades modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastro Unidade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('unidade.cadastrar') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                <label for="nomeUnidade">Nome da Unidade:</label>
                                <input type="text" class="form-control" id="nomeUnidade" name="unidade" placeholder="Digite nome da unidade" required>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-6">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" onkeypress="mask(this, '#####-###')" maxlength="9" id="cep" name="cep" placeholder="Digite o CEP (ex: 00000-000)" required>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary">Carregar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="rua">Rua:</label>
                                <input type="text" class="form-control" name="endereco" id="rua" required readonly>
                            </div>
                            <div class="col-3">
                                <label for="numero">Número:</label>
                                <input type="text" class="form-control" name="numero" id="numero" value="" required>
                            </div>
                            <div class="col-3">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" name="complemento" id="complemento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" name="cidade" id="cidade" required readonly>
                            </div>
                            <div class="col-6">
                                <label for="Bairro">Bairro:</label>
                                <input type="text" class="form-control" name="bairro" id="bairro" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="instituicao">Instituição</label>
                                <select type="text" class="form-control" id="instituicao" name="instituicao" required>
                                    <option value="">Selecione uma opção</option>
                                    @foreach($instituicoes as $instituicao)
                                        <option value="{{ $instituicao->id }}">{{ $instituicao->instituicao }}</option>
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


    {{--Modal de Edição--}}
    <div class="editarUnidade modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Unidade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal-editar" class="modal-body">
                    <form action="{{ route('unidade.editar') }}" method="post">
                        @csrf
                        @method('put')

                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-12">
                                <label for="nomeUnidade">Nome da Unidade:</label>
                                <input type="text" class="form-control" id="unidadeEditar" name="unidade" placeholder="Digite nome da unidade" required>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-6">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" onkeypress="mask(this, '#####-###')" maxlength="9" id="cepEditar" name="cep" placeholder="Digite o CEP (ex: 00000-000)" required>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary">Carregar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="rua">Rua:</label>
                                <input type="text" class="form-control" name="endereco" id="enderecoEditar" required readonly>
                            </div>
                            <div class="col-3">
                                <label for="numero">Número:</label>
                                <input type="text" class="form-control" name="numero" id="numeroEditar" value="" required>
                            </div>
                            <div class="col-3">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" name="complemento" id="complemento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" name="cidade" id="cidadeEditar" required readonly>
                            </div>
                            <div class="col-6">
                                <label for="Bairro">Bairro:</label>
                                <input type="text" class="form-control" name="bairro" id="bairroEditar" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="instituicao">Instituição</label>
                                <select type="text" class="form-control" id="instituicaoEditar" name="instituicao" required>
                                    <option value="">Selecione uma opção</option>
                                    @foreach($instituicoes as $instituicao)
                                        <option value="{{ $instituicao->id }}">{{ $instituicao->instituicao }}</option>
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


    <!-- Modal para pagar unidade -->
    <div class="modal fade modal-danger" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Apagar Unidade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('unidade.apagar')}}" method="post">
                    <div class="modal-body">
                        <p>Você realmente deseja pagar essa Unidade?</p>
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

        //API CEP
        @includeIf('includes.cep-api')
        @includeIf('includes.cep-api-edicao')


        $(function () {

            //Adicionais para tabela funcionar
            @includeIf('includes.traducaoTabelas')
        });

        //Abrir modal para criar unidade
        function adicionarUnidade() {
            $('.unidades').modal('show');
        }

        function editarUnidade(id) {
            $.getJSON('/api/EditarUnidade/' + id, function (dados) {
                let unidade = document.querySelector('#unidadeEditar');
                let cep = document.querySelector('#cepEditar');
                let endereco = document.querySelector('#enderecoEditar');
                let numero = document.querySelector('#numeroEditar');
                let cidade = document.querySelector('#cidadeEditar');
                let bairro = document.querySelector('#bairroEditar');
                let idUnidade = document.querySelector('#id');

                unidade.value = dados.unidade;
                cep.value = dados.cep;
                endereco.value = dados.endereco;
                cidade.value = dados.cidade;
                bairro.value = dados.bairro;
                numero.value = dados.numero;
                document.getElementById('instituicaoEditar').value = dados.instituicoes_id;
                idUnidade.value = id;

            });

            $('.editarUnidade').modal('show');
        }

        function modalApagarUnidade(id) {
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
