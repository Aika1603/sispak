<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header"><i class="fa fa-bug"></i> Tambah Data Gejala</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-8">
        <form method="post" action="<?=site_url('admin/gejala/tambah_action')?>">
          <div class="form-group">
            <label for="">Kode Gejala</label>
            <input type="text" name="kode_gejala" class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="">Nama Gejala</label>
            <input type="text" name="nama_gejala" class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="">Daerah Serangan</label>
            <select  class="form-control" name="daerah" required>
              <option value="">Pilih Salah Satu</option>
              <option>Daun</option>
              <option>Batang</option>
              <option>Polong</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Bobot Gejala</label>
            <input type="number" name="bobot" class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
          </div>
        </form>
      </div>
  </div>
  </div>
