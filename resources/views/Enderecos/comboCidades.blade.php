<select id="cidade" name="cidade" value="{{$endereco->fk_cidade ?? old('cidade') }}" class="form-control">
    <option selected disabled value=""> Selecione uma cidade </option>
    @if ($cidades)
        @foreach($cidades as $cidade)
            @if (isset($cidade_edit) && $cidade_edit == $cidade->id)
                <option selected value="{{ $cidade->id }}"> {{ $cidade->nome }} </option>
            @else
                <option value="{{ $cidade->id }}"> {{ $cidade->nome }} </option>
            @endif
        @endforeach
    @endif
</select>
@if ($errors->has('cidade')) 
    <h6> <span class="help-block"> {{ $errors->first('cidade') }} </span> </h6>
@endif