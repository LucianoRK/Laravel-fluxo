<div class="card-body">
    {{ csrf_field() }}
    
    <div class="form-body">
        <div class="form-group row">
            <label class="control-label text-right col-md-3">Empresa</label>
            <div class="col-md-6">
                <strong> {{ $usuario->nome_empresa ?? $empresa['nome'] }} </strong>
            </div>
        </div>
        
        <div class="form-group row {{ $errors->has('fk_tipo_usuario') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Tipo de Usuario</label>
            <div class="col-md-6">
                @if(!isset($usuario->nome_tipo_usuario))
                    <select name="fk_tipo_usuario" id="fk_tipo_usuario" value="{{ old('fk_tipo_usuario') }}" class="form-control">
                        @if ($tipos_usuarios)
                            @foreach($tipos_usuarios as $tipo_usuario)
                                @if (session('especialidade') || old('fk_tipo_usuario') == 3)
                                    <option selected value="{{ $tipo_usuario->id }}"> {{ $tipo_usuario->nome }} </option>
                                @else
                                    <option value="{{ $tipo_usuario->id }}"> {{ $tipo_usuario->nome }} </option>
                                @endif
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

        <div id='especialidade' class="form-group row {{ session('especialidade') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Especialidade</label>
            <div class="col-md-6">
                <div class="custom-control-inline custom-checkbox checkbox-primary form-check">
                    <input disabled type="checkbox" class="custom-control-input" name="clinico_geral" {{ in_array(1, $array_espe) ? 'checked' : ''}} {{ old('clinico_geral') ? 'checked' : ''}} id="stateCheck1">
                    <label class="custom-control-label" for="stateCheck1">Clínico geral</label>
                </div>
                <div class="custom-control-inline custom-checkbox checkbox-warning form-check">
                    <input disabled type="checkbox" class="custom-control-input" name="ortodontia" {{ in_array(2, $array_espe) ? 'checked' : ''}} {{ old('ortodontia') ? 'checked' : ''}} id="stateCheck2">
                    <label class="custom-control-label" for="stateCheck2">Ortodontia</label>
                </div>
                <div class="custom-control-inline custom-checkbox checkbox-accent form-check">
                    <input disabled type="checkbox" class="custom-control-input" name="implantodontia" {{ in_array(3, $array_espe) ? 'checked' : ''}} {{ old('implantodontia') ? 'checked' : ''}} id="stateCheck3">
                    <label class="custom-control-label" for="stateCheck3">Implantodontia</label>
                </div>
                <div class="custom-control-inline custom-checkbox checkbox-success form-check">
                    <input disabled type="checkbox" class="custom-control-input" name="odontopediatria" {{ in_array(4, $array_espe) ? 'checked' : ''}} {{ old('odontopediatria') ? 'checked' : ''}} id="stateCheck4">
                    <label class="custom-control-label" for="stateCheck4">Odontopediatria</label>
                </div>
                <div class="custom-control-inline custom-checkbox checkbox-info form-check">
                    <input disabled type="checkbox" class="custom-control-input" name="orofacial" {{ in_array(5, $array_espe) ? 'checked' : ''}} {{ old('orofacial') ? 'checked' : ''}} id="stateCheck5">
                    <label class="custom-control-label" for="stateCheck5">Orofacial</label>
                </div>
                @if (session('especialidade')) 
                    <h6> <span class="help-block"> {{ session('especialidade') }} </span> </h6>
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
            <label class="control-label text-right col-md-3">Cidade</label>
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

        <div class="form-group row {{ $errors->has('numero') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">Número</label>
            <div class="col-md-6">
                <input name="numero" value="{{$endereco->numero ?? old('numero') }}" type="text" class="form-control">
                @if ($errors->has('numero')) 
                    <h6> <span class="help-block"> {{ $errors->first('numero') }} </span> </h6>
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