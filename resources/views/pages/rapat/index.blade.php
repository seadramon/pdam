@extends('layouts.main')

@section('title', 'Rapat')

@section('content')
	<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            	<h3 class="box-title">List</h3>

              	<div class="box-tools">
                	<div class="input-group input-group-sm" style="width: 150px;">
	                  	<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  	<div class="input-group-btn">
	                    	<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  	</div>
                	</div>
              	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <?php 
                $no = 1;
                ?>
	            <table class="table table-hover">
	                <tr>
                  		<th>No</th>
                  		<th>Tanggal</th>
                  		<th>Tempat</th>
                  		<th>Pimpinan</th>
                        <th>Acara</th>
                        <th>Status</th>
                        <th>Menu</th>
	                </tr>
	                @foreach($data as $row)
		                <tr>
		                  	<td>{{ $no++ }}</td>
		                  	<td>{{ $row['tanggal'] }}</td>
		                  	<td>{{ $row['tempat'] }}</td>
		                  	<td>{{ $row['pimpinan'] }}</td>
                            <td>{{ $row['acara'] }}</td>
                            <td>
                                @if ( $row['recid_status'] == '2') 
                                    {{ 'Valid' }}
                                @else
                                    {{ 'Batal' }}
                                @endif
                            </td>
		                  	<td>
                                <a class="btn btn-small btn-primary" href="{{ URL::to('rapat/lihat/'. $row['recid_undangan']) }}" target="_blank">Lihat</a>
		                  	</td>
		                  	<!-- <span class="label label-success">Approved</span> -->
		                </tr>
		            @endforeach
	            </table>
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </div>
</div>
@endsection