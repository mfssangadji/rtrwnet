@extends('auths.layouts.app')
@section('title', 'PACKET')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Packet Berlangganan</i></small></h2>
	        <a href="{{route('packet.create')}}" class="btn btn-success btn-sm" style="float: right;">Tambah Baru</a>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Nama Packet</th>
	              <th>Harga</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($packet as $packet)
            		<tr>
            			<td>{{$loop->iteration}}</td>
            			<td>{{$packet->packet_name}}</td>
            			<td>Rp. {{number_format($packet->price)}}</td>
	            		<td>
			              	<a href="{{ route('packet').'/'.$packet->id.'/edit' }}" title="ubah"><spane class="badge badge-success">edit</span></a><form method="post" action="{{ route('packet').'/'.$packet->id }}" style="display:inline;">
            					@method('DELETE')
            					@csrf
            				<button type="submit" style="background-color: transparent; border:none" onclick="return confirm('Apakan anda yakin?')" style="border: none;"><span class="badge badge-danger">hapus</span></button>
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