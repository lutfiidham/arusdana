<html>
<head>
  <style>
    @page { 
        <?php if(isset($no_header)){} else{ ?>
    	margin-top: 130px;
        <?php } ?>
        <?php if(isset($no_footer)){} 
        else if(isset($footer_corporate)){ ?>
        margin-bottom: 85px;
        <?php }else{ ?>
    	margin-bottom: 65px;
        <?php } ?>
    }
    <?php if(isset($no_header)){} else{ ?>
    #header { 
    	position: fixed;
    	left: 0px;
    	top: -100px;
    	right: 0px;
    	height: 100px;
    	text-align: center; 
    	/*background-color: red;*/
   	}
    <?php } ?>
    

    <?php if(isset($no_footer)){} else{ ?>
    #footer { 
        padding-left: 10px;
        position: fixed;
        right: 0px;
        bottom: -45px;
        height: 30px;
        /*background-color: rgb(194,220,158,0.2);*/
        font-size: 11px;
        text-align: center;
    }
    #footer_corporate { 
    	padding-top: 10px;
    	position: fixed;
    	right: 0px;
    	bottom: -60px;
    	height: 70px;
    	text-align: right;
    }
    #footer .page::after, #footer_corporate .page::after { 
    	content: counter(page); 
    }


    <?php } ?>
    td {
        padding:2px;
        font-size: 14px;
        word-break:break-all; 
        word-wrap:break-word;
    }

    th {
        padding:2px;
        font-size: 14px;
        font-weight: bold;
    }


    .data-center{
        text-align: center;
    }

    .data-left{
        text-align: left;
    }

    .data-right{
        text-align: right;
    }

    .data-justify{
        text-align: justify;
    }



    
  </style>
  <?php if (isset($kupon)): ?>
  <?php endif ?>
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
<body">
    
    <?php if(isset($no_header)){} else{ ?>
    <div id="header">
        <span style="font-weight:bold; font-size:18px"> SamaktaMitra </span><br>
	    <img src="assets/img/logo.png" style="width:auto;position:fixed; left:0px; top:-100px;height:50px">
	    <span style="font-size:16px">Alamat Lengkap, Kota - Kode Pos</span><br>
        <span style="font-size:16px">T : Telepon | F : Faximile</span><br>
	    <span style="font-size:16px">E : Email</span><br>
	    <hr>
  	</div>
    <?php } ?>


    <?php if(isset($no_footer)){} else if(isset($footer_corporate)){ ?>
    <div id="footer_corporate">
        <img src="" style="width:100%; height: 10px;margin-bottom: 5px; ">    
        <div style="background-color: transparent; position: absolute; right: 1px; width: 30px; height: 30px; padding: 10px; bottom:0px;">
            <span class="page" style="text-align: right; font-size: x-large; z-index: 9999; color: white; font-weight: bold; "></span>
        </div>
        <img src="" style="width:300px; height: auto; position: absolute; overflow-y: auto; top:35px; left: 10px; ">    
        <img src="" style="width:50px; height: auto; position: absolute; z-index: -1; top:35px; left:980px;">    
    </div>
    <?php } else{ ?>
    <div id="footer">
        <hr>
        Hal. <span class="page"></span><br>
        Dicetak pada <?php echo date('d-m-Y H:i:s') .' | oleh '. $this->session->nama.'';  ?>
    </div>
    <?php } ?>


  	<div id="content" style="margin-top: -10px">
    	<?php 
			echo $html;
		?>
  	</div>
</body>
</html>