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

            @include('template.erros')

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="card-title">Minha Conta </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <form action="{{ route('editar') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="login">Login</label>
                                                <input type="text" class="form-control" id="login" name="login" value="{{ $user->login }}" readonly required>
                                            </div>
                                            <div class="col-6">
                                                <label for="nomeUsuario">Nome do usuário</label>
                                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite nome do usuário" value="{{ $user->nome }}" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="email">Login</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" value="{{ $user->email }}" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="telefone">Telefone</label>
                                                <input type="text" class="form-control" id="telefone" name="telefone" data-mask="(00)0000-0000)" placeholder="0000-0000" onkeypress="mask(this, '(##) ####-####')" maxlength="14" value="{{ $user->telefone }}" required>
                                            </div>
                                        </div>

                                        <input type="hidden" id="idUnidade" name="idUnidade">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="unidade">Unidade</label>
                                                <select type="text" class="form-control" id="unidade" name="unidade" required>
                                                    <option value="">Selecione uma opção</option>
                                                    @foreach($unidades as $unidade)
                                                        @if ($unidade->id == old('unidade') || $unidade->id == $user->unidade_id)
                                                            <option value="{{ $unidade->id }}" selected>{{ $unidade->unidade }}</option>
                                                        @else
                                                            <option value="{{ $unidade->id }}">{{ $unidade->unidade }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="tipoAcesso">Tipo de Acesso</label>
                                                    @foreach($tipoAcessos as $tipoAcesso)
                                                        @if ($tipoAcesso->id == old('tipoAcesso') || $tipoAcesso->id == $user->tipo_acesso_id)
                                                            <input type="text" class="form-control" value="{{ $tipoAcesso->tipo_acesso }}" readonly>
                                                        @endif
                                                    @endforeach
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <a href="{{url('/')}}" type="button" class="btn btn-default">Voltar</a>
                                            <button type="submit" class="btn btn-success float-right">Gravar</button>
                                        </div>
                                    </form>


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
        form .row{
            margin-top: 15px;
        }
    </style>
@endsection

@section('scripts')
    <script>
        //Abrir modal para criar unidade
        function adicionarUser() {
            $('.user').modal('show');
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
