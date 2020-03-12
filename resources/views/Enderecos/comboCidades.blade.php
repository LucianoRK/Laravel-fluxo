<label class="control-label text-right col-md-3">Cidades</label>
<div class="col-md-6">
    <select id="cidade" name="cidade" value="{{ old('cidade') }}" class="form-control">
        @if ($cidades)
            @foreach($cidades as $cidade)
                <option value="{{ $cidade->id }}"> {{ $cidade->nome }} </option>
            @endforeach
        @endif
    </select>
    @if ($errors->has('cidade')) 
        <h6> <span class="help-block"> {{ $errors->first('cidade') }} </span> </h6>
    @endif
</div>