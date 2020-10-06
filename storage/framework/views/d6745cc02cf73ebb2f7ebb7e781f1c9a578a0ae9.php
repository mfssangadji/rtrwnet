<?php $__env->startSection('title', 'HOTSPOT AGENT STOCK'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Pengambilan Stok Agen: <strong><?php echo e($hotspot->name); ?> - <?php echo e($hotspot->agent_point); ?></strong></i></small></h2>
	        <a onclick="self.history.back()" class="btn btn-primary btn-sm" style="float: right; color: #FFF; cursor: pointer;">Kembali</a>
	        <a href="<?php echo e(url(config('app.root').'/hotspot/'.$id.'/stock/create')); ?>" class="btn btn-success btn-sm" style="float: right; color: #FFF; cursor: pointer;">Tambah Pengambilan</a>
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
	              <th>QTY Pengambilan</th>
	              <th>Satuan</th>
	              <th>Total Biaya</th>
	              <th>Keterangan</th>
	              <th>Tanggal</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	<?php $__currentLoopData = $hotspot->stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		<tr>
            			<td><?php echo e($loop->iteration); ?></td>
            			<td><?php echo e($stock->qty); ?></td>
            			<td>Rp. <?php echo e(number_format(4000)); ?></td>
            			<td>Rp. <?php echo e(number_format($stock->cost)); ?></td>
            			<td><?php echo e($stock->description); ?></td>
            			<td><?php echo e($stock->created_at->format('d F Y')); ?></td>
            			<td>
			              	<a href="<?php echo e(url(config('app.root').'/hotspot/'.$hotspot->id.'/stock/'.$stock->id.'/edit')); ?>" title="ubah"><spane class="badge badge-success">edit</span></a><form method="post" action="<?php echo e(url(config('app.root').'/hotspot/'.$hotspot->id.'/stock/'.$stock->id)); ?>" style="display:inline;">
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
<?php echo $__env->make('auths.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\best-net\resources\views/auths/hotspot/stock.blade.php ENDPATH**/ ?>