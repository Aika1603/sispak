<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bug"></i> Edit Data Hama</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-4">
      <form method="post" action="<?=site_url('admin/hama/edit_action')?>">
      <div class="form-group">
        <label>Gambar Hama</label><br/>
        <img id="img-foto" class=" img-responsive " style="height:200px;width:200px;" src="<?php echo base_url();?>assets/img/<?php echo $list->gambar_hama ;?>" alt="User profile picture">
        <br/>
        <center>
          <span class="file"><a class="ganti-file btn btn-default" href="#">Ganti Foto <i class="fa fa-edit"></i></a> </span>
          <!-- <input class="btn btn-info" type="submit" value="Update"> -->
        </center>
        <input class="" id="gambar" placeholder="" name="gambar_hama" type="hidden" required value="<?=$list->gambar_hama;?>"  />

      </div>
    </div>
      <div class="col-lg-8">
          <div class="form-group">
            <label for="">Kode Hama</label>
            <input type="text" name="kode_hama" class="form-control" id="" value="<?=$list->kode_hama;?>" required>
          </div>
          <div class="form-group">
            <label for="">Nama Hama</label>
            <input type="text" name="nama_hama" class="form-control" id="" value="<?=$list->nama_hama;?>" required>
          </div>
          <div class="form-group">
            <label for="">Nama Latin</label>
            <input type="text" name="nama_latin" class="form-control" id="" value="<?=$list->nama_latin;?>" required>
          </div>
          <div class="form-group">
            <label for="">Ordo</label>
            <input type="text" name="ordo" class="form-control" id="" value="<?=$list->ordo;?>" required>
          </div>

          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
          </div>
        </form>
      </div>
  </div>
  </div>


    <script  type="text/javascript">
    //===========================DOM ready document START================================
    		$(document).ready(function() {

          var interval;
          function applyAjaxFileUpload(element) {
            $(element).AjaxFileUpload({
              action: "<?php echo site_url('ajax/upload');?>",
              onChange: function(filename) {
                // Create a span element to notify the user of an upload in progress
                var $span = $("<span />")
                  .attr("class", $(this).attr("id"))
                  .text("Uploading")
                  .insertAfter($(this));

                $(this).remove();

                interval = window.setInterval(function() {
                  var text = $span.text();
                  if (text.length < 13) {
                    $span.text(text + ".");
                  } else {
                    $span.text("Uploading");
                  }
                }, 200);
              },
              onSubmit: function(filename) {
                return true;
              },
              onComplete: function(filename, response) {
                window.clearInterval(interval);
                var $span = $("span." + $(this).attr("id")).text(filename + " "),
                  $fileInput = $("<input />")
                    .attr({
                      type: "file",
                      required: "",
                      name: $(this).attr("name"),
                      id: $(this).attr("id")
                    });
                $('#gambar').val(response.name);
                $("#img-foto").replaceWith(
                  $("<img />").attr("class"," img-responsive ").attr("id", "img-foto").attr("src", '<?php echo base_url()."assets/img/";?>'+response.name).attr("style", "height:200px;width:200px;")
                );
                if (typeof(response.error) === "string") {
                  $span.replaceWith($fileInput);

                  applyAjaxFileUpload($fileInput);
                  $("#img-foto").replaceWith(
                    $("<div />").attr("id", "img-foto")
                  );
                  swal({
                    type: 'error',
                    title: response.error,
                  });
                  return;
                }

                $("<a />")
                  .attr("href", "#")
                  .text("Ganti Foto (X)")
                  .attr("class", "ganti btn btn-default")
                  .bind("click", function(e) {
                    $span.replaceWith($fileInput);

                    applyAjaxFileUpload($fileInput);

                    $("#img-foto").replaceWith(
                      $("<div />").attr("id", "img-foto")
                    );

                    $('#gambar').val('');

                  })
    							.appendTo($span);
    						// $a = $(".ganti").text();
    						// $("<button />")
    						// 	.text("Update")
    						// 	.attr("class", "btn btn-success")
                //   .appendTo($a);
              }
            });
          }

          $('.ganti-file').on('click', function(){
            //mengganti span edit-file menjadi input type files
            $('#gambar').val('');
            var $fileInput = $("<input />")
               .attr({
                 type: "file",
                 name: "file",
                 id: "file",
                 class: "form-control",
                 required : ""
               });
             $("span.file").replaceWith($fileInput);

             $("#img-foto").replaceWith(
               $("<div />").attr("id", "img-foto")
             );
             //add file baru via ajax
            applyAjaxFileUpload("#file");
          })

        });

    //===========================DOM ready document END================================
    </script>
