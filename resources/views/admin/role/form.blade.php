<div class="form-group">
	{!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="alias">Alias</label>
    <select name="alias" id="alias" class="form-control">
        <option value="admin">Admin</option>
        <option value="karyawan">Karyawan</option>
    </select>
</div>