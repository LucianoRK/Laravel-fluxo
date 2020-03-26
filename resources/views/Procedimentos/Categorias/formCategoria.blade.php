<div class="card-body">
    {{ csrf_field() }}
    
    <div class="form-body">
        <div class="form-group row {{ $errors->has('nome_categoria') ? 'has-error' : '' }}">
            <label class="control-label text-right col-md-3">*Nome Categoria</label>
            <div class="col-md-6">
                <input name="nome_categoria" value="{{$categoria->nome_categoria ?? old('nome_categoria') }}" type="text" class="form-control">
                @if ($errors->has('nome_categoria')) 
                    <h6> <span class="help-block"> {{ $errors->first('nome_categoria') }} </span> </h6>
                @endif
            </div>
        </div>
    </div>
</div>