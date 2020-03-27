<div class="card-body">
    {{ csrf_field() }}
    
    <div class="form-body">
        <div class="form-group row">
            <label class="control-label text-right col-md-3">Empresa</label>
            <div class="col-md-6">
                <strong> {{ $radiologista->nome_empresa ?? $empresa['nome'] }} </strong>
            </div>
        </div>

        <hr class="dashed">
        <div class="form-group row {{ $errors->has('razao_social') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Razão Social</label>
            <div class="col-md-6">
                <input name="razao_social" value="{{$radiologista->razao_social ?? old('razao_social') }}" type="text" class="form-control">
                @if ($errors->has('razao_social')) 
                    <h6> <span class="help-block"> {{ $errors->first('razao_social') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('nome_fantasia') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Nome Fantasia</label>
            <div class="col-md-6">
                <input name="nome_fantasia" value="{{$radiologista->nome_fantasia ?? old('nome_fantasia') }}" type="text" class="form-control">
                @if ($errors->has('nome_fantasia')) 
                    <h6> <span class="help-block"> {{ $errors->first('nome_fantasia') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('cnpj') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*CNPJ</label>
            <div class="col-md-6">
                <input name="cnpj" value="{{$radiologista->cnpj ?? old('cnpj') }}" type="text" class="form-control cnpjMask" placeholder="000.000.000-00">
                @if ($errors->has('cnpj')) 
                    <h6> <span class="help-block"> {{ $errors->first('cnpj') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Email</label>
            <div class="col-md-6">
                <input name="email" value="{{$radiologista->email ?? old('email') }}" type="text" class="form-control" placeholder="ficticio@gmail.com">
                @if ($errors->has('email')) 
                    <h6> <span class="help-block"> {{ $errors->first('email') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('celular') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Celular</label>
            <div class="col-md-6">
                <input name="celular" value="{{$radiologista->celular ?? old('celular') }}" type="text" class="form-control celularMask" placeholder="(00) 0 0000-0000">
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
    </div>
</div>