@extends('auths.layouts.app')
@section('title', 'EDIT CUSTOMERS')
@section('content')
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Edit <small><i>Pelanggan</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="{{route('customers').'/'.$customer->id}}" data-parsley-validate class="form-horizontal form-label-left">
					@csrf
					@method('PATCH')
					
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="name" name="name" value="{{$customer->name}}" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="address" name="address" value="{{$customer->address}}" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Hp <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="phone" name="phone" value="{{$customer->phone}}" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Berlangganan <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<select name="packet_id" class="form-control">
								@foreach($packet as $packet)
									@if($packet->id == $customer->packet_id)
										<option value="{{$packet->id}}" selected>{{$packet->packet_name}} (Rp. {{number_format($packet->price)}})</option>
									@else
										<option value="{{$packet->id}}">{{$packet->packet_name}} (Rp. {{number_format($packet->price)}})</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
							<button type="submit" class="btn btn-success btn-sm">Proses</button>
							<button type="button" class="btn btn-primary btn-sm" onclick="self.history.back()" >Batal</button>
						</div>
					</div>

				</form>
			</div>
		</div>
@endsection
@section('scripts')
<script>
  $(function () {
    $('.select2').select2({
          theme: "classic",
          maximumSelectionLength: 1,
    })
  })
</script>
@endsection