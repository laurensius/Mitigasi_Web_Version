<?php 
ob_start(); 
error_reporting(0);
session_start();   


?>  
<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.css">
  <section class="content">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Input Info Bencana</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            
   
    <div class="row">

   <div class="col-md-12 col-sm-12">
   <div class="table-responsive">
 
     <form id="frmkat" class="form-horizontal" action="?mod=save_info_bencana" method="post" target="_self" enctype="multipart/form-data" >
     <table class="table table-hover table-bordered">
     <tr >
        <th>Pilih Bencana </th>
        <td>
        <div class="col-sm-7">
         <div class="form-group">
                  
                 <select name="bencana" id="bencana" class="form-control">
    <option value="">[Pilih Bencana]</option>
    <?php
       $server = "localhost";
$username = "root";
$password = "laurens23";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
      $pilih="SELECT * FROM tbl_bencana ORDER BY id_bencana";
    $query=mysql_query( $pilih);
    while($row=mysql_fetch_array($query))
    {
    echo"<option value='$row[id_bencana]'>$row[nama_bencana]</option>";
    }
    ?>
    </select>

                </div>
       </div>
        </td>
      </tr>
      <tr >
        <th>Tempat Kejadian </th>
        <td>
          <div class="form-group">
        <div class="col-sm-7">
        <input class="form-control" name="tempat"  id="tempat" type="text" size="30" />
       </div>
     </div>
        </td>
      </tr>
      <tr >
        <th>Korban </th>
        <td>
          <div class="form-group">
        <div class="col-sm-7">
        <input class="form-control" name="korban"  id="korban" type="text" size="30" />
       </div>
     </div>
        </td>
      </tr>
    
      <tr >
        <th>Kronologis</th>
        <td colspan="2">
      <div class="col-sm-12">
       <form>

                    <textarea id="kronologis" name="kronologis" rows="10" cols="100">
                                 
                    </textarea>
              </form>
              </div>
</td>
      </tr>
        <!--
        <tr >
        <th>Longitude </th>
        <td>
          <div class="form-group">
        <div class="col-sm-7">
        <input class="form-control" name="long"  id="long" type="text" size="30" />
       </div>
     </div>
        </td>
      </tr>
      <tr >
        <th>Latitude </th>
        <td>
          <div class="form-group">
        <div class="col-sm-7">
        <input class="form-control" name="lat"  id="long" type="text" size="30" />
       </div>
     </div>
        </td>
      </tr>
    -->
      <tr >
        <th>Tanggal</th>
        <td>
          <div class="form-group">
        <div class="col-sm-7">
        <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="tgl" type="text" class="form-control pull-right" id="datepicker">
                </div>
       </div>
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
           <small><i> Isilah data di atas</i></small>
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
    CKEDITOR.replace('kronologis');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap olor picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
  $(function () {


    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });


  

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>