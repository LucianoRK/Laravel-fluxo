@if($dependentes)
    @foreach($dependentes as $dependente)
        <h1 class="card-header"> 
            <span class="align-middle text-primary">
                [{{$dependente['tipo_dependente']}}]
            </span>
        </h1>
        <form action="{{ route('dependentes.update', $dependente->id)}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">*Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="nome" value="{{$dependente->nome ?? old('nome')}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputCpf">*CPF</label>
                        <input type="text" class="form-control cpfMask" id="inputCpf" name="cpf" value="{{$dependente->cpf ?? old('cpf')}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputRg">RG</label>
                        <input type="text" class="form-control" id="inputRg" name="rg" value="{{$dependente->rg ?? false}}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputDataNascimento">*Data Nascimento</label>
                        <input type="date" class="form-control" id="inputDataNascimento" name="data_nascimento" value="{{$dependente->data_nascimento ?? false}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputSexo">*Sexo</label>
                        <select id="inputSexo" class="form-control" name="sexo">
                            <option {{$dependente->femenino ? 'selected' : '' }} value="femenino"> Femenino </option>
                            <option {{$dependente->masculino ? 'selected' : '' }} value="masculino"> Masculino </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNacionalidade">*Nacionalidade</label>
                        <select id="inputNacionalidade" class="form-control" name="nacionalidade">
                            @if ($dependente->nacionalidade == 'brasileiro')
                                <option value="brasileiro"> Brasileiro(a) </option>
                            @elseif ($dependente->nacionalidade == 'estrangeiro'))
                                <option value="estrangeiro"> Estrangeiro(a) </option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCelular">*Celular </label>
                        <input type="text" class="form-control celularMask" id="inputCelular" name="cel_dependente" value="{{$dependente->cel_dependente ?? false}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" value="{{$dependente->email ?? false}}">
                    </div>
                </div>

                <hr class="dashed">
                <div class="form-group">
                    <label for="observacoes">Observações</label>
                    <textarea class="form-control" id="observacoes" name="obs_cadastro" rows="3"> {{$dependente->obs_cadastro ?? false}} </textarea>
                </div>
            </div>

            <div class="card-footer bg-light text-right">
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-rounded">Salvar</button>
                            <a href="{{ url("/") }}" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endif