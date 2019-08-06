<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<form method="POST" action=" <?= BASE_URL; ?>admin/simpansetting">
				<div class="form-group">
					<label>setting</label>
					<input type="text" name="setting">
				</div>
				<div class="form-group">
					<label>nama aplikasi</label>hg
					<input class="form-control" type="text" name="nama_aplikasi">
				</div>
				<div class="form-group">
					<label>logo aplikasi</label>
					<input class="form-control" type="text" name="logo_aplikasi">
				</div>
				<div class="form-group">
					<label>alamat</label>
					<input class="form-control" type="text" name="alamat">
				</div>
				<div class="form-group">
					<label>no hp</label>
					<input class="form-control" type="text" name="no_hp">
				</div>
				<div class="form-group">
					<label>email</label>
					<input class="form-control" type="text" name="email">
				</div>
				<input class="btn btn-danger" type="submit" value="simpan">
			</form>		
			</div>
		</div>
	</section>
</div>