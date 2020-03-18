<div class="card-body">
    {{ csrf_field() }}
    
    <div class="form-body">
        <div class="form-group row {{ $errors->has('fk_empresa') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Empresa</label>
            <div class="col-md-6">
                @if(!isset($usuario->fk_empresa))
                    <select name="fk_empresa" value="{{ old('fk_empresa') }}" class="form-control">
                        @if ($empresas)
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}"> {{ $empresa->nome }} </option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('fk_empresa')) 
                        <h6> <span class="help-block"> {{ $errors->first('fk_empresa') }} </span> </h6>
                    @endif
                @else
                    <strong> {{$usuario->nome_empresa}} </strong>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('fk_tipo_usuario') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Tipo de Usuario</label>
            <div class="col-md-6">
                @if(!isset($usuario->nome_tipo_usuario))
                    <select name="fk_tipo_usuario" value="{{ old('fk_tipo_usuario') }}" class="form-control">
                        @if ($tipos_usuarios)
                            @foreach($tipos_usuarios as $tipo_usuario)
                                <option value="{{ $tipo_usuario->id }}"> {{ $tipo_usuario->nome }} </option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('fk_tipo_usuario')) 
                        <h6> <span class="help-block"> {{ $errors->first('fk_tipo_usuario') }} </span> </h6>
                    @endif
                @else
                    <strong> {{$usuario->nome_tipo_usuario}} </strong>
                @endif
            </div>
        </div>

        <hr class="dashed">
        <div class="form-group row {{ $errors->has('nome') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Nome Completo</label>
            <div class="col-md-6">
                <input name="nome" value="{{$usuario->nome ?? old('nome') }}" type="text" class="form-control">
                @if ($errors->has('nome')) 
                    <h6> <span class="help-block"> {{ $errors->first('nome') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Data de Nascimento</label>
            <div class="col-md-6">
                <input name="data_nascimento" value="{{$usuario->data_nascimento ?? old('data_nascimento') }}" type="date" class="form-control" placeholder="dd/mm/yyyy">
                @if ($errors->has('data_nascimento')) 
                    <h6> <span class="help-block"> {{ $errors->first('data_nascimento') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('cpf') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*CPF</label>
            <div class="col-md-6">
                <input name="cpf" value="{{$usuario->cpf ?? old('cpf') }}" type="text" class="form-control cpfMask" placeholder="000.000.000-00">
                @if ($errors->has('cpf')) 
                    <h6> <span class="help-block"> {{ $errors->first('cpf') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Email</label>
            <div class="col-md-6">
                <input name="email" value="{{$usuario->email ?? old('email') }}" type="text" class="form-control" placeholder="ficticio@gmail.com">
                @if ($errors->has('email')) 
                    <h6> <span class="help-block"> {{ $errors->first('email') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('celular') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Celular</label>
            <div class="col-md-6">
                <input name="celular" value="{{$usuario->celular ?? old('celular') }}" type="text" class="form-control celularMask" placeholder="(00) 0 0000-0000">
                @if ($errors->has('celular')) 
                    <h6> <span class="help-block"> {{ $errors->first('celular') }} </span> </h6>
                @endif
            </div>
        </div>

        <hr class="dashed">

        <div class="form-group row {{ $errors->has('cep') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">CEP</label>
            <div class="col-md-6">
                <input name="cep" value="{{$endereco->cep ?? old('cep') }}" type="text" class="form-control cepMask" placeholder="00000-00">
                @if ($errors->has('cep')) 
                    <h6> <span class="help-block"> {{ $errors->first('cep') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('estado') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">Estado</label>
            <div class="col-md-6">
                <select id="estado" name="estado" value="{{ old('estado') }}" class="form-control">
                    <option value="" disabled selected="" disabled="" > Selecione um estado </option>
                    @if ($estados)
                        @foreach($estados as $estado)
                            @if(isset($endereco->fk_estado) && $endereco->fk_estado == $estado->id)
                                <option selected value="{{ $estado->id }}"> {{ $estado->nome.' - '.$estado->uf }} </option>
                            @else
                                <option value="{{ $estado->id }}"> {{ $estado->nome.' - '.$estado->uf }} </option>
                            @endif
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('estado')) 
                    <h6> <span class="help-block"> {{ $errors->first('estado') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row" id="comboCidades" {{ $errors->has('cidade') ? 'has-error' : '' }}>
            <label class="control-label text-right col-md-3">Cidades</label>
            <div class="col-md-6">
                <input disabled value="Selecione um estado antes" type="text" class="form-control">
            </div>
        </div>

        <div class="form-group row {{ $errors->has('rua') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">Logradouro</label>
            <div class="col-md-6">
                <input name="rua" value="{{$endereco->rua ?? old('rua') }}" type="text" class="form-control">
                @if ($errors->has('rua')) 
                    <h6> <span class="help-block"> {{ $errors->first('rua') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('numero_casa') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">Número</label>
            <div class="col-md-6">
                <input name="numero_casa" value="{{$endereco->numero ?? old('numero_casa') }}" type="text" class="form-control">
                @if ($errors->has('numero_casa')) 
                    <h6> <span class="help-block"> {{ $errors->first('numero_casa') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('complemento') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">Complemento</label>
            <div class="col-md-6">
                <input name="complemento" value="{{$endereco->complemento ?? old('complemento') }}" type="text" class="form-control">
                @if ($errors->has('complemento')) 
                    <h6> <span class="help-block"> {{ $errors->first('complemento') }} </span> </h6>
                @endif
            </div>
        </div>

        <hr class="dashed">

        <div class="form-group row {{ $errors->has('login') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Login</label>
            <div class="col-md-6">
                @if(!isset($usuario->login))
                    <input name="login" value="{{ old('login') }}" type="text" class="form-control" placeholder="O login deve conter no mínimo 6 caracteres">
                    @if ($errors->has('login')) 
                        <h6> <span class="help-block"> {{ $errors->first('login') }} </span> </h6>
                    @endif
                @else
                    <strong> {{$usuario->login}} </strong>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('senha') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Senha</label>
            <div class="col-md-6">
                <input name="senha" value="{{ old('senha') }}" type="password" class="form-control" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                @if ($errors->has('senha')) 
                    <h6> <span class="help-block"> {{ $errors->first('senha') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('repita_senha') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Repita a senha</label>
            <div class="col-md-6">
                <input name="repita_senha" value="{{ old('repita_senha') }}" type="password" class="form-control" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                @if ($errors->has('repita_senha')) 
                    <h6> <span class="help-block"> {{ $errors->first('repita_senha') }} </span> </h6>
                @endif
            </div>
        </div>
    </div>
</div>