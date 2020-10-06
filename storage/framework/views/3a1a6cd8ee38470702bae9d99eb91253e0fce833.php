<?php $__env->startSection('title', 'ADD PAYMENT'); ?>
<?php $__env->startSection('content'); ?>
    <div class="x_panel">
		<div class="x_title">
			<h2>Form Tambah <small><i>Pembayaran</i></small></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />
			<form id="demo-form2" method="post" action="#" data-parsley-validate class="form-horizontal form-label-left">
				<?php echo csrf_field(); ?>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. Invoice <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" required="required" readonly value="<?php echo e($invoice->invoice_number); ?>" class="form-control ">
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">An. Pelanggan <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="customer_id" name="customer_id" value="<?php echo e($invoice->customer->name); ?>" readonly required="required" class="form-control ">
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="address" readonly name="address" value="<?php echo e($invoice->customer->address); ?>" required="required" class="form-control ">
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Hp <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="phone" readonly name="phone" value="<?php echo e($invoice->customer->phone); ?>" required="required" class="form-control ">
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Biaya Pembayaran <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="bill_cost" name="bill_cost" value="<?php echo e($invoice->customer->packet->price); ?>" readonly required="required" class="form-control ">
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Periode <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="bill_cost" name="bill_cost" value="<?php echo e($invoice->created_at->format('d F Y')); ?> sd <?php echo e(Carbon\Carbon::parse($invoice->created_at)->addMonth(1)->format('d F Y')); ?>" readonly required="required" class="form-control ">
					</div>
				</div>

				<div class="ln_solid"></div>
				<div class="item form-group">
					<div class="col-md-6 col-sm-6 offset-md-3">
						<button type="submit" class="btn btn-success btn-sm">Proses</button>
						<button class="btn btn-primary btn-sm" onclick="self.history.back()" type="reset">Batal</button>
					</div>
				</div>

			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\best-net\resources\views/auths/customers/payment_create.blade.php ENDPATH**/ ?>