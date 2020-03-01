$(document).ready(function () {
	$('#myModal').modal('show');
	// $('#dataTable').DataTable();

	var table;
	$(document).ready(function () {

		//datatables
		table = $('#table').DataTable({

			"processing": true,
			"serverSide": true,
			"language": {
				"infoFiltered": ""
			},
			"order": [],

			"ajax": {
				"url": base_url + "admin/get_data_user",
				"type": "POST",
				"data": function (data) {
					data.id = $('#filgen').children("option:selected").val();
					data.id2 = $('#filgen2').children("option:selected").val();
				},

				"dataSrc": function (json) {
					//Make your callback here.
					// console.log(json);
					if (json.mctitle == "") {
						$('.mct').html();
					} else {

						$('.mct').html(json.mctitle);
					}
					return json.data;
				},
			},
			"columnDefs": [{
					"targets": [0],
					"orderable": false,
				},
				{
					"targets": [8],
					"render": function (data, type, row, meta) {
						return '<img data-toggle="modal" data-target="#profilepic" class="img-thumbnail rounded-circle shadow picthumb" src="' + base_url + "assets/img/profile/" + data + '" data-img="' + data + '" style="width:100px;">';

					}
				},
				{
					"targets": [9],
					"render": function (data, type, row, meta) {
						if (data == 1) {
							return '<td class="text-center"><div class="custom-control custom-switch text-center"><input type="checkbox" class="custom-control-input genact" id="isactgen' + row[1] + '" data-id="' + data + '" data-gen="' + row[10] + '" checked><label class="custom-control-label" for="isactgen' + row[1] + '"></label></div></td>';
						} else {
							return '<td class="text-center"><div class="custom-control custom-switch text-center"><input type="checkbox" class="custom-control-input genact" id="isactgen' + row[1] + '" data-id="' + data + '" data-gen="' + row[10] + '"><label class="custom-control-label" for="isactgen' + row[1] + '"></label></div></td>';
						}


					}
				},
				{
					"targets": [10],
					"render": function (data, type, row, meta) {
						return ' <td scope="col"><a href="' + base_url + 'admin/editGen/' + data + '" class="btn btn-info btn-circle btn-sm"><i class="far fa-edit"></i></a>\r\n<a href="#" class="btn btn-danger btn-circle btn-sm delete"><i class="fas fa-trash"></i></a></td>';
					},
				},
			],

		});
		$('#filgen').on('change', function () {
			table.ajax.reload();
		})
		$('#filgen2').on('change', function () {
			table.ajax.reload();
		})

	});

	$('.datamaster').dataTable({
		pageLength: 5,
		info: false,
		"lengthMenu": [
			[5, 10, 20, -1],
			[5, 10, 20, "All"]
		],
		language: {
			search: ""
		},
	});


	$('.dataTables_filter input[type="search"]').
	attr('placeholder', 'Type to Search')
	$('.dataTables_filter input[type="search"]').css({
		'width': '150px',
		'display': 'inline-block'
	});

	$('#table tbody').on('mouseenter', 'tr td .picthumb', function () {
		$(this).removeClass("shadow");
	})
	$('#table tbody').on('mouseleave', 'tr td .picthumb', function () {
		$(this).addClass("shadow");
	})
	$('#table tbody').on('click', 'tr td .picthumb', function () {
		const profpic = $(this).data("img");
		$('.modal-body img').attr('src', base_url + 'assets/img/profile/' + profpic);
	})
	$('#table tbody').on('click', 'tr td .delete', function () {
		var row = $(this).parents('tr')[0];
		var mydata = (table.row(row).data());
		var con = confirm("Konfirmasi Penghapusan " + mydata[1])
		if (con) {
			// Do Something
			window.location.href = base_url + 'admin/deleteGen/' + mydata[10];
		}
	})

	$('#table tbody').on('click', 'tr td .genact', function () {

		const isact = $(this).data('id');
		const userId = $(this).data('gen');
		$.ajax({
			'url': base_url + 'admin/editgenAct',
			'method': 'post',
			'data': {
				isact: isact,
				userId: userId
			},
			success: function () {
				window.location.href = base_url + 'admin';
			}
		})
	})
	$('.img-thumbnail').on('click', function () {
		const profpic = $(this).data("img");
		$('.modal-body img').attr('src', base_url + 'assets/img/profile/' + profpic);
	})

	$('#tbPresensi').dataTable();

})

