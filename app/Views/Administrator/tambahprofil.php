<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<form method="POST" action=" <?= BASE_URL; ?>admin/simpanprofil">
				<div class="form-group">
					<label>profil</label>
					<input  class="form-control" type="text" name="profil">
				</div>
				<div class="form-group">
					<label>sejarah</label>
					<input  class="form-control" type="text" name="sejarah">
				</div>
				<div class="form-group">
					<label>visi</label>
					<input class="form-control" type="text" name="visi">
				</div>
				<div class="form-group">
					<label>misi</label>
					<input  class="form-control" type="text" name="misi">
				</div>
				<div class="form-group">
					<label>lat</label>
					<input class="form-control" type="text" name="lat">
				</div>
				<div class="form-group">
					<label>lot</label>
					<input  class="form-control" type="text" name="lot">
				</div>
				<input class="btn btn-danger" type="submit" value="simpan">
			</form>		
			</div>
		</div>
	</section>
</div>