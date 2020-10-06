@extends('auths.layouts.app')
@section('title', 'PAYMENT')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Pembayaran Pelanggan: <strong>{{$invoice->last()->customer->name}}, {{$invoice->last()->customer->address}}</strong></i></small></h2>
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
	              <th>No. Invoice</th>
	              <th>Jumlah Tagihan</th>
	              <th>Mulai</th>
	              <th>Selesai</th>
	              <th>Status</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($invoice as $invoice)
            		<tr>
            			<td>{{$loop->iteration}}</td>
            			@if($invoice->status == 0)
            				<td>
            					<a href="{{ route('customers').'/'.$id.'/invoice' }}" target="_blank"><span class="badge badge-warning">invoice: {{$invoice->invoice_number}}</span></a>
            				</td>
            			@elseif($invoice->status == 1)
            				<td>
            					<span class="badge badge-success">invoice: {{$invoice->invoice_number}}</span>
            				</td>
            			@elseif($invoice->status == 2)
            				<td>
            					<span class="badge badge-dark">invoice: {{$invoice->invoice_number}}</span>
            				</td>
            			@endif
            			<td>Rp. {{number_format($invoice->customer->packet->price)}}</td>
            			<td>{{$invoice->created_at->format('d F Y')}}</td>
            			<td>{{ Carbon\Carbon::parse($invoice->created_at)->addMonth(1)->format('d F Y') }}</td>
            			@if($invoice->status == 0)
            				<td><span class="badge badge-primary">pending</span></td>
            				<td>
            					<form method="post" action="{{url(config('app.root').'/customers/'.$id.'/pembayaran')}}" style="display:inline;">
	            					@csrf
	            				<button type="submit" style="background-color:transparent; border:none" onclick="return confirm('Apakan anda yakin?')" ><span class="badge badge-warning" style="">konfirmasi pembayaran</span></button>
	            				</form>
            				</td>
            			@elseif($invoice->status == 1)
            				<td><span class="badge badge-success">aktiv</span></td>
            				<td>
            					<form method="post" action="{{url(config('app.root').'/customers/'.$id.'/pembayaran/'.$invoice->id.'/cancel')}}" style="display:inline;">
	            					@method('DELETE')
	            					@csrf
	            				<button type="submit" style="background-color:transparent; border:none" onclick="return confirm('Apakan anda yakin?')"><span class="badge badge-warning" style="">batal konfirmasi</span></button>
	            				</form>
            				</td>
            			@else
            				<td><span class="badge badge-dark">tidak aktif</span></td>
            				<td>-</td>
            			@endif
            		</tr>
            	@endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
@endsection