<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<form method="POST" action=" <?= BASE_URL; ?>admin/simpanbiodata">
				<select name="id_jabatan" class="form-control">
					<?php foreach ($data['jabatan'] as $row): ?>
						<option value="<?= $row['id_jabatan'] ?>"><?= $row['nama_jabatan'] ?></option>
					<?php endforeach ?>
				</select>
				<div class="form-group">
					<label>photo</label>
					<input type="text" name="photo">
				</div>
				<div class="form-group">
					<label>jk</label>
					<input type="text" name="jk">
				</div>
				<div class="form-group">
					<label>biodata</label>
					<input type="text" name="biodata">
				</div>
				<div class="form-group">
					<label>jabatan</label>
					<input type="text" name="jabatan">
				</div>
				<div class="form-group">
					<label>nama anggota</label>
					<input type="text" name="nama_anggota">
				</div>
				<div class="form-group">
					<label>alamat</label>
					<input type="text" name="alamat">
				</div>
				<div class="form-group">
					<label>no hp</label>
					<input type="text" name="no_hp">
				</div>
				<div class="form-group">
					<label>tempat ahir</label>
					<input type="text" name="tempat_lahir">
				</div>
				<div class="form-group">
					<label>tgl lahir</label>
					<input type="text" name="tgl_lahir">
				</div>
				<div class="form-group">
					<label>email</label>
					<input type="text" name="email">
				</div>
				<div class="form-group">
					<label>agama</label>
					<input type="text" name="agama">
				</div>
				
				<input class="btn btn-danger" type="submit" value="simpan">
			</form>		
			</div>
		</div>
	</section>
</div>