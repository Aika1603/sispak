<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-list"></i> Tambah Gejala Pada Kasus <?=$kasus->nama_kasus;?> (<?=$kasus->kode_kasus;?>)</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-8">
        <form method="post" action="<?=site_url('admin/kasus/detail_tambah_action/'.$id)?>">

          <div class="form-group">
            <label for="">Kode Gejala</label>
            <input type="hidden" name="kode_kasus" class="form-control" id="" placeholder="" value="<?=$kasus->kode_kasus?>" required>
            <select  class="form-control" name="kode_gejala" required>
              <option value="">Pilih Salah Satu</option>
                <?php
                  foreach ($gejala as $row) {
                    echo '
                    <option value="'.$row->kode_gejala.'">'.$row->nama_gejala.' ('.$row->kode_gejala.')</option>
                    ';
                  }
                 ?>
            </select>
          </div>

          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
          </div>
        </form>
      </div>
  </div>
  </div>
