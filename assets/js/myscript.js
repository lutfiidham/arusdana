var myscript_js = {
    base_url: null,
    notifikasi: function(pesan,warna=null,posisi="top-right"){
    	var loaderBg = {}
    	loaderBg.success = '#f96868';
    	loaderBg.info = '#46c35f';
    	loaderBg.error = '#f2a654';
    	loaderBg.warning = '#57c7d4';

    	var title = {}
    	title.success = 'Sukses';
    	title.info = 'Info';
    	title.error = 'Error';
    	title.warning = 'Peringatan';

	    $.toast({
	      heading: warna? title[warna] : title.info,
	      text: pesan,
	      showHideTransition: 'slide',
	      icon: warna? warna : 'info',
	      loaderBg: warna ? loaderBg[warna] : loaderBg.info,
	      position: posisi
	    })
    },
    random_string_number: function (length) {
	    var text = "";
	    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	    for (var i = 0; i < length; i++)
	        text += possible.charAt(Math.floor(Math.random() * possible.length));

	    return text;
	},
	random_string: function (length) {
	    var text = "";
	    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

	    for (var i = 0; i < length; i++)
	        text += possible.charAt(Math.floor(Math.random() * possible.length));

	    return text;
	},
	random_string_upcase: function (length) {
	    var text = "";
	    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	    for (var i = 0; i < length; i++)
	        text += possible.charAt(Math.floor(Math.random() * possible.length));

	    return text;
	},
	random_string_lowcase: function (length) {
	    var text = "";
	    var possible = "abcdefghijklmnopqrstuvwxyz";

	    for (var i = 0; i < length; i++)
	        text += possible.charAt(Math.floor(Math.random() * possible.length));

	    return text;
	},
	random_number: function (length) {
	    var text = "";
	    var possible = "0123456789";

	    for (var i = 0; i < length; i++)
	        text += possible.charAt(Math.floor(Math.random() * possible.length));

	    return text;
	},
    hanyaAngka: function(){
    	$('.hanya-angka').keypress(function(evt) {
	        var charCode = (evt.which) ? evt.which : event.keyCode
	        if (charCode > 31 && (charCode < 48 || charCode > 57))
	            return false;
	        return true;
    	});
    },
    toDate: function (val) {
	    if (val != null) {
        var from = val.split("-");
	        return (from[2]+'-'+from[1]+'-'+ from[0]);
	    }else {
	        return '';
	    }
    },
    formatMoney: function (a, c, d, t) {
        // a = 47000
        // c = 2
        // d = ,
        // t = .
        // result = 47.000,00
        var n = a,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    },
    reverse_format_ribuan : function(teks){
        var hasil = teks.replace(/\D/g, '');
        return hasil;
    },
    tgl_picker: function(){
    	$('.tgl').attr('data-toggle', 'datetimepicker');
        $('.tgl').datetimepicker({
            format: 'DD-MM-YYYY',
            autoclose: true,
        });
    },
    jam_picker: function(){
    	$('.jam').attr('data-toggle', 'datetimepicker');
        $('.jam').datetimepicker({
        	locale:'id',
            format: 'LT',
            autoclose: true,
        });
    },
    year_picker: function(){
    	$('.tahun').attr('data-toggle', 'datetimepicker');
        $('.tahun').datetimepicker({
        	locale:'id',
            format: 'YYYY',
            viewMode: 'years',
            autoclose: true,

        });
    },
    daterange_picker: function(){
    	$('.tgl_range').daterangepicker({
            "showDropdowns": true,
            "linkedCalendars": false,
            "locale" :{
                "separator": " s.d. ",
                "applyLabel": "Pilih",
                "cancelLabel": "Batal",
                "fromLabel": "Dari",
                "toLabel": "Sampai",
                "format" : "DD-MM-YYYY"
            },
            "cancelClass": "btn-danger"
        });
    },
    combobox: function(){
    	$(".cmb_select2").css('width', '100%');
    	$(".cmb_select2").select2({
            placeholder:"Pilih salah satu",
    	}
    	);
    },
    combobox_clr: function(){
        $(".cmb_select2_clr").css('width', '100%');
        $(".cmb_select2_clr").select2({
            placeholder:"Pilih salah satu",
            allowClear:true,
        }
        );
    },
   	editor: function(){
	    $('.editor').summernote({
	      height: 300,
	      tabsize: 2
	    });
   	},
   	autonumber:function(){
	    $('.autonumeric').autoNumeric('init', {
	        aSep: '.', 
	        aDec: ',',
	        aForm: true,
	        vMax: '999999999999999',
	        vMin: '0',
	        mDec: 0,
	    });
   	},
    switcher:function(){
        var elemprimary = document.querySelector('.switcher');
        var switchery = new Switchery(elemprimary, {
            color: '#4099ff',
            jackColor: '#fff'
        });
    },
   	blok: function(){
   		$.blockUI({ message: '<h4> <img src="'+myscript_js.base_url+'assets/img/progress.svg" />  Silahkan tunggu . . . </h4>',
              css: {  border: 'none', 
                      padding: '10px', 
                      backgroundColor: 'white', 
                      '-webkit-border-radius': '10px', 
                      '-moz-border-radius': '10px', 
                      opacity: 1
            },
            baseZ: 10080
      });
   	},
    unblok: function(){
        $.unblockUI();
    },
    swalert: function(title, content, type = "info") {
    	swal(title, content, type);
  	},
  	swconfirm: function(title,content,ok_action,param=null) {
	    swal({
	        title: title,
	        text: content,
	        type: "warning",
		  	buttons: {
			  confirm: {
			    text: "Ya",
			    value: true,
			    visible: true,
			    className: "",
			    closeModal: true
			  },
			   cancel: {
			    text: "Tidak",
			    value: false,
			    visible: true,
			    className: "",
			    closeModal: true,
			  },
			}
	    }).then((value) => {
			if (value) {
				ok_action(param)
			}
		});
	},
    file_upload_custom: function(){
        $('.file-upload-browse').on('click', function() {
	      var file = $(this).parent().parent().parent().find('.file-upload-default');
	      file.trigger('click');
	    });
	    $('.file-upload-default').on('change', function() {
	      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	    });
    },
    init: function(base_url){
    	myscript_js.base_url= base_url;
    	myscript_js.hanyaAngka();
    	myscript_js.tgl_picker();
    	myscript_js.jam_picker();
    	myscript_js.year_picker();
    	myscript_js.daterange_picker();
    	myscript_js.file_upload_custom();
        myscript_js.combobox();
    	myscript_js.combobox_clr();
    	myscript_js.editor();
        myscript_js.autonumber();
    	// myscript_js.switcher();
    }

};