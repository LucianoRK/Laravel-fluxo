<form>
    {{ csrf_field() }}

    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNomeConjuge">*Nome</label>
                <input type="text" class="form-control" id="inputNomeConjuge">
            </div>
        
            <div class="form-group col-md-3">
                <label for="inputCpfConjuge">*CPF</label>
                <input type="text" class="form-control cpfMask" id="inputCpfConjuge">
            </div>
            <div class="form-group col-md-3">
                <label for="inputRgConjuge">RG </label>
                <input type="text" class="form-control" id="inputRgConjuge">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputDataNascimentoConjuge">*Data Nascimento</label>
                <input type="date" class="form-control" id="inputDataNascimento">
            </div>
            <div class="form-group col-md-3">
                <label for="inputSexoConjuge">*Sexo</label>
                <select id="inputSexoConjuge" class="form-control">
                    <option value="f"> Femenino </option>
                    <option value="m"> Masculino </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputNacionalidadeConjuge">*Nacionalidade</label>
                <select id="inputNacionalidadeConjuge" class="form-control">
                    <option value="1"> Brasileiro(a) </option>
                    <option value="2"> Estrangeiro(a) </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputCelularConjuge">*Celular</label>
                <input type="text" class="form-control celularMask" id="inputCelularConjuge">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputProfissaoConjuge">Profissão</label>
                <input type="text" class="form-control" id="inputProfissao">
            </div>
            <div class="form-group col-md-3">
                <label for="inputRendaMediaConjuge">Renda Média</label>
                <input type="text" class="form-control valorMask" id="inputRendaMediaConjuge">
            </div>
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