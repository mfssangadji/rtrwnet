<?php $__env->startSection('title', 'PAYMENT'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Pembayaran Pelanggan: <strong><?php echo e($invoice->last()->customer->name); ?>, <?php echo e($invoice->last()->customer->address); ?></strong></i></small></h2>
	        <a onclick="self.history.back()" class="btn btn-primary btn-sm" style="float: right; color: #FFF; cursor: pointer;">Kembali</a>
	        <!-- <a href="<?php echo e(url(config('app.root').'/customers/'.$id.'/pembayaran/create')); ?>" class="btn btn-success btn-sm" style="float: right;">Input Pembayaran</a> -->
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
            	<?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		<tr>
            			<td><?php echo e($loop->iteration); ?></td>
            			<?php if($invoice->status == 0): ?>
            				<td>
            					<a href="<?php echo e(route('customers').'/'.$id.'/invoice'); ?>" target="_blank"><span class="badge badge-warning">invoice: <?php echo e($invoice->invoice_number); ?></span></a>
            				</td>
            			<?php elseif($invoice->status == 1): ?>
            				<td>
            					<span class="badge badge-success">invoice: <?php echo e($invoice->invoice_number); ?></span>
            				</td>
            			<?php elseif($invoice->status == 2): ?>
            				<td>
            					<span class="badge badge-dark">invoice: <?php echo e($invoice->invoice_number); ?></span>
            				</td>
            			<?php endif; ?>
            			<td>Rp. <?php echo e(number_format($invoice->customer->packet->price)); ?></td>
            			<td><?php echo e($invoice->created_at->format('d F Y')); ?></td>
            			<td><?php echo e(Carbon\Carbon::parse($invoice->created_at)->addMonth(1)->format('d F Y')); ?></td>
            			<?php if($invoice->status == 0): ?>
            				<td><span class="badge badge-primary">pending</span></td>
            				<td>
            					<form method="post" action="<?php echo e(url(config('app.root').'/customers/'.$id.'/pembayaran')); ?>" style="display:inline;">
	            					<?php echo csrf_field(); ?>
	            				<button type="submit" style="background-color:transparent; border:none" onclick="return confirm('Apakan anda yakin?')" ><span class="badge badge-warning" style="">konfirmasi pembayaran</span></button>
	            				</form>
            				</td>
            			<?php elseif($invoice->status == 1): ?>
            				<td><span class="badge badge-success">aktiv</span></td>
            				<td>
            					<form method="post" action="<?php echo e(url(config('app.root').'/customers/'.$id.'/pembayaran/'.$invoice->id.'/cancel')); ?>" style="display:inline;">
	            					<?php echo method_field('DELETE'); ?>
	            					<?php echo csrf_field(); ?>
	            				<button type="submit" style="background-color:transparent; border:none" onclick="return confirm('Apakan anda yakin?')"><span class="badge badge-warning" style="">batal konfirmasi</span></button>
	            				</form>
            				</td>
            			<?php else: ?>
            				<td><span class="badge badge-dark">tidak aktif</span></td>
            				<td>-</td>
            			<?php endif; ?>
            		</tr>
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\best-net\resources\views/auths/customers/payment.blade.php ENDPATH**/ ?>