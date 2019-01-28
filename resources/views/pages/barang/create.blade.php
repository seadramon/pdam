@extends('layouts.main')

@section('title', 'Barang')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
		    <div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title">Add</h3>
		        </div>
		        @foreach($errors->barang_store->all() as $error)
			        <p class="alert alert-danger">{{$error}}</p>
			    @endforeach
			    
			    @if(null !== Session::get('failed'))
			        <p class="alert alert-danger">{{ Session::get('failed') }}</p>
			    @endif

			    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
		        <!-- /.box-header -->
		        <!-- form start -->
		        @if (isset($barang))
	                {!! Form::model($barang, ['url'=>URL::route('barang.update', $id), 'autocomplete'=>'off', 'files' => true, 'method' => 'PUT']) !!}
	                {!! Form::hidden('id', null) !!}
	            @else
	                {!! Form::open(['url'=>URL::route('barang.store'), 'autocomplete'=>'off', 'files' => true]) !!}
	            @endif
		      		<div class="box-body">
		        		<div class="form-group">
		        			<label for="category">Category</label>
		        			{!! Form::select("category_id", $cats, null, ['id'=>'category_id', 'class'=>'form-control']); !!}
		        		</div>
		        		<div class="form-group">
		          			<label for="name">Nama Barang</label>
		          			{!! Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'Nama']) !!}
		        		</div>
		        		<div class="form-group">
		          			<label for="name">Jumlah</label>
		          			{!! Form::number('jumlah', null, ['class'=>'form-control', 'placeholder'=>'jumlah']) !!}
		        		</div>
		      		</div>
		      		<!-- /.box-body -->

		      		<div class="box-footer">
		        		<button type="submit" class="btn btn-primary">Submit</button>
		        		<a href="{{ URL::to('barang') }}" class="btn btn-danger">Cancel</a>
		      		</div>
		        {{ Form::close() }}
		    </div>
		    <!-- /.box -->	
		</div>
	</div>
@endsection