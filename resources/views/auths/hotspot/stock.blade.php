@extends('auths.layouts.app')
@section('title', 'HOTSPOT AGENT STOCK')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Pengambilan Stok Agen: <strong>{{$hotspot->name}} - {{$hotspot->agent_point}}</strong></i></small></h2>
	        <a onclick="self.history.back()" class="btn btn-primary btn-sm" style="float: right; color: #FFF; cursor: pointer;">Kembali</a>
	        <!-- <a href="{{url(config('app.root').'/customers/'.$id.'/pembayaran/create')}}" class="btn btn-success btn-sm" style="float: right;">Input Pembayaran</a> -->
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>QTY Pengambilan</th>
	              <th>Total Biaya</th>
	              <th>Keterangan</th>
	              <th>Tanggal</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($hotspot->stock as $stock)
            		<tr>
            			<td>{{$loop->iteration}}</td>
            			<td>{{$stock->qty}}</td>
            			<td>Rp. {{number_format($stock->cost)}}</td>
            			<td>{{$stock->desription}}</td>
            			<td>{{$stock->created_at->format('d F Y')}}</td>
            			<td>
			              	<a href="#" title="ubah"><spane class="badge badge-success">edit</span></a><form method="post" action="#" style="display:inline;">
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