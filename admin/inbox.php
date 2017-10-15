<?php
session_start();
error_reporting(0);

?>
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
<section class="content">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data laporan masyarakat</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            
   

            <div class="box-body no-padding">
    
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  	<?php
$sql = mysql_query("SELECT * FROM tbl_rpt_bencana WHERE dibuka='1'");
   		$jumlahdata=mysql_num_rows($sql);
   		if($jumlahdata>0){
                  
                   $sql=mysql_query("SELECT * FROM tbl_rpt_bencana WHERE dibuka='1'");
    while($r=mysql_fetch_array($sql)){
      $id=$r['id'];
      $ket=$r['keterangan'];
            echo "      <tr>
                    <td><input type='checkbox'></td>
                  
                    <td class='mailbox-name'><a href='?mod=read_pesan&id=$id' title='baca pesan'>$ket</a></td>
                    
                    <td><a href='?mod=del_pesan&id=$id'><button type='button' class='btn btn-default btn-sm'><i class='fa fa-trash-o'></i></button></a></td>                     
                  </tr>";
              }
       }
       else
       {

       echo "	<div class='alert alert-danger'>Tidak ditemukan pesan laporan masyarakat !</div>";
       }
       ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
   
</div>
</div>
</section>
<!-- jQuery 3.1.1 -->
 <script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.js"></script>

<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>

<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>