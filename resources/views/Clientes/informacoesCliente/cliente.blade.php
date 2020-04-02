<form>
    {{ csrf_field() }}
    
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNome">*Nome</label>
                <input type="text" class="form-control" id="inputNome">
            </div>
       
            <div class="form-group col-md-3">
                <label for="inputCpf">*CPF</label>
                <input type="text" class="form-control cpfMask" id="inputCpf">
            </div>
            <div class="form-group col-md-3">
                <label for="inputRg">RG</label>
                <input type="text" class="form-control" id="inputRg">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputDataNascimento">*Data Nascimento</label>
                <input type="date" class="form-control" id="inputDataNascimento">
            </div>
            <div class="form-group col-md-3">
                <label for="inputSexo">*Sexo</label>
                <select id="inputSexo" class="form-control">
                    <option value="f"> Femenino </option>
                    <option value="m"> Masculino </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEstadoCivil">*Estado Civil</label>
                <select id="inputEstadoCivil" class="form-control">
                    <option value="1"> Solteiro(a) </option>
                    <option value="2"> Casado(a) </option>
                    <option value="3"> Separado(a) </option>
                    <option value="4"> Divórciado(a) </option>
                    <option value="5"> Viúvo(a) </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputSexo">*Nacionalidade</label>
                <select id="inputSexo" class="form-control">
                    <option value="1"> Brasileiro(a) </option>
                    <option value="2"> Estrangeiro(a) </option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputFoneTrabalho">*Celular Titular <i title="ATENÇÃO: Este número será usado na cobrança, tenha certeza que é do titular" style="cursor:pointer" class="zmdi zmdi-help-outline zmdi-hc-fw"> </i> </label>
                <input type="text" class="form-control celularMask" id="inputFoneTrabalho">
            </div>
            <div class="form-group col-md-4">
                <label for="inputFoneTrabalho">Celular Recado</label>
                <input type="text" class="form-control" id="inputFoneTrabalho" placeholder="Ex: Fulano 42999999999">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputProfissao">Profissão</label>
                <input type="text" class="form-control" id="inputProfissao">
            </div>
            <div class="form-group col-md-4">
                <label for="inputTrabalho">Trabalho</label>
                <input type="text" class="form-control" id="inputTrabalho">
            </div>
            <div class="form-group col-md-4">
                <label for="inputFoneTrabalho">Telefone Trabalho</label>
                <input type="text" class="form-control" id="inputFoneTrabalho">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputRendaMedia">Renda Média</label>
                <input type="text" class="form-control valorMask" id="inputRendaMedia">
            </div>
            <div class="form-group col-md-4">
                <label for="inputResidencia">Residência</label>
                <select id="inputResidencia" class="form-control">
                    <option value="1"> Própria </option>
                    <option value="2"> Alugada </option>
                    <option value="3"> Outros </option>
                </select>
            </div>
        </div>

        <hr class="dashed">
        <div class="form-group">
            <label for="inputNomeMae">Nome da Mãe</label>
            <input type="text" class="form-control" id="inputNomeMae">
        </div>
        
        <hr class="dashed">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEstado">*Estado</label>
                <select id="inputEstado" class="form-control">
                    <option value="f"> Paraná </option>
                    <option value="m"> Santa Catarina </option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCidade">*Cidade</label>
                <select id="inputCidade" class="form-control">
                    <option value="f"> Ponta Grossa </option>
                    <option value="m"> Palmeira </option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCep">*CEP</label>
                <input type="text" class="form-control cepMask" id="inputCep">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputLogradouro">*Logradouro</label>
                <input type="text" class="form-control" id="inputLogradouro">
            </div>
            <div class="form-group col-md-3">
                <label for="inputNumero">*Número</label>
                <input type="text" class="form-control" id="inputNumero">
            </div>
            <div class="form-group col-md-3">
                <label for="inputBairro">*Bairro</label>
                <input type="text" class="form-control" id="inputBairro">
            </div>
        </div>

        <div class="form-group">
            <label for="inputComplemento">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento">
        </div>

        <hr class="dashed">
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" rows="3"></textarea>
        </div>
    </div>

    <div class="card-footer bg-light text-right">
        <div class="form-actions">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-rounded">Salvar</button>
                    <button class="btn btn-light btn-rounded btn-outline">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>