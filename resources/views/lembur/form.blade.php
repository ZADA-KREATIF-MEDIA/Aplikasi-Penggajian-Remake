<div class="form-group">
    {!! Form::label('user_id', 'Karyawan') !!}
    <select name="user_id" class="{!! $errors->has('user_id') ? 'form-control is-invalid' : $errors->has('user_id') ? 'form-control is-invalid' : 'form-control' !!}">
        @foreach (App\User::where('level','karyawan')->get() as $row)
        <option value="{!! $row->id !!}">{!! $row->nip !!} ({!! $row->name !!})</option>
        @endforeach
    </select>
    @if ($errors->has('user_id'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('user_id') }}</strong>
    </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal') !!}
    {!! Form::date('tanggal', Carbon\Carbon::now(), ['class' => $errors->has('tanggal') ? 'form-control is-invalid' : $errors->has('tanggal') ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('tanggal'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('tanggal') }}</strong>
    </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('lama_lembur', 'Lama Lembur') !!}
    {!! Form::select('lama_lembur', ['1'=>'1 Jam', '2'=>'2 Jam', '3'=>'3 Jam', '4'=>'4 Jam', '5'=>'5 Jam', '6'=>'6 Jam', '7'=>'7 Jam', '8'=>'8 Jam'], null, ['class' => $errors->has('lama_lembur') ? 'form-control is-invalid' : $errors->has('lama_lembur') ? 'form-control is-invalid' : 'form-control', 'placeholder'=> '']) !!}
    @if ($errors->has('lama_lembur'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('lama_lembur') }}</strong>
    </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan') !!}
    {!! Form::text('keterangan', 'Lembur..', ['class' => $errors->has('keterangan') ? 'form-control is-invalid' : $errors->has('keterangan') ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('keterangan'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('keterangan') }}</strong>
    </span>
    @endif
</div>