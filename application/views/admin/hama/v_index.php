<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header"><i class="fa fa-bug"></i> Data Hama</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
        <a href="<?=site_url('admin/hama/tambah')?>" class="btn btn-primary"> Tambah Data </a>
        <br/><br/>
          <div class="panel panel-default">
              <div class="panel-heading">
                  Tabel Data  Hama
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Gambar Hama</th>
                              <th>Kode Hama</th>
                              <th>Nama Hama</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($list as $row) {
                          echo '
                          <tr class="">
                            <td>'.$no.'</td>
                            <td><img src="'.base_url('assets/img/'.$row->gambar_hama).'" width="150" height="250"></td>
                            <td>'.$row->kode_hama.'</td>
                            <td>'.$row->nama_hama.'</td>
                            <td>
                              <!-- <a href="'.site_url('admin/hama/detail/'.$row->kode_hama).'" title="Detail"><i class="fa fa-list"></i> </a>
                              -->
                              <a href="'.site_url('admin/hama/edit/'.$row->kode_hama).'" title="Edit"><i class="fa fa-edit"></i> </a>
                              <a href="'.site_url('admin/hama/hapus/'.$row->kode_hama).'" title="Hapus"><i class="fa fa-trash"></i> </a>
                            </td>
                          </tr>
                          ';
                          $no++;
                        }
                        ?>
                      </tbody>
                  </table>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
</div>

<?php if($this->session->flashdata('error')):?>
        <script type="text/javascript">
        $(document).ready(function() {
                $.toast({
                    heading: 'Error',
                    text: "<?php  echo $this->session->flashdata('error');?>",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                  });
                });
        </script>

    <?php elseif($this->session->flashdata('success')):?>
        <script type="text/javascript">
        $(document).ready(function() {
                $.toast({
                    heading: 'Success',
                    text: "<?php echo $this->session->flashdata('success');?>",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
              });
        </script>
<?php endif;?>
