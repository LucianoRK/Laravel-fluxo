@extends('layouts.app')

@section('title', 'Minha Conta')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Minha Conta</h5>
            <form action="{{ route('alterarSenha') }}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Nome</label>
                            <div class="col-md-6">
                                <strong> {{ $dados->nome }}  </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Tipo</label>
                            <div class="col-md-6">
                                <strong> {{ $dados->nome_tipo_usuario }}  </strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Login</label>
                            <div class="col-md-6">
                                <strong> <strong> {{ $dados->login }}  </strong> </strong>
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('senha') ? 'has-error' : '' }}">
                            <label class="control-label text-right col-md-3">*Senha</label>
                            <div class="col-md-5">
                                <input name="senha" value="{{ old('senha') }}" type="password" class="form-control" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                                @if ($errors->has('senha')) 
                                    <h6> <span class="help-block"> {{ $errors->first('senha') }} </span> </h6>
                                @endif
                            </div>
                        </div>
                
                        <div class="form-group row {{ $errors->has('repita_senha') ? 'has-error' : '' }}">
                            <label class="control-label text-right col-md-3">*Repita a senha</label>
                            <div class="col-md-5">
                                <input name="repita_senha" value="{{ old('repita_senha') }}" type="password" class="form-control" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                                @if ($errors->has('repita_senha')) 
                                    <h6> <span class="help-block"> {{ $errors->first('repita_senha') }} </span> </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light">
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="offset-sm-3 col-md-5">
                                        <button type="submit" class="btn btn-primary btn-rounded">Gravar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection