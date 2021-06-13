<!DOCTYPE html>
<html>

<head>
	<title>Slip Gaji</title>
</head>

<body onload="window.print()">
	<center>
		<div class="text-center">
			<img src="{{ URL::to('/') }}/images/logo.png" alt="logo" style="width: 200px; background:black;">
			<h3>CV BANYU BIRU</h3>
			<h4>SLIP GAJI KARYAWAN</h4>
		</div>
	</center>

	<hr>
	<table width="100%">
		<tr>
			<td>
				<label class="col-md-4">Nip Karyawan</label>
			</td>
			<td> : </td>
			<td>{!! $karyawan->nip !!}</td>
			<td>
				<label class="col-md-4">Jabatan</label>
			<td> : </td>
			<td>{!! $karyawan->jabatan->name !!}</td>

		</tr>
		<tr>
			<td>
				<label class="col-md-4">Nama Karyawan</label>
			</td>
			<td> : </td>
			<td>{!! $karyawan->name !!}</td>

		</tr>
	</table>
	<br>
	</table>
	<table width="100%">
		<tr>
			<th width="5%" align="left">No</th>
			<th align="left">Keterangan</th>
			<th align="right">Jumlah</th>
			<th width="1px"></th>
		</tr>
		<tr>
			<td>1.</td>
			<td>Gaji Pokok</td>
			<td align="right">Rp. {!! number_format($karyawan->jabatan->gapok) !!}</td>
			<td></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Tunjangan</td>
			<td align="right">Rp. {!! number_format($karyawan->jabatan->tunjangan) !!}</td>
			<td></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>Lembur</td>
			<td align="right">Rp. {!! number_format($karyawan->jabatan->lembur * $lembur ) !!}</td>
			<td></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>Jumlah Jam Lembur </td>
			<td align="right">{!! $lembur !!} Jam</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<hr>
			</td>
			<td>(+)</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td align="right">Rp. {!! number_format($karyawan->jabatan->gapok + $karyawan->jabatan->tunjangan + ($karyawan->jabatan->lembur * $lembur)) !!}</td>
			<td></td>
		</tr>
		<tr>
			<td>4.</td>
			<td>Potongan Kehadiran(26 hari - {{$masuk}} hari = {{26-$masuk}} hari)</td>
			<td align="right">Rp. {!! number_format($karyawan->jabatan->gapok-($masuk*($karyawan->jabatan->gapok/26))) !!}</td>
			<td></td>
		</tr>


		<tr>
			<td></td>
			<td></td>
			<td>
				<hr>
			</td>
			<td>(-)</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td align="right">Rp. {!! number_format(($karyawan->jabatan->gapok + $karyawan->jabatan->tunjangan + ($karyawan->jabatan->lembur * $lembur))-($karyawan->jabatan->gapok-($masuk*($karyawan->jabatan->gapok/26)))) !!}</td>
			<td></td>
		</tr>

		<tfoot>

		</tfoot>
	</table>
	<br>
	<br>
	<br>
	<table width="100%">
		<tr>
			<td width="50%">
				Penerima <br><br><br><br>
				{!! $karyawan->name !!}
			</td>
			<td width="50%" align="right">
				{!! \Carbon\Carbon::now()->format('d F Y') !!}<br><br><br><br>
				Slip Gaji
			</td>
		</tr>
	</table>


</body>

</html>