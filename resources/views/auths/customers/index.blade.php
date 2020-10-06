@extends('auths.layouts.app')
@section('title', 'CUSTOMERS')
@section('content')
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Pelanggan</i></small></h2>
	        <a href="{{route('customers.create')}}" class="btn btn-success btn-sm" style="float: right;">Tambah Pelanggan Baru</a>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>#</th>
	              <th>No. Invoice</th>
	              <th>Nama</th>
	              <th>Alamat</th>
	              <th>Berlangganan</th>
	              <th>Mulai</th>
	              <th>Selesai</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	@foreach($customers as $customer)
            		<tr>
            			<td>{{$loop->iteration}}</td>
            			@if($customer->invoice->status == 1)
            				<td>
            					<span class="badge badge-success">invoice: {{$customer->invoice->invoice_number}}</span>
            				</td>
            			@else
            				<td>
            					<a href="{{ route('customers').'/'.$customer->id.'/invoice' }}" target="_blank"><span class="badge badge-warning">invoice: {{$customer->invoice->invoice_number}}</span></a>
            				</td>
            			@endif
            			<td>{{$customer->name}}</td>
            			<td>{{$customer->address}}</td>
            			@if($customer->invoice->status == 1)
            				<td style="border-left: 4px solid green">{{$customer->packet->packet_name}} (Rp. {{number_format($customer->packet->price)}}/Bulan)</td>
            				<td>{{$customer->invoice->created_at->format('d F Y')}}</td>
            				<td>{{ Carbon\Carbon::parse($customer->invoice->created_at)->addMonth(1)->format('d F Y') }}</td>
            			@else
            				<td style="border-left: 4px solid red">{{$customer->packet->packet_name}} (Rp. {{number_format($customer->packet->price)}}/Bulan)</td>
            				<td>{{$customer->invoice->created_at->format('d F Y')}}</td>
            				<td>{{ Carbon\Carbon::parse($customer->invoice->created_at)->addMonth(1)->format('d F Y') }}</td>
            			@endif
	            		<td>
			              	<a href="{{ route('customers').'/'.$customer->id.'/pembayaran' }}"><span class="badge badge-primary">pembayaran</span></a>
			              	<a href="{{ route('customers').'/'.$customer->id.'/edit' }}"><span class="badge badge-success">edit</span></a>
			              	<form method="post" action="{{ route('customers').'/'.$customer->id }}" style="display:inline;">
            					@method('DELETE')
            					@csrf
            				<button type="submit" style="background-color:transparent; border:none" onclick="return confirm('Apakan anda yakin?')" ><span class="badge badge-danger" style="">hapus</span></button>
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