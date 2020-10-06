<?php $__env->startSection('title', 'CUSTOMERS'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Pelanggan</i></small></h2>
	        <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-success btn-sm" style="float: right;">Tambah Pelanggan Baru</a>
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
            	<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		<tr>
            			<td><?php echo e($loop->iteration); ?></td>
            			<?php if($customer->invoice->status == 1): ?>
            				<td>
            					<span class="badge badge-success">invoice: <?php echo e($customer->invoice->invoice_number); ?></span>
            				</td>
            			<?php else: ?>
            				<td>
            					<a href="<?php echo e(route('customers').'/'.$customer->id.'/invoice'); ?>" target="_blank"><span class="badge badge-warning">invoice: <?php echo e($customer->invoice->invoice_number); ?></span></a>
            				</td>
            			<?php endif; ?>
            			<td><?php echo e($customer->name); ?></td>
            			<td><?php echo e($customer->address); ?></td>
            			<?php if($customer->invoice->status == 1): ?>
            				<td style="border-left: 4px solid green"><?php echo e($customer->packet->packet_name); ?> (Rp. <?php echo e(number_format($customer->packet->price)); ?>/Bulan)</td>
            				<td><?php echo e($customer->invoice->created_at->format('d F Y')); ?></td>
            				<td><?php echo e(Carbon\Carbon::parse($customer->invoice->created_at)->addMonth(1)->format('d F Y')); ?></td>
            			<?php else: ?>
            				<td style="border-left: 4px solid red"><?php echo e($customer->packet->packet_name); ?> (Rp. <?php echo e(number_format($customer->packet->price)); ?>/Bulan)</td>
            				<td><?php echo e($customer->invoice->created_at->format('d F Y')); ?></td>
            				<td><?php echo e(Carbon\Carbon::parse($customer->invoice->created_at)->addMonth(1)->format('d F Y')); ?></td>
            			<?php endif; ?>
	            		<td>
			              	<a href="<?php echo e(route('customers').'/'.$customer->id.'/pembayaran'); ?>"><span class="badge badge-primary">pembayaran</span></a>
			              	<a href="<?php echo e(route('customers').'/'.$customer->id.'/edit'); ?>"><span class="badge badge-success">edit</span></a>
			              	<form method="post" action="<?php echo e(route('customers').'/'.$customer->id); ?>" style="display:inline;">
            					<?php echo method_field('DELETE'); ?>
            					<?php echo csrf_field(); ?>
            				<button type="submit" style="background-color:transparent; border:none" onclick="return confirm('Apakan anda yakin?')" ><span class="badge badge-danger" style="">hapus</span></button>
            				</form>
			            </td>
            		</tr>
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\best-net\resources\views/auths/customers/index.blade.php ENDPATH**/ ?>