<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<header>
				<a href="<?= BASE_URL; ?>admin/tambahagenda">tambah data </a>
			</header>
				<div class="table-responsive">
			
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>no</th>
							<th>nama agenda</th>
							<th>keterangan</th>
							<th>gambar agenda</th>
							<th>tgl dibuat</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($data['agenda'] as $row): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['nama_agenda']; ?></td>
									<td><?php echo $row['keterangan'] ?></td>
									<td><?php echo $row['gambar_agenda']; ?></td>
									<td><?php echo $row['tgl_dibuat']; ?></td>
									
								</tr>
							
						<?php endforeach ?></tbody>
					</tbody>
				</table>
				
			
			</div>
		</div>
	</section>
</div>