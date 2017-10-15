<?php 
ob_start();	
error_reporting(0);
session_start();	 


?>  
  <link rel="stylesheet" href="bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.css">
  <section class="content">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data Panduan Bencana</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            
   
    <div class="row">

   <div class="col-md-12 col-sm-12">
   <div class="table-responsive">
 
     <form id="frmkat" class="form-horizontal" action="?mod=save_panduan" method="post" target="_self" enctype="multipart/form-data" >
     <table class="table table-hover table-bordered">
     <tr >
        <th>Panduan Bencana </th>
        <td>
        <div class="col-sm-7">
         <div class="form-group">
                  
                  <select class="form-control" name="panduan">
                  <option value="banjir"><b>Pilih Panduan</b></option>
                    <option value="banjir">Bencana Banjir</option>
                    <option value="gunung">Gunung Meletus</option>
                    <option value="gempa">Gempa Bumi</option>
                    <option value="tsunami">Tsunami</option>
                    
                  </select>
                </div>
       </div>
        </td>
      </tr>
      <tr >
        <th>Judul </th>
        <td>
          <div class="form-group">
        <div class="col-sm-7">
        <input class="form-control" name="judul"  id="judul" type="text" size="30" />
       </div>
     </div>
        </td>
      </tr>
      <tr >
        <th>Isi</th>
        <td colspan="2">
      <div class="col-sm-12-11">
       <form>

                    <textarea id="keterangan" name="keterangan" rows="10" cols="100">
                                 
                    </textarea>
              </form>
              </div>
</td>
      </tr>
      <tr >
        <th>Ambil Gambar </th>
        <td>
        <div class="col-sm-7">
        <input name="MAX_FILE_SIZE" type="hidden" value="3000000" />  
        <input name="file_gambar" type="file" accept="image/* capture=camera" />
       </div>
        </td>
      </tr>
       <tr>
      <td>&nbsp;</td>
        <td colspan="2" >
       <button name="simpan" class="btn btn-success" title="Klik untuk memyimpan data" pull-right><i class="fa fa-save white"></i> Simpan</button>
      
         
        </td>
      </tr>
     </table>

     </form>
     </div>
   
    </div>
         </div>
  
  
               </div>
                </p>
           
                 
            <!-- /.box-body -->
            <div class="box-footer clearfix">
           <small><i> Isilah data panduan bencana di atas</i></small>
            </div>
          </div>
 </section>
 <script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.js"></script>
 <script src="bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('keterangan');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>