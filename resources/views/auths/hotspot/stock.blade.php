@extends('auths.layouts.app')
@section('title', 'HOTSPOT AGENT STOCK')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Pengambilan Stok Agen: <strong>{{$hotspot->name}} - {{$hotspot->agent_point}}</strong></i></small></h2>
	        <a onclick="self.history.back()" class="btn btn-primary btn-sm" style="float: right; color: #FFF; cursor: pointer;">Kembali</a>
	        <a href="{{url(config('app.root').'/hotspot/'.$id.'/stock/create')}}" class="btn btn-success btn-sm" style="float: right; color: #FFF; cursor: pointer;">Tambah Pengambilan</a>
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
	              <th>Status</th>
	              <th>QTY</th>
	              <th>Voucher</th>
	              <th>Satuan</th>
	              <th>Total Biaya</th>
	              <th>Keterangan</th>
	              <th>Tanggal Pengambilan</th>
	              <th>Jumlah Setor</th>
	              <th>Tanggal Setor</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($hotspot->stock as $stock)
            		<tr>
            			<td>{{$loop->iteration}}</td>
            			@if(isset($stock->setor))
	            			@if($stock->setor->count()>0)
	            				<td><span class="badge badge-success">Lunas</span>
	            					<a href="{{url(config('app.root').'/hotspot/'.Request::segment(3).'/'.Request::segment(4).'/'.$stock->id.'/reset')}}" onclick="return confirm('Apakah anda yakin?')"><span class="badge badge-danger">Reset</span></a></td>
	            			@endif
	            		@else
	            			<td>-</td>
	            		@endif
            			<td>{{$stock->qty}}</td>
            			<td>{{$stock->voucher->name}}</td>
            			<td>Rp. {{number_format($stock->voucher->price)}}</td>
            			<td>Rp. {{number_format($stock->cost)}}</td>
            			<td>{{$stock->description}}</td>
            			<td>{{$stock->created_at->format('d F Y')}}</td>
            			@if(isset($stock->setor))
            				<td>{{$stock->setor->jumlah_setor}}</td>
            				<td>{{date('d F Y', strtotime($stock->setor->tanggal_setor))}}</td>
            			@else
            				<td>-</td>
            				<td>-</td>
            			@endif
            			<td>
			              	@if(!isset($stock->setor))
			              		<a href="{{url(config('app.root').'/hotspot/'.$hotspot->id.'/stock/'.$stock->id.'/setor')}}" title="Setor Pengambilan"><span class="badge badge-warning">setor pengambilan</span></a>
			              	@endif
			              	<a href="{{url(config('app.root').'/hotspot/'.$hotspot->id.'/stock/'.$stock->id.'/invoice')}}" title="Cetak Invoice"><span class="badge badge-info">cetak invoice</span></a>
			              	<a href="{{url(config('app.root').'/hotspot/'.$hotspot->id.'/stock/'.$stock->id.'/edit')}}" title="ubah"><span class="badge badge-success">edit</span></a>
			              	<form method="post" action="{{url(config('app.root').'/hotspot/'.$hotspot->id.'/stock/'.$stock->id)}}" style="display:inline;">
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