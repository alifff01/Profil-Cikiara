<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<header>
				<a href="<?= BASE_URL; ?>admin/tambahprofil">tambah data </a>
			</header>
				<div class="table-responsive">
				
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>id profil</th>
							<th>sejarah</th>
							<th>visi</th>
							<th>misi</th>
							<th>lat</th>
							<th>lot</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($data['profil'] as $row): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['sejarah']; ?></td>
									<td><?php echo $row['visi'] ?></td>
									<td><?php echo $row['misi']; ?></td>
									<td><?php echo $row['lat']; ?></td>
									<td><?php echo $row['lot']; ?></td>
									
								</tr>
							
						<?php endforeach ?>
					</tbody>
				</table>
				
					
			</div>
		</div>
	</section>
</div>