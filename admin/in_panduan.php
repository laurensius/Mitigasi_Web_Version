<script type='text/javascript' src="ajax_combo.js"></script>
		
<div class="col-md-8" >
<section class="content">
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Produk</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            

<div class="alert alert-info"><i class="fa fa-check"></i> PENGISIAN DATA PRODUK</div>
<div class="table-responsive">
<form id="frmkat" class="form-horizontal" action="?mod=produk_add_exe" method="post" enctype="multipart/form-data" >
    <table class="table table-hover table-bordered padding">
    <tr>
        <th>Kode Produk</th>
        <td >
            <div class="col-sm-7">
            <?php
            include "koneksi.php";		
			include "inc.librari.php";
			
			?>
            <input type="text" class="form-control" id="id" name="id"  maxlength="4" value="<?php echo idauto("tbl_produk","KP"); ?>" disabled>
          <input type="hidden" class="form-control" id="idh" name="idh"  value="<?php echo idauto("tbl_produk","KP"); ?>">
      </div>
        </td>
      </tr>
      <tr >
        <th >Kategori Produk</th>
        <td>
        <div class="col-sm-7">
         <select name="id_kategori" onChange="javascript:rubah(this)" class="form-control">
		<option value="">[Pilih Kategori]</option>
		<?php
			include "koneksi.php";
			$pilih="SELECT * FROM tbl_kategori ORDER BY id_kategori";
		$query=mysql_query($pilih);
		while($row=mysql_fetch_array($query))
		{
		echo"<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
		}
		?>
		</select>
       </div>
        </td>
        </tr>
        <tr>
        <th>Sub Kategori Produk</th>
        <td>
        <div class="col-sm-7">
        <select id="subkategori" name="subkategori" class="form-control">
		<option value="NotSubkategori">[Pilih Subkategori]</option>
		</select> </div></td>
      </tr>
      <tr>
        <th>Nama Produk</th>
        <td>
        <div class="col-sm-7">
        <input name="produk" id="produk" type="text" class="form-control">
         </div></td>
      </tr>
      <tr>
        <th>Harga</th>
        <td>
        <div class="col-sm-7">
        <input name="harga" id="harga" type="text" class="form-control"  onkeyup="FormatCurrency(this)">
         </div></td>
      </tr>
        <tr>
        <th>Stok</th>
        <td>
        <div class="col-sm-7">
        <input name="stok" id="stok" type="text" class="form-control">
         </div></td>
      </tr>
        <tr>
        <th>Berat(Kg)</th>
        <td>
        <div class="col-sm-7">
        <input name="berat" id="berat" type="text" class="form-control">
         </div></td>
      </tr>
      <tr>
        <th>Diskon</th>
        <td>
        <div class="col-sm-7">
        <input name="diskon" id="diskon" type="text" class="form-control">
         </div></td>
      </tr>
      <tr>
        <th>Promo</th>
        <td>
        <div class="col-sm-7">
        <label>
       <input  type="checkbox" class="flat-red" name="promo" value="Ya"> Ya<br /> 
		<input type="checkbox" class="flat-red" name="promo" value="Tidak"> Tidak</label>
         </div></td>
      </tr>
         <tr>
        <th>Gambar</th>
        <td>
        <div class="col-sm-7">
        <input type="file" name="file_gambar[]" id="gambar" class="form-control" multiple>
        
         </div></td>
      </tr>
      <tr>
      <th>Keterangan</th>
      <td>
      
     </td>
     </tr>
      <tr>
      
      <td colspan="2">
      <div class="col-md-12">
       <form>
                    <textarea id="keterangan" name="keterangan" rows="10" cols="80">
                      Deskripsi mengenai produk.Bagian ukuran atau pun warna produk, dsb.            
                    </textarea>
              </form>
              </div>
</td>
      </tr>
      <tr>
      <td>&nbsp;</td>
        <td colspan="2" >
       <button name="simpan" class="btn btn-success" title="Klik untuk memyimpan data" pull-right><i class="fa fa-save white"></i> Simpan</button>
         <button  type="reset" class="btn btn-success" title="Ulangi lagi"><i class="fa fa-repeat white"></i> Ulangi</button>
         
        </td>
      </tr>
    </table>
    </form>	
</div>
</div>
</div>
</section>
</div>

<script type="text/javascript" src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script type="text/javascript" src="validasi/js/jquery.validate.js"></script>
<script type="text/javascript" src="validasi/js/bootstrap.js"></script>
<script type="text/javascript" src="validasi/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('keterangan');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

<script type="text/javascript">
	var document = window.document;
		$( document ).ready( function () {
			$( "#frmkat" ).validate( {
				rules: {
					//id: "required",
					produk: "required",
					harga:{required:true,number: true},  
					stok: {required:true,number: true},
                     berat: {
						 required:true,
		                 	maxlength:4,
						 number: true},
					 diskon: {required:true,number: true},
					 keterangn: "required",
					  promo: "required"
				},
				messages: {
					//id: "Mohon maaf Id Kategori belum di isi",
					porduk: "Mohon maaf nama kategori belum di isi",
					 harga:{
                              required:'Maaf harga harus di isi',
                              number  :'Harga hanya boleh di isi dengan angka'},
					stok:{
                              required:'Stok harus di isi',
                              number  :'Hanya boleh di isi Angka'},		
					berat:{
                              required:'Berat harus di isi',
                              number  :'Hanya boleh di isi Angka',
							
							  maxlength:'Maaf maksimal 3 karakter'},		
				   diskon:{
                              required:'Diskon harus di isi',
                              number  :'Hanya boleh di isi Angka'},				    
			       keterangan: "Mohon maaf keterangan belum di isi",
				   promo: "Mohon maaf nama kategori belum di isi"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-7" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-7" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-7" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
				
				
			} );
		} );
	</script>
    <script>function FormatCurrency(objNum)
{
   var num = objNum.value
   var ent, dec;
   if (num != '' && num != objNum.oldvalue)
   {
     num = HapusTitik(num);
     if (isNaN(num))
     {
       objNum.value = (objNum.oldvalue)?objNum.oldvalue:'';
     } else {
       var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
       if (ev.keyCode == 190 || !isNaN(num.split('.')[1]))
       {
         alert(num.split('.')[1]);
         objNum.value = TambahTitik(num.split('.')[0])+'.'+num.split('.')[1];
       }
       else
       {
         objNum.value = TambahTitik(num.split('.')[0]);
       }
       objNum.oldvalue = objNum.value;
     }
   }
}
function HapusTitik(num)
{
   return (num.replace(/\./g, ''));
}

function TambahTitik(num)
{
   numArr=new String(num).split('').reverse();
   for (i=3;i<numArr.length;i+=3)
   {
     numArr[i]+='.';
   }
   return numArr.reverse().join('');
} 
        
function formatCurrency(num) {
   num = num.toString().replace(/\$|\./g,'');
   if(isNaN(num))
   num = "0";
   sign = (num == (num = Math.abs(num)));
   num = Math.floor(num*100+0.50000000001);
   cents = num0;
   num = Math.floor(num/100).toString();
   for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
   num = num.substring(0,num.length-(4*i+3))+'.'+
   num.substring(num.length-(4*i+3));
   return (((sign)?'':'-') + num);
}</script>