$('.useract').on('click', function () {

	const isact = $(this).data('id');
	const userId = $(this).data('user');

	$.ajax({
		'url': base_url + 'SuperAdmin/editAct',
		'method': 'post',
		'data': {
			isact: isact,
			userId: userId
		},
		success: function () {
			window.location.href = base_url + 'SuperAdmin/dataAdmin';

		}
	})
})

$('.menuact').on('click', function () {

	const isact = $(this).data('isact');
	const userId = $(this).data('sm');


	$.ajax({
		'url': base_url + 'menu/editAct',
		'method': 'post',
		'data': {
			isact: isact,
			userId: userId
		},
		success: function () {
			window.location.href = base_url + 'menu/submenu';

		}
	})
})

$('.exmenuact').on('click', function () {

	const isact = $(this).data('isact');
	const userId = $(this).data('sm');


	$.ajax({
		'url': base_url + 'menu/editexAct',
		'method': 'post',
		'data': {
			isact: isact,
			userId: userId
		},
		success: function () {
			window.location.href = base_url + 'menu/extraSm';
		}
	})
})



$('button.float-right').on('click', function () {
	$('#dar').val('');
	$('#modalDaerahLabel').html("Daerah Baru");
	$('#butdar').html("Tambah");
	$('#formdar').attr('action', 'tambahDaerah');

	$('#des').val('');
	$('#modalDesaLabel').html("Desa Baru");
	$('#butdes').html("Tambah");
	$('#formdes').attr('action', 'tambahDesa');

	$('#kel').val('');
	$('#modalKelompokLabel').html("Kelompok Baru");
	$('#butkel').html("Tambah");
	$('#formkel').attr('action', 'tambahKel');

	$('#lev').val('');
	$('#modalLevelLabel').html("Tambah Level");
	$('#butlev').html("Tambah");
	$('#formlev').attr('action', 'level');
})

$('.editdar').on('click', function () {
	$('#modalDaerahLabel').html("Edit Daerah");
	$('#butdar').html("Simpan");
	$('#formdar').attr('action', 'editid');


	const id = $(this).data("id");
	const table = '';

	$.ajax({
		'url': base_url + 'SuperAdmin/sentid',
		'method': 'post',
		'dataType': 'json',
		'data': {
			id: id,
			t: 'daerah'
		},
		success: function (d) {
			const id = d['id'];
			const nama = d['nama'];

			$('#dar').val(nama);
			$('#id').val(id);
		}
	})
})

$('.editdes').on('click', function () {
	$('#modalDesaLabel').html("Edit Desa");
	$('#butdes').html("Simpan");
	$('#formdes').attr('action', 'editiddes');


	const id = $(this).data("id");
	const table = '';

	$.ajax({
		'url': base_url + 'SuperAdmin/sentid',
		'method': 'post',
		'dataType': 'json',
		'data': {
			id: id,
			t: 'desa'
		},
		success: function (d) {
			const id = d['id'];
			const nama = d['nama'];

			$('#des').val(nama);
			$('#iddes').val(id);
		}
	})
})

$('.editkel').on('click', function () {
	$('#modalKelompokLabel').html("Edit Kelompok");
	$('#butkel').html("Simpan");
	$('#formkel').attr('action', 'editidkel');


	const id = $(this).data("id");
	const table = '';

	$.ajax({
		'url': base_url + 'SuperAdmin/sentid',
		'method': 'post',
		'dataType': 'json',
		'data': {
			id: id,
			t: 'kelompok'
		},
		success: function (d) {
			const id = d['id'];
			const nama = d['nama'];

			$('#kel').val(nama);
			$('#idkel').val(id);
		}
	})
})

$('.editlev').on('click', function () {
	$('#modalLevelLabel').html("Edit Level");
	$('#butlev').html("Simpan");
	$('#formlev').attr('action', 'editlev');


	const id = $(this).data("id");
	const table = '';

	$.ajax({
		'url': base_url + 'SuperAdmin/sentid',
		'method': 'post',
		'dataType': 'json',
		'data': {
			id: id,
			t: 'level'
		},
		success: function (d) {
			const id = d['id'];
			const nama = d['nama_level'];

			$('#lev').val(nama);
			$('#idlev').val(id);
		}
	})
})


