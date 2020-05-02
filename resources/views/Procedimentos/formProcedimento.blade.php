<div class="card-body">
    {{ csrf_field() }}

    <div class="form-body">
        <div class="form-group row {{ session('especialidade') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Especialidade</label>
            <div class="col-md-6">
                @if(!isset($procedimento->nome_esp))
                    <div class="custom-control-inline custom-checkbox checkbox-primary form-check">
                        <input type="checkbox" class="custom-control-input" name="clinico_geral" {{ old('clinico_geral') ? 'checked' : ''}} id="stateCheck1">
                        <label class="custom-control-label" for="stateCheck1">Clínico geral</label>
                    </div>
                    <div class="custom-control-inline custom-checkbox checkbox-accent form-check">
                        <input type="checkbox" class="custom-control-input" name="implantodontia" {{ old('implantodontia') ? 'checked' : ''}} id="stateCheck3">
                        <label class="custom-control-label" for="stateCheck3">Implantodontia</label>
                    </div>
                    <div class="custom-control-inline custom-checkbox checkbox-success form-check">
                        <input type="checkbox" class="custom-control-input" name="odontopediatria" {{ old('odontopediatria') ? 'checked' : ''}} id="stateCheck4">
                        <label class="custom-control-label" for="stateCheck4">Odontopediatria</label>
                    </div>
                    <div class="custom-control-inline custom-checkbox checkbox-info form-check">
                        <input type="checkbox" class="custom-control-input" name="orofacial" {{ old('orofacial') ? 'checked' : ''}} id="stateCheck5">
                        <label class="custom-control-label" for="stateCheck5">Orofacial</label>
                    </div>
                    @if (session('especialidade')) 
                        <h6> <span class="help-block"> {{ session('especialidade') }} </span> </h6>
                    @endif
                @else
                    <strong> {{$procedimento->nome_esp}} </strong>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('categoria') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Categoria</label>
            <div class="col-md-6">
                @if(!isset($procedimento->nome_cat))
                    <select name="categoria" value="{{ old('categoria') }}" class="form-control">
                        <option value="" selected disabled> Selecione uma categoria </option>
                        @if ($categorias)
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}"> {{ $categoria->nome }} </option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('categoria')) 
                        <h6> <span class="help-block"> {{ $errors->first('categoria') }} </span> </h6>
                    @endif
                @else
                    <strong> {{$procedimento->nome_cat}} </strong>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('nome_procedimento') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Nome Procedimento</label>
            <div class="col-md-6">
                @if(!isset($procedimento->nome_proc))
                    <input name="nome_procedimento" value="{{old('nome_procedimento') }}" type="text" class="form-control">
                    @if ($errors->has('nome_procedimento')) 
                        <h6> <span class="help-block"> {{ $errors->first('nome_procedimento') }} </span> </h6>
                    @endif
                @else
                    <strong> {{$procedimento->nome_proc}} </strong>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('valor_sugerido') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">Valor Sugerido</label>
            <div class="col-md-6">
                <input name="valor_sugerido" value="{{ $procedimento->valor_sugerido ?? old('valor_sugerido') }}" type="text" class="form-control valorMask">
                @if ($errors->has('valor_sugerido')) 
                    <h6> <span class="help-block"> {{ $errors->first('valor_sugerido') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('protetico') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">Protético</label>
            <div class="col-md-6">
                @if(!isset($procedimento->protetico))
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="customcheckboxInline1" name="protetico" class="custom-control-input">
                        <label class="custom-control-label" for="customcheckboxInline1"> </label>
                        <span> Marque o checkbox apenas caso este procedimento envolva protético </span>
                    </div>
                    @if ($errors->has('protetico')) 
                        <h6> <span class="help-block"> {{ $errors->first('protetico') }} </span> </h6>
                    @endif
                @else
                    <strong> {{$procedimento->protetico ? 'Sim' : 'Não'}} </strong>
                @endif
            </div>
        </div>

    </div>
</div>