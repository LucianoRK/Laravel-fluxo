<div class="card-body">
    {{ csrf_field() }}

    <div class="form-body">
        <div class="form-group row {{ $errors->has('descricao') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Descrição</label>
            <div class="col-md-6">
                <input name="descricao" value="{{$feriado->descricao ?? old('descricao') }}" type="text" class="form-control">
                @if ($errors->has('descricao')) 
                    <h6> <span class="help-block"> {{ $errors->first('descricao') }} </span> </h6>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('data') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Data</label>
            <div class="col-md-6">
                <input name="data" type="date" value="{{ $feriado->data ?? old('data') }}" type="text" class="form-control">
                <input name="data_hoje" hidden type="date" value="{{ date('Y-m-d') }}" type="text" class="form-control">
                @if ($errors->has('data')) 
                    <h6> <span class="help-block"> {{ $errors->first('data') }} </span> </h6>
                @endif
            </div>
        </div>
    </div>
</div>