$(document).on('shown.bs.modal', function () {
	$('#dar').focus();
	$('#des').focus();
	$('#kel').focus();
})

$('#csvinput').on('change', function () {
	//get the file name
	var fileName = $(this).val().slice(12, 356);
	//replace the "Choose a file" label
	$(this).next('.custom-file-label').html(fileName);
})
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})




$('.accsact').on('click', function () {
	const levelid = $(this).data("levelid");
	const menuid = $(this).data("menuid");

	$.ajax({
		'url': base_url + 'superAdmin/editAccs',
		'method': 'post',
		'data': {
			levelid: levelid,
			menuid: menuid
		},
		success: function () {
			window.location.href = base_url + 'superAdmin/editAccess/' + levelid;
		}
	})
})

$('#filterkel').on('change', function () {
	$('#tbkel tbody tr').remove();
	var inputfil = $('#filterkel').val();
	var postmc = $('#postmc').val();
	var postidjk = $('#postidjk').val();
	var postseg = $('#postseg').val();


	$.ajax({
		'url': base_url + 'admin/filterkel',
		'method': 'post',
		'data': {
			inputfil: inputfil,
			postmc: postmc,
			postidjk: postidjk,
			postseg: postseg
		},
		'dataType': 'json',
		success: function (data) {
			$('#tbkel tbody').append(data);
		}
	})
})

$('#tbkel').dataTable({
	"info": false
});


$('.presensigen').on('click', function () {
	var genid = $(this).data('genid');
	var kegiatan = $(this).data('kegitan');

	console.log(genid);

	$.ajax({
		'url': base_url + 'admin/presensihadir',
		'method': 'post',
		'data': {
			genid: genid,
			kegiatan: kegiatan
		},
		'dataType': 'json',
		success: function (data) {
			// console.log(data['cekdata']);
			$('.alertpre').show();
			if (data['cekdata'] == 0) {
				$('.hadir').removeClass('alert-success');
				$('.hadir').addClass('alert-warning');
				$('[data-genidket="' + genid + '"]').removeAttr('disabled')
				$('.hadir').html(data['datagen']['nama'] + ' Alpa');
				$('[data-genidket="' + genid + '"]').siblings('div').find('.simpanket').removeAttr('disabled', 'disabled');
			} else {
				$('.hadir').removeClass('alert-warning');
				$('.hadir').addClass('alert-success');
				$('[data-genidket="' + genid + '"]').attr('disabled', 'disabled')
				$('.hadir').html(data['datagen']['nama'] + ' hadir');
				$('[data-genidket="' + genid + '"]').siblings('div').find('.simpanket').attr('disabled', 'disabled');
			}
		}
	})

})

const ab = $('#cekses').data('ses');
$.ajax({
		'url': base_url + 'silsilah/ajx_parent',
		'dataType': 'json'
	})
	.done(function (data) {
		$('#chart-container').orgchart({
			'data': data[0],
			'visibleLevel': 100,
			'nodeContent': 'title',
			'nodeID': 'id',
			'exportButton': true,
			'exportFilename': 'Silsilah',
			'exportFileextension': 'jpg',
			'initCompleted': function ($chart) {
				var $container = $('#chart-container');
				$container.scrollLeft(($container[0].scrollWidth - $container.width()) / 2);
			},
			'createNode': function ($node, data) {
				console.log(ab);
				var view =
					'<div class="second-menu" data-toggle="modal" data-target="#view" data-id="' + data['id'] + '"><i class="fa fa-info-circle second-menu-icon"></i></div>';
				if (ab.length > 1) {
					var create =
						'<div class="second-menu-create" data-toggle="modal" data-target="#create" data-title="' + data['title'] + '" data-name="' + data['name'] + '" data-id="' + data['id'] + '"><i class="fa fa-plus-circle second-menu-icon-create"></i></div>';
				} else {
					var create = '';
				}
				$node.prepend(create).append(view);

			}
		});
	});
$('.modal').on('shown.bs.modal', function () {
	$(this).find('[autofocus]').focus();
});
$('#chart-container').on('click', 'tr td .second-menu', function () {

	let id = $(this).data('id');

	$.ajax({
		'url': base_url + 'silsilah/datapar',
		'type': 'post',
		'dataType': 'json',
		'data': {
			id: id
		},
		'success': function (data) {
			$('.modalView .pict1').attr('src', '');
			$('.modalView .nama1').html('');
			$('.modalView .ttl1').html('');
			$('.modalView .no1').html('');
			$('.modalView .alamat1').html('');

			$('.modalView .pict2').attr('src', '');
			$('.modalView .nama2').html('');
			$('.modalView .ttl2').html('');
			$('.modalView .no2').html('');
			$('.modalView .alamat2').html('');

			$('.modal-footer a').attr('href', '');
			$(this).find('[autofocus]').focus();
			$('.modalView .pict1').attr('src', base_url + 'assets/img/profile/' + data['pict_1']);
			$('.modalView .nama1').html(data['name']);
			$('.modalView .ttl1').html(data['tempat_lahir_1'] + ', ' + data['tgl_lahir_1']);
			$('.modalView .no1').html(data['no_hp_1']);
			$('.modalView .alamat1').html(data['alamat_1']);

			$('.modalView .pict2').attr('src', base_url + 'assets/img/profile/' + data['pict_2']);
			$('.modalView .nama2').html(data['title']);
			$('.modalView .ttl2').html(data['tempat_lahir_2'] + ', ' + data['tgl_lahir_2']);
			$('.modalView .no2').html(data['no_hp_2']);
			$('.modalView .alamat2').html(data['alamat_2']);

			$('.modal-footer a').on('click', function () {
				var con = confirm("Konfirmasi Penghapusan " + data['name']);
				if (con) {
					$('.modal-footer a').attr('href', base_url + 'silsilah/pardel?id=' + data['idp']);
				}
			});
			let edit = '<button data-idedit="' + data['idp'] + '" class="btn btn-success second-menu-edit" data-toggle="modal" data-target="#edit"><i class="far fa-edit"></i></button>'
			$('.second-menu-edit').remove();
			$('.footerview').append(edit);
		}
	})
})
$('#chart-container').on('click', 'tr td .second-menu-create', function () {

	let id = $(this).data('id');
	let name = $(this).data('name');
	let title = $(this).data('title');

	$('.modalCreate .idpar').val(id);
	$('.modalCreate .namapar1').val(name);
	$('.modalCreate .namapar2').val(title);

})

$('#view').on('click', '.modal-footer button', function () {

	let ids = $(this).data('idedit');
	$.ajax({
		'url': base_url + 'silsilah/datapar',
		'type': 'post',
		'dataType': 'json',
		'data': {
			id: ids
		},
		'success': function (data) {
			$('.modalEdit .nama1').attr('value', data['name']);
			$('.modalEdit .nama2').attr('value', data['title']);
			$('.modalEdit .tempat1').attr('value', data['tempat_lahir_1']);
			$('.modalEdit .tempat2').attr('value', data['tempat_lahir_2']);
			$('.modalEdit .tgl1').attr('value', data['tgl_lahir_1']);
			$('.modalEdit .tgl2').attr('value', data['tgl_lahir_2']);
			$('.modalEdit .no1').attr('value', data['no_hp_1']);
			$('.modalEdit .no2').attr('value', data['no_hp_2']);
			$('.modalEdit .alamat1').attr('value', data['alamat_1']);
			$('.modalEdit .alamat2').attr('value', data['alamat_2']);
			$('.modalEdit .id').attr('value', data['idp']);
			$('.modalEdit .idpar').attr('value', data['parent_id']);
			console.log(data);
		}
	})
})

$(document).ready(function () {
	$('.slick-img').slick({
		arrows: true,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		prevArrow: "<div class='slick-prev'><i class='fa fa-angle-left'></i></div>",
		nextArrow: "<div class='slick-next'><i class='fa fa-angle-right'></i></div>",
		responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					// dots: true,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1.,
					infinite: true,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		],
	});
});
