<?php 
ob_start();	
error_reporting(0);
session_start();	 


?>  
  <section class="content">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Kirim Info Bencana</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            
   
    <div class="row">

   <div class="col-md-7 col-sm-7">
   <div class="table-responsive">
 
     <form id="frmkat" class="form-horizontal" action="?mod=save_lapm" method="post" target="_self" enctype="multipart/form-data" >
     <table class="table table-hover table-bordered">
     <tr >
        <th>Keterangan </th>
        <td>
        <div class="col-sm-12">
        <input class="form-control" name="keterangan" placeholder="co: Masukan keterangan lokasi dsb" id="nama_kategori" type="text" size="30" />
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
           <small><i> Informasikan bencana yang terjadi di masyarakat!</i></small>
            </div>
          </div>
 </section>
