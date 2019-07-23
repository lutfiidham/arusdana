<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_helper'))
{
	function cap_each_word($string)
	{
		return ucwords(strtolower($string));
	}

	function encrypt_url($string) {
	    $output = false;
	    /*
	    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
	    */        
	    $security       = parse_ini_file("security.ini");
	    $secret_key     = $security["encryption_key"];
	    $secret_iv      = $security["iv"];
	    $encrypt_method = $security["encryption_mechanism"];
	    // hash
	    $key    = hash("sha256", $secret_key);
	    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
	    $iv     = substr(hash("sha256", $secret_iv), 0, 16);
	    //do the encryption given text/string/number
	    $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	    $output = base64_encode($result);
	    return $output;
	}
	
	function decrypt_url($string) {
	    $output = false;
	    /*
	    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
	    */
	    $security       = parse_ini_file("security.ini");
	    $secret_key     = $security["encryption_key"];
	    $secret_iv      = $security["iv"];
	    $encrypt_method = $security["encryption_mechanism"];
	    // hash
	    $key    = hash("sha256", $secret_key);
	    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
	    $iv = substr(hash("sha256", $secret_iv), 0, 16);
	    //do the decryption given text/string/number
	    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    return $output;
	}

	function tanggal_full($tgl)
	{
		$bulanIndo = array('01' => 'Januari' ,
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember' );
		$dd = date_format(date_create($tgl),"d");
		$mm = date_format(date_create($tgl),"m");
		$yy = date_format(date_create($tgl),"Y");
		return $dd.' '.$bulanIndo[$mm].' '.$yy; 
	}

	function bulan_tahun($tgl)
	{
		$bulanIndo = array('01' => 'Januari' ,
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember' );
		$dd = date_format(date_create($tgl),"d");
		$mm = date_format(date_create($tgl),"m");
		$yy = date_format(date_create($tgl),"Y");
		return $bulanIndo[$mm].' '.$yy; 
	}

	function minus_kurung($foo)
	{
		return ($foo < 0 ? "(".format_ribuan_indo(abs($foo),0).")" : format_ribuan_indo($foo,0));
	}

		function list_bulan()
	{
		$bulanIndo = [];
		array_push($bulanIndo,["id" => "01","name" => "Januari"]);
		array_push($bulanIndo,["id" => "02","name" => "Februari"]);
		array_push($bulanIndo,["id" => "03","name" => "Maret"]);
		array_push($bulanIndo,["id" => "04","name" => "April"]);
		array_push($bulanIndo,["id" => "05","name" => "Mei"]);
		array_push($bulanIndo,["id" => "06","name" => "Juni"]);
		array_push($bulanIndo,["id" => "07","name" => "Juli"]);
		array_push($bulanIndo,["id" => "08","name" => "Agustus"]);
		array_push($bulanIndo,["id" => "09","name" => "September"]);
		array_push($bulanIndo,["id" => "10","name" => "Oktober"]);
		array_push($bulanIndo,["id" => "11","name" => "November"]);
		array_push($bulanIndo,["id" => "12","name" => "Desember"]);
		return $bulanIndo;
	}

	function to_date_format_mysql($tgl)
	{
		$str = explode("-", $tgl);
		return $str[2].'-'.$str[1].'-'.$str[0];
	}

	function get_tahun($date)
	{
		return substr($date,0,4);
	}

	function get_nama_bulan($date)
	{
		$bulan = substr($date,5,2);
		$bulanIndo = array('01' => 'Januari' ,
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember' );
		return $bulanIndo[$bulan];
	}

	function get_nama_hari($tanggal)
	{
		$nama_hari = array(
			'0' => 'Minggu',
			'1' => 'Senin',
			'2' => 'Selasa',
			'3' => 'Rabu',
			'4' => 'Kamis',
			'5' => 'Jumat',
			'6' => 'Sabtu'
		);

		$hari = date_format(date_create($tanggal),'w');
		return $nama_hari[$hari];
	}

	function terbilang($satuan){ 
		$huruf = array ( 0 => "", 1=> "Satu", 2 => "Dua", 3 => "Tiga", 4 => "Empat", 5=>"Lima",6=>"Enam",7=>"Tujuh",8=>"Delapan",9=>"Sembilan",10=>"Sepuluh",11=>"Sebelas"); 

		$hasil=""; 
		if($satuan < 12) {
			$hasil = $hasil . $huruf[$satuan]; 
		}else if($satuan < 20) {
			$hasil = $hasil . terbilang($satuan-10)." belas"; 
		}else if($satuan < 100) {
			$hasil= $hasil . terbilang($satuan/10)." puluh " . terbilang($satuan%10); 
		}else if($satuan < 200) {
			$hasil= $hasil . "Seratus " . terbilang($satuan-100); 
		}else if($satuan < 1000) {
			$hasil = $hasil . terbilang($satuan/100). " ratus " . terbilang($satuan%100); 
		}else if($satuan < 2000){
			$hasil = $hasil . "Seribu " . terbilang($satuan-1000); 
		}else if($satuan < 1000000){
			$hasil = $hasil . terbilang($satuan/1000) . " ribu " . terbilang($satuan % 1000); 
		}else if($satuan < 1000000000) {
			$hasil = $hasil . terbilang($satuan/1000000) . " juta " . terbilang($satuan % 1000000); 
		}else if($satuan >= 1000000000){
			$hasil = "Angka terlalu besar, harus kurang dari 1 milyar!"; 
		}
		return $hasil; 
	}

	function acakangkahuruf($panjang)
	{
		$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter{$pos};
		}
		return $string;
	}

	function acakangka($panjang)
	{
		$karakter= '0123456789';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter{$pos};
		}
		return $string;
	}

	function format_ribuan_indo($nilai, $dibelakang_koma)
	{
		return number_format($nilai,$dibelakang_koma,',','.');
	}

	// function format_ribuan_indo_kurung($nilai, $dibelakang_koma)
	// {
	// 	return minus_kurung(number_format($nilai,$dibelakang_koma,',','.'));
	// }

	function get_input_group($name,$label,$cannot_null = false,$type ="text")
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
		$cannot_null_value = ($cannot_null == false)? "" : "required";
		$red_symbol = ($cannot_null == false)? "" : "<span style='color:red'>*</span>";
		$input_group = "<div class='form-group row'> 
		<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
		<div class='col-md-9'>
		<input type='".$type."' id='".$name."' class='form-control ".$cannot_null_class."' placeholder='".$label."' name='".$name."' ".$cannot_null_value.">
		        <span class='help-block'></span>
		</div>
		</div>	";
		return $input_group;
	}

	function get_input_angka_group($name,$label,$cannot_null = false,$type = "text")
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
		$cannot_null_value = ($cannot_null == false)? "" : "required";
		$red_symbol = ($cannot_null == false)? "" : "<span style='color:red'>*</span>";
		$input_group = "<div class='form-group row hanya-angka'> 
		<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
		<div class='col-md-9'>
		<input type='".$type."' id='".$name."' class='form-control ".$cannot_null_class."' placeholder='".$label."' name='".$name."' ".$cannot_null_value.">
		        <span class='help-block'></span>
		</div>
		</div>	";
		return $input_group;
	}

	function get_datepicker_group($name, $label, $cannot_null = false, $min_date = "" , $max_date = "")
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
		date_default_timezone_set('Asia/Jakarta');
		$cannot_null_value = $cannot_null == false ? "" : "required";
		$red_symbol = $cannot_null == false ? "" : "<span style='color:red'>*</span>";
		$min = $min_date == "" ? "" : ",\"startDate: \"" . $min_date . "\",";
		$max = $max_date == "" ? "" : ",\"endDate: \"" . $max_date . "\",";
		$input_group = "
		<div class='form-group row'>
		<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
		<div class='col-md-9'>
		<input type='text' id='".$name."' class='form-control ".$cannot_null_class."' placeholder='".$label." (DD-MM-YYYY)' name='".$name."' ".$cannot_null_value." data-plugin-datepicker data-plugin-options='{\"autoclose\":true,\"todayHighlight\": true,
			\"todayBtn\": true,
			\"format\": \"dd-mm-yyyy\"".$min.$max."}' readonly>
		        <span class='help-block'></span>
		</div>
		</div>";
		return $input_group;
	}

	function get_input($name,$type ="text",$value ="")
	{
		$input = "<input type='".$type."' id='".$name."' class='form-control' placeholder='".$value."' name='".$name."' value='".$value."'>";
      	return $input;
	}

	function get_dropdown_group($name, $label,$cannot_null = false,$list_select = null, $disabled = false)
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
      	$cannot_null_value = $cannot_null == false ? "" : "required";
      	$red_symbol = $cannot_null == false ? "" : "<span style='color:red'>*</span>";
 	 	$disabled_string= $disabled == false ? "" : "disabled";
      	$select = "<select  name='".$name."' id='".$name."' class='form-control ".$cannot_null_class."'".$disabled_string." ".$cannot_null_value.">";
      	if ($list_select!=null) {
      		foreach ($list_select as $val) {
      			$select.='<option value="'.$val['id'].'">'.$val['name'].'</option>';
      		}
      	}
      	$select = $select."</select>";
      	$input_group = "
      	<div class='form-group row'>
        	<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
        	<div class='col-md-9'>
          	".$select."
		        <span class='help-block'></span>
        </div>
      	</div>";
      	return $input_group;
	}

	function get_select2_group($name, $label,$cannot_null = false,$list_select = null, $disabled = false)
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
      	$cannot_null_value = $cannot_null == false ? "" : "required";
      	$red_symbol = $cannot_null == false ? "" : "<span style='color:red'>*</span>";
 	 	$disabled_string= $disabled == false ? "" : "disabled";
      	$select = "<select  name='".$name."' id='".$name."' data-plugin-selectTwo class='form-control populate placeholder ".$cannot_null_class."' ".$disabled_string." data-plugin-options='{\"placeholder\": \"Pilih ".$label."\", \"allowClear\": true }' style='width: 100%' ".$cannot_null_value.">";
      	if ($list_select!=null) {
      		$select.='<option></option>';
      		foreach ($list_select as $val) {
      			$select.='<option value="'.$val['id'].'">'.$val['name'].'</option>';
      		}
      	}
      	$select = $select."</select>";
      	$input_group = "
      	<div class='form-group row'>
        	<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
        	<div class='col-md-9'>
          	".$select."
		        <span class='help-block'></span>
        </div>
      	</div>";
      	return $input_group;
	}


	function get_select2_multiple_group($name, $label,$cannot_null = false,$list_select = null, $disabled = false)
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
      	$cannot_null_value = $cannot_null == false ? "" : "required";
      	$red_symbol = $cannot_null == false ? "" : "<span style='color:red'>*</span>";
 	 	$disabled_string= $disabled == false ? "" : "disabled";
      	$select = "<select  name='".$name."' id='".$name."' multiple data-plugin-selectTwo class='form-control populate placeholder ".$cannot_null_class."' ".$disabled_string." style='width: 100%' ".$cannot_null_value.">";
      	if ($list_select!=null) {
      		$select.='<option></option>';
      		foreach ($list_select as $val) {
      			$select.='<option value="'.$val['id'].'">'.$val['name'].'</option>';
      		}
      	}
      	$select = $select."</select>";
      	$input_group = "
      	<div class='form-group row'>
        	<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
        	<div class='col-md-9'>
          	".$select."
		        <span class='help-block'></span>
        </div>
      	</div>";
      	return $input_group;
	}

	function get_textarea_group($name,$label,$cannot_null = false)
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
		$cannot_null_value = ($cannot_null == false)? "" : "required";
		$red_symbol = ($cannot_null == false)? "" : "<span style='color:red'>*</span>";
		$input_group = "
		<div class='form-group row'> 
		<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
		<div class='col-md-9'>
		<textarea id='".$name."' class='form-control ".$cannot_null_class."' placeholder='".$label."' name='".$name."' ".$cannot_null_value."></textarea>
		        <span class='help-block'></span>
		</div>
		</div>";
		return $input_group;
	}

	function get_timepicker_group($name,$label,$cannot_null = false,$minute_step = null)
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
		$cannot_null_value = ($cannot_null == false)? "" : "required";
		$red_symbol = ($cannot_null == false)? "" : "<span style='color:red'>*</span>";
		$format_24 = "\"showMeridian\": false,";
		$interval = $minute_step == null ? "" : "\"minuteStep\":".$minute_step."";
		$input_group = "<div class='form-group row'> 
		<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
		<div class='col-md-9'>
		<input type='text' id='".$name."' data-plugin-timepicker data-plugin-options='{".$format_24.$interval."}'; ".$format_24." class='form-control ".$cannot_null_class."' placeholder='".$label."' name='".$name."' ".$cannot_null_value." readonly>
		        <span class='help-block'></span>
		</div>
		</div>";
		return $input_group;
	}

	function get_autonumeric_group($name,$label,$cannot_null = false,$minute_step = null)
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
		$cannot_null_value = ($cannot_null == false)? "" : "required";
		$red_symbol = ($cannot_null == false)? "" : "<span style='color:red'>*</span>";
		$input_group = "<div class='form-group row'> 
		<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
		<div class='col-md-9'>
		<input type='text' id='".$name."' class='form-control autonumeric ".$cannot_null_class."' placeholder='".$label."' name='".$name."' ".$cannot_null_value.">
		        <span class='help-block'></span>
		</div>
		</div>";
		return $input_group;
	}

	function get_summernote_group($name,$label,$cannot_null = false)
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
		$cannot_null_value = ($cannot_null == false)? "" : "required";
		$red_symbol = ($cannot_null == false)? "" : "<span style='color:red'>*</span>";
		$input_group = "
		<div class='form-group row'> 
		<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
		<div class='col-md-9'>
		<textarea class='summernote ".$cannot_null_class."' id='".$name."' data-plugin-summernote data-plugin-options='{ \"height\": 180, \"codemirror\": { \"theme\": \"ambiance\" } }' style='display: none;' class='form-control' placeholder='".$label."' name='".$name."' ".$cannot_null_value."></textarea>
		        <span class='help-block'></span>
		</div>		
		</div>";
		return $input_group;
	}

	function get_upload_img_group($name,$label,$cannot_null = false)
	{
		$cannot_null_class = ($cannot_null == false)? "" : "cannot-null";
		$cannot_null_value = ($cannot_null == false)? "" : "required";
		$red_symbol = ($cannot_null == false)? "" : "<span style='color:red'>*</span>";
		$input_group = "<div class='form-group row'> 
		<label class='col-md-3 control-label' for='".$name."'>".$label." ".$red_symbol."</label>
		<div class='col-md-9'>
		<input type='file' id='".$name."' class='form-control ".$cannot_null_class."' placeholder='".$label."' name='".$name."' ".$cannot_null_value.">
		        <span class='help-block'></span>
		</div>
		</div><div class='form-group row'><label class='control-label col-md-3 col-sm-3 col-xs-12' for='view_".$name."'>Preview ".$label."
                            </label>
                            <div class='col-md-6 col-sm-6 col-xs-12'>
                                <img src='' id='view_".$name."' alt='".$label."' class='image-responsive' height='150'>
                            </div>
                        </div>
		<script type='text/javascript'>
		    $('#".$name."').change(function(event) {
				var reader = new FileReader();
		        reader.onload = function(){
		            var output = document.getElementById('view_".$name."');
		            output.src = reader.result;
		        };
		        reader.readAsDataURL(event.target.files[0]);
    		});
		</script>
                        ";
		return $input_group;
	}

}