<section class="page-content container-fluid">
    <div class="row">
        @foreach($tratamentos as $tratamento)
            @if ($tratamento['fk_especialidade'] == 1)
                <div class="col-sm-12 col-md-6 col-xl-3">
                    <div class="card" style="background: #F0F6FF; border-style: dotted">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"> 
                                    <strong class="text-primary">Paciente: </strong> {{ $tratamento['nome_paciente'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-primary">Tratamento: </strong> {{ $tratamento['id'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-primary">Especialidade:</strong> {{ $tratamento['nome_especialidade'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-primary">Data Cadastro:</strong> {{ $tratamento['created_at'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-primary">Data Efetivação:</strong> {{ $tratamento['data_efetivacao'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-primary">Profissional:</strong> {{ $tratamento['nome_profissional'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-primary">Valor Total:</strong> {{ $tratamento['valor_atual'] }}
                                </h4>

                                <div class="text-center">
                                    <a href="#" class="btn btn-primary">Ver tratamento</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($tratamento['fk_especialidade'] == 2)
                <div class="col-sm-12 col-md-6 col-xl-3">
                    <div class="card" style="background: #F0F6FF; border-style: dotted">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"> 
                                    <strong class="text-warning">Paciente: </strong> {{ $tratamento['nome_paciente'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-warning">Tratamento: </strong> {{ $tratamento['id'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-warning">Especialidade:</strong> {{ $tratamento['nome_especialidade'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-warning">Data Cadastro:</strong> {{ $tratamento['created_at'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-warning">Data Efetivação:</strong> {{ $tratamento['data_efetivacao'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-warning">Profissional:</strong> {{ $tratamento['nome_profissional'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-warning">Valor Total:</strong> {{ $tratamento['valor_atual'] }}
                                </h4>

                                <div class="text-center">
                                    <a style="color: white;" href="#" class="btn btn-warning">Ver tratamento</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($tratamento['fk_especialidade'] == 3)
                <div class="col-sm-12 col-md-6 col-xl-3">
                    <div class="card" style="background: #F0F6FF; border-style: dotted">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"> 
                                    <strong class="text-accent">Paciente: </strong> {{ $tratamento['nome_paciente'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-accent">Tratamento: </strong> {{ $tratamento['id'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-accent">Especialidade:</strong> {{ $tratamento['nome_especialidade'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-accent">Data Cadastro:</strong> {{ $tratamento['created_at'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-accent">Data Efetivação:</strong> {{ $tratamento['data_efetivacao'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-accent">Profissional:</strong> {{ $tratamento['nome_profissional'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-accent">Valor Total:</strong> {{ $tratamento['valor_atual'] }}
                                </h4>

                                <div class="text-center">
                                    <a href="#" class="btn btn-accent">Ver tratamento</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($tratamento['fk_especialidade'] == 4)
                <div class="col-sm-12 col-md-6 col-xl-3">
                    <div class="card" style="background: #F0F6FF; border-style: dotted">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"> 
                                    <strong class="text-success">Paciente: </strong> {{ $tratamento['nome_paciente'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-success">Tratamento: </strong> {{ $tratamento['id'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-success">Especialidade:</strong> {{ $tratamento['nome_especialidade'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-success">Data Cadastro:</strong> {{ $tratamento['created_at'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-success">Data Efetivação:</strong> {{ $tratamento['data_efetivacao'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-success">Profissional:</strong> {{ $tratamento['nome_profissional'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-success">Valor Total:</strong> {{ $tratamento['valor_atual'] }}
                                </h4>

                                <div class="text-center">
                                    <a style="color: white;" href="#" class="btn btn-success">Ver tratamento</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($tratamento['fk_especialidade'] == 5)
                <div class="col-sm-12 col-md-6 col-xl-3">
                    <div class="card" style="background: #F0F6FF; border-style: dotted">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"> 
                                    <strong class="text-info">Paciente: </strong> {{ $tratamento['nome_paciente'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-info">Tratamento: </strong> {{ $tratamento['id'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-info">Especialidade:</strong> {{ $tratamento['nome_especialidade'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-info">Data Cadastro:</strong> {{ $tratamento['created_at'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-info">Data Efetivação:</strong> {{ $tratamento['data_efetivacao'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-info">Profissional:</strong> {{ $tratamento['nome_profissional'] }}
                                </h4>
                                <h4 class="card-title"> 
                                    <strong class="text-info">Valor Total:</strong> {{ $tratamento['valor_atual'] }}
                                </h4>

                                <div class="text-center">
                                    <a style="color: white;" href="#" class="btn btn-info">Ver tratamento</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>