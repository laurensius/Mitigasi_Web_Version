<?php
	session_start();
	        $server = "localhost";
$username = "root";
$password = "";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>


<?php 
    //$kdubah=$_REQUEST['kdubah'];
	//if(!$_REQUEST['edit_id']==""){
		$edit_id=$_REQUEST['id'];
   if($edit_id !=""){


	$sql = mysql_query("SELECT * FROM user  WHERE uid='$edit_id'");
	$row = mysql_fetch_array($sql);
  $id=$row['uid'];
	$nama = $row['nama'];
	$email=$row['email'];
	}
	?> 
      <div class="content">
      
     <div class="col-md-8">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-edit"></span> Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="?mod=edit_user_exe" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="box-body">
               
                <div class="form-group">
                  <label for="id_kab" class="col-sm-2 control-label">ID User</label>

                  <div class="col-sm-5">
                   <input name="id_uid" type="text" size="20" value="<?php echo "$id"; ?>" maxlength="4" disabled>
            <input name="id_uidh" type="hidden" size="20" value="<?php echo "$id"; ?>">
                  </div>
                </div>
             <div class="form-group">
                  <label for="nama_kab" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-5">
                   <input name="nama" class="form-control" type="text" id="nama" size="50" value="<?php echo "$nama"; ?>">
                  </div>
                </div>
             <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-5">
                   <input name="email" class="form-control" type="text" id="email" size="50" value="<?php echo "$email"; ?>">
                  </div>
                </div>
               <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Aktifkan</label>

                  <div class="col-sm-5">
                   <input type="radio" name="aktif" value="Y">Ya
                        <input type="radio" name="aktif" value="N">Tidak
                  </div>
                </div>
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default" name="clear" onClick="window.location='?mod=home'">Batal</button>
                <button type="submit" class="btn btn-info pull-right" name="simpan"><i class="fa fa-save"></i> Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </div>
          </div>
      