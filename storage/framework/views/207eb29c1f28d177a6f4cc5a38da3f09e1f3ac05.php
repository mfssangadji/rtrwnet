<?php $__env->startSection('title', 'HOTSPOT AGENT'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Agen Hotspot</i></small></h2>
	        <a href="<?php echo e(route('hotspot.create')); ?>" class="btn btn-success btn-sm" style="float: right;">Tambah Agen Baru</a>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>#</th>
	              <th>Nama</th>
	              <th>Titik Agen</th>
	              <th>QTY Pengambilan Terakhir</th>
	              <th>Total Pengambilan</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	<?php $__currentLoopData = $hotspot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotspot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		<tr>
            			<td><?php echo e($loop->iteration); ?></td>
            			<td><?php echo e($hotspot->name); ?></td>
            			<td><?php echo e($hotspot->agent_point); ?></td>
            			<?php $__currentLoopData = $hotspot->stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            				<?php
            					$qty[$hotspot->id][] = $stock->qty;
            				?>
            			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            			<?php if(isset($qty[$hotspot->id])): ?>
            				<td><?php echo e($hotspot->stock->last()->qty); ?></td>
            				<td><?php echo e(array_sum($qty[$hotspot->id])); ?></td>
            			<?php else: ?>
            				<td>-</td>
            				<td>-</td>
            			<?php endif; ?>
            			<td>
			              	<a href="<?php echo e(url(config('app.root').'/hotspot/'.$hotspot->id.'/stock')); ?>"><spane class="badge badge-warning">pengambilan stok</span></a><form method="post" action="<?php echo e(route('hotspot').'/'.$hotspot->id); ?>" style="display:inline;">
			              	<a href="<?php echo e(route('hotspot').'/'.$hotspot->id.'/edit'); ?>" title="ubah"><spane class="badge badge-success">edit</span></a><form method="post" action="<?php echo e(route('hotspot').'/'.$hotspot->id); ?>" style="display:inline;">
            					<?php echo method_field('DELETE'); ?>
            					<?php echo csrf_field(); ?>
            				<button type="submit" class="" style="background-color: transparent; border:none;" onclick="return confirm('Apakan anda yakin?')" style="border: none;"><span class="badge badge-danger">hapus</span></button>
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
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\best-net\resources\views/auths/hotspot/index.blade.php ENDPATH**/ ?>