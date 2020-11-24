<?php $__env->startSection('title', 'SETOR HOSTPOT AGENT STOCK'); ?>
<?php $__env->startSection('content'); ?>
    <div class="x_panel">
		<div class="x_title">
			<h2>Form Setor <small><i>Pengambilan Stock</i>
				<strong><?php echo e($hotspot->name); ?>, <?php echo e($hotspot->agent_point); ?></strong></small></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />
			<form id="demo-form2" method="post" action="<?php echo e(url(config('app.root').'/hotspot/'.$hotspot->id.'/stock/'.$stock->id.'/setor')); ?>" data-parsley-validate class="form-horizontal form-label-left">
				<?php echo csrf_field(); ?>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">QTY <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" required="required" value="<?php echo e($stock->qty); ?>" disabled class="form-control" name="qty" id="qty">
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<textarea class="form-control" disabled name="description"><?php echo e($stock->description); ?></textarea>
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jumlah Setor <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" required="required" name="jumlah_setor" class="form-control" id="qty">
					</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Setor <span class="required">*</span>
					</label>
					<div class="col-md-6 xdisplay_inputx form-group row has-feedback">
	                    <input type="text" class="form-control has-feedback-left" id="myDatepicker2" name="tanggal_setor" aria-describedby="inputSuccess2Status">
	                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
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
<?php $__env->startSection('scripts'); ?>
	<script  type="text/javascript">
   $(function () {
                $('#myDatepicker').datetimepicker();
            });
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\best-net\resources\views/auths/hotspot/stock_setor.blade.php ENDPATH**/ ?>