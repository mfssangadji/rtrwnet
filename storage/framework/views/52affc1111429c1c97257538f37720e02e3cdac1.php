<?php $__env->startSection('title', 'EDIT CUSTOMERS'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Edit <small><i>Pelanggan</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="<?php echo e(route('customers').'/'.$customer->id); ?>" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PATCH'); ?>
					
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="name" name="name" value="<?php echo e($customer->name); ?>" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="address" name="address" value="<?php echo e($customer->address); ?>" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Hp <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="phone" name="phone" value="<?php echo e($customer->phone); ?>" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Berlangganan <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<select name="packet_id" class="form-control">
								<?php $__currentLoopData = $packet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($packet->id == $customer->packet_id): ?>
										<option value="<?php echo e($packet->id); ?>" selected><?php echo e($packet->packet_name); ?> (Rp. <?php echo e(number_format($packet->price)); ?>)</option>
									<?php else: ?>
										<option value="<?php echo e($packet->id); ?>"><?php echo e($packet->packet_name); ?> (Rp. <?php echo e(number_format($packet->price)); ?>)</option>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $(function () {
    $('.select2').select2({
          theme: "classic",
          maximumSelectionLength: 1,
    })
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\best-net\resources\views/auths/customers/edit.blade.php ENDPATH**/ ?>