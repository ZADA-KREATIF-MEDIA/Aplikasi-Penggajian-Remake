

    <!DOCTYPE html>
    <html>
    <head>
        <title>Slip Gaji</title>
    </head>
    <body onload="window.print()">
        <center>
        <div class="text-center">
            {!! config('app.name') !!} 
        </div>
        </center>
    
        <hr>
        <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>tanggal</th>
                        <th>gaji bersih</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $key => $row)
                    
                    <tr class="tr-shadow">
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! $row->user->name !!}</td>
                        <td>{!! $row->created_at !!}</td>
                        <td>{!! number_format($row->gaji_bersih) !!}</td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td>{{ $laporan->sum('gaji_bersih') }}</td>
                    </tr>
                </tfoot>
   
        </table>
    
    
    </body>
    </html>