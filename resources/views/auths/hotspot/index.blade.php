@extends('auths.layouts.app')
@section('title', 'HOTSPOT AGENT')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Agen Hotspot</i></small></h2>
	        <a href="{{route('hotspot.create')}}" class="btn btn-success btn-sm" style="float: right;">Tambah Pelanggan Baru</a>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>#</th>
	              <th>Nama</th>
	              <th>Titik Agen</th>
	              <th>Total Pengambilan</th>
	              <th>Penerimaan Terakhir</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($hotspot as $hotspot)
            		<tr>
            			<td>{{$loop->iteration}}</td>
            			<td>{{$hotspot->name}}</td>
            			<td>{{$hotspot->agent_point}}</td>
            			<td>{{$hotspot->stock->count()}}</td>
            			<td>-</td>
            			<td>
			              	<a href="{{url(config('app.root').'/hotspot/'.$hotspot->id.'/stock')}}"><spane class="badge badge-warning">pengambilan stok</span></a><form method="post" action="{{ route('hotspot').'/'.$hotspot->id }}" style="display:inline;">
			              	<a href="{{ route('hotspot').'/'.$hotspot->id.'/edit' }}" title="ubah"><spane class="badge badge-success">edit</span></a><form method="post" action="{{ route('hotspot').'/'.$hotspot->id }}" style="display:inline;">
            					@method('DELETE')
            					@csrf
            				<button type="submit" class="" style="background-color: transparent; border:none;" onclick="return confirm('Apakan anda yakin?')" style="border: none;"><span class="badge badge-danger">hapus</span></button>
            				</form>
			            </td>
            		</tr>
            	@endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
@endsection