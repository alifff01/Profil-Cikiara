<div class="container">
	<section>
		<div class="row">
			<div class="col-md-12">
			<header>
				<a href="<?= BASE_URL; ?>admin/tambahsetting">tambah data </a>
			</header>
				<div class="table-responsive">
		
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>id setting</th>
							<th>nama aplikasi</th>
							<th>logo aplikasi</th>
							<th>alamat</th>
							<th>no hp</th>
							<th>email</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($data['setting'] as $row): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['nama_aplikasi']; ?></td>
									<td><?php echo $row['logo_aplikasi'] ?></td>
									<td><?php echo $row['alamat']; ?></td>
									<td><?php echo $row['no_hp']; ?></td>
									<td><?php echo $row['email']; ?></td>
									
								</tr>
							
						<?php endforeach ?>
					</tbody>
				</table>
				
				
			</div>
		</div>
	</section>
</div>