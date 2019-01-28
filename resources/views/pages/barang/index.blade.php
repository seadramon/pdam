@extends('layouts.main')

@section('title', 'Barang')

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
                  		<th>Nama</th>
                  		<th>Category</th>
                  		<th>Pic</th>
                        <th>Created</th>
	                </tr>
	                @foreach($data as $row)
		                <tr>
		                  	<td>{{ $no++ }}</td>
		                  	<td>{{ $row->nama }}</td>
		                  	<td>{{ $row->category()->pluck('nama')->first() }}</td>
		                  	<td>{{ $row->pic }}</td>
                            <td>{{ $row->created_at }}</td><!-- 
		                  	<td>
                                <a class="btn btn-small btn-primary" href="{{ URL::to('rapat/lihat/'. $row['recid_undangan']) }}" target="_blank">Lihat</a>
		                  	</td> -->
		                  	<!-- <span class="label label-success">Approved</span> -->
		                </tr>
		            @endforeach
	            </table>
                {{ $data->links() }}
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </div>
</div>
@endsection