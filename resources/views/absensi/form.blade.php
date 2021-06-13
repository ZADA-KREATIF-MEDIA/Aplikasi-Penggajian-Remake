<div class="form-group">
    {!! Form::label('user_id', 'Karyawan') !!}
    <select name="user_id" class="{!! $errors->has('user_id') ? 'form-control is-invalid' : $errors->has('user_id') ? 'form-control is-invalid' : 'form-control' !!}">
        @foreach (App\User::role('karyawan')->get() as $row)
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
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', ['Masuk'=>'Masuk', 'Ijin'=>'Ijin','Sakit'=>'Sakit'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : $errors->has('status') ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('status'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('status') }}</strong>
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

<div class="form-group row">
    {!! Form::label('jam_masuk', 'Jam Masuk') !!}
    {!! Form::time('jam_masuk', null, ['class' => $errors->has('jam_masuk') ? 'form-control is-invalid' : $errors->has('jam_masuk') ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('jam_masuk'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('jam_masuk') }}</strong>
    </span>
    @endif
</div>

<div class="form-group row">
    {!! Form::label('jam_keluar', 'Jam Keluar') !!}
    {!! Form::time('jam_keluar', \Illuminate\Support\Carbon::now(), ['class' => $errors->has('jam_keluar') ? 'form-control is-invalid' : $errors->has('jam_keluar') ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('jam_keluar'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('jam_keluar') }}</strong>
    </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan') !!}
    {!! Form::text('keterangan', 'alasan..', ['class' => $errors->has('keterangan') ? 'form-control is-invalid' : $errors->has('keterangan') ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('keterangan'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('keterangan') }}</strong>
    </span>
    @endif

</div>