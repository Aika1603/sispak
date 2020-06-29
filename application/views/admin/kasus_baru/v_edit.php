<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header"><i class="fa fa-list"></i> Edit Data Kasus</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-8">
        <form method="post" action="<?=site_url('admin/kasus/edit_action')?>">
          <div class="form-group">
            <label for="">Kode Kasus</label>
            <input type="text" name="kode_kasus" readonly value="<?=$list->kode_kasus;?>" class="form-control" id="" placeholder="" required>
            <input type="hidden" name="id_data" readonly value="<?=$list->id_data;?>" class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="">Nama Kasus</label>
            <input type="text" name="nama_kasus" value="<?=$list->nama_kasus;?>"  class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="">Deskripsi Kasus</label>
            <textarea id="editor" name="deskripsi" class="form-control" placeholder="" required >
              <?=$list->deskripsi;?>
            </textarea>
          </div>
          <div class="form-group">
            <label for="">Solusi/Penanggulangan</label>
            <textarea id="editor2" name="solusi" class="form-control" placeholder="" required >
              <?=$list->solusi;?>
            </textarea>
          </div>
          <div class="form-group">
            <label for="">Nama Hama</label>
            <select  class="form-control" name="kode_hama" required>
              <option value="<?=$list->kode_hama;?>"><?=$list->kode_hama;?></option>
                <?php
                  foreach ($hama as $row) {
                    echo '
                    <option value="'.$row->kode_hama.'">'.$row->nama_hama.' ('.$row->kode_hama.')</option>
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
