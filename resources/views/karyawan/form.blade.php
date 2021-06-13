<div class="form-group">
	{!! Form::label('nip', 'Nip Karyawan') !!}
	{!! Form::text('nip', null, ['class' => $errors->has('nip') ? 'form-control is-invalid' : $errors->has('nip') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Nip Karyawan', 'maxlength'=>8]) !!}
	@if ($errors->has('nip'))
	<span class="text-danger">
		<strong>{{ $errors->first('nip') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('name', 'Nama') !!}
	{!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Nama']) !!}
	@if ($errors->has('name'))
	<span class="text-danger">
		<strong>{{ $errors->first('name') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('pendidikan', 'Pendidikan') !!}
	{!! Form::text('pendidikan', null, ['class' => $errors->has('pendidikan') ? 'form-control is-invalid' : $errors->has('pendidikan') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Pendidikan']) !!}
	@if ($errors->has('pendidikan'))
	<span class="text-danger">
		<strong>{{ $errors->first('pendidikan') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('kota_lahir', 'Kota lahir') !!}
	{!! Form::text('kota_lahir', null, ['class' => $errors->has('kota_lahir') ? 'form-control is-invalid' : $errors->has('kota_lahir') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Kota lahir']) !!}
	@if ($errors->has('kota_lahir'))
	<span class="text-danger">
		<strong>{{ $errors->first('kota_lahir') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('tgl_lahir', 'Tanggal Lahir') !!}
	{!! Form::date('tgl_lahir', \Illuminate\Support\Carbon::now()->addYear(-30), ['class' => $errors->has('tgl_lahir') ? 'form-control is-invalid' : $errors->has('tgl_lahir') ? 'form-control is-invalid' : 'form-control']) !!}
	@if ($errors->has('tgl_lahir'))
	<span class="text-danger">
		<strong>{{ $errors->first('tgl_lahir') }}</strong>
	</span>
	@endif
</div>


<div class="form-group">
	{!! Form::label('jk', 'Jenis Kelamin') !!}
	{!! Form::select('jk', ['Laki-Laki'=>'Laki-Laki', 'Perempuan'=>'Perempuan'], isset($jk) ? $karyawan->jk : null, ['class' => $errors->has('jk') ? 'form-control is-invalid' : $errors->has('jk') ? 'form-control is-invalid' : 'form-control', 'placeholder'=>'']) !!}
	@if ($errors->has('jk'))
	<span class="text-danger">
		<strong>{{ $errors->first('jk') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('agama', 'Agama') !!}
	{!! Form::select('agama', ['Islam'=>'Islam', 'Kristen'=>'Kristen', 'Katholik'=>'Katholik', 'Hindu'=>'Hindu', 'Budha'=>'Budha'], isset($agama) ? $karyawan->agama : null, ['class' => $errors->has('agama') ? 'form-control is-invalid' : $errors->has('agama') ? 'form-control is-invalid' : 'form-control', 'placeholder'=>'']) !!}
	@if ($errors->has('agama'))
	<span class="text-danger">
		<strong>{{ $errors->first('agama') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('alamat', 'Alamat') !!}
	{!! Form::textarea('alamat', null, ['class' => $errors->has('alamat') ? 'form-control is-invalid' : $errors->has('alamat') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Alamat', 'rows' => '3']) !!}
	@if ($errors->has('alamat'))
	<span class="text-danger">
		<strong>{{ $errors->first('alamat') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('jabatan', 'Jabatan') !!}
	{!! Form::select('jabatan_id', App\Jabatan::pluck('name', 'id'), null, ['class' => $errors->has('jabatan_id') ? 'form-control is-invalid' : $errors->has('jabatan_id') ? 'form-control is-invalid' : 'form-control', 'placeholder'=>'']) !!}
	@if ($errors->has('jabatan_id'))
	<span class="text-danger">
		<strong>{{ $errors->first('jabatan_id') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	{!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Email']) !!}
	@if ($errors->has('email'))
	<span class="text-danger">
		<strong>{{ $errors->first('email') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('password', 'Password') !!}
	{!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : $errors->has('password') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Password']) !!}
	@if ($errors->has('password'))
	<span class="text-danger">
		<strong>{{ $errors->first('password') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::label('password_confirmation', 'Confirm Password') !!}
	{!! Form::password('password_confirmation', ['class' => $errors->has('password_confirmation') ? 'form-control is-invalid' : $errors->has('password_confirmation') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Confirm Password']) !!}
	@if ($errors->has('password_confirmation'))
	<span class="text-danger">
		<strong>{{ $errors->first('password_confirmation') }}</strong>
	</span>
	@endif
</div>