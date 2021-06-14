<div class="form-group">
    {!! Form::label('name', 'Nama') !!}
    {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Nama']) !!}
    @if ($errors->has('name'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif

</div>

<div class="form-group">
    {!! Form::label('gapok', 'Gaji Pokok') !!}
    {!! Form::number('gapok', null, ['class' => $errors->has('gapok') ? 'form-control is-invalid' : $errors->has('gapok') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Gaji Pokok (Rp)', 'autocomplete' => 'off']) !!}
    @if ($errors->has('gapok'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('gapok') }}</strong>
    </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('tunjangan', 'Tunjangan Jabatan') !!}
    {!! Form::number('tunjangan', null, ['class' => $errors->has('tunjangan') ? 'form-control is-invalid' : $errors->has('tunjangan') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Tunjangan (Rp)', 'autocomplete' => 'off']) !!}
    @if ($errors->has('tunjangan'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('tunjangan') }}</strong>
    </span>
    @endif

</div>

<div class="form-group">
    <label>Tunjangan Makan</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" value="Rp 10,000" disabled>
</div>

<div class="form-group">
    {!! Form::label('lembur', 'Lembur') !!}
    {!! Form::number('lembur', null, ['class' => $errors->has('lembur') ? 'form-control is-invalid' : $errors->has('lembur') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Lembur (Rp) *PerJam', 'autocomplete' => 'off']) !!}
    @if ($errors->has('lembur'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('lembur') }}</strong>
    </span>
    @endif
</div>