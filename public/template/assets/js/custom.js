/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// custom menu active
var path = location.pathname.split('/')
var url = location.origin + '/' + path[1]
$('ul.sidebar-menu li a').each(function () {
    if ($(this).attr('href').indexOf(url) !== -1) {
        $(this).parent().addClass('active').parent().parent('li').addClass('active')
    }
})

// datatables
$(document).ready(function () {
    $('#table1').DataTable();
});

// modal confirmation
function btnHapus(id) {
    $('#del-' + id).submit()
}

// logout
function returnLogout() {
    var link = $('#logout').attr('href')
    $(location).attr('href', link)
}

// modal confirmation
function btnSelesai(id) {
    $('#upd-' + id).submit()
}
// modal ACC Upah
function btnUpah(id) {
    $('#uph-' + id).submit()
}

// modal Bayar Upah
function btnBayar(id) {
    $('#byr-' + id).submit()
}

$(document).ready(function () {

    // get Edit Product
    $('.btn-upah').on('click', function () {

        // get data from button edit
        const id_produksi = $(this).data('id_produksi');
        const id_orderan = $(this).data('id_orderan');
        const id_user = $(this).data('id_user');
        const total_upah = $(this).data('total_upah');
        const status_upah = $(this).data('status_upah');
        const tgl_upah = $(this).data('tgl_upah');

        const nama_pegawai = $(this).data('nama_pegawai');
        const jml_pribadi = $(this).data('jml_pribadi');
        // const jml_konfirmasi = $(this).data('jml_pribadi');

        // Set data to Form Edit

        $('.id_produksi').val(id_produksi);
        $('.id_orderan').val(id_orderan);
        $('.id_user').val(id_user);
        $('.total_upah').val(total_upah);
        $('.status_upah').val(status_upah);
        $('.tgl_upah').val(tgl_upah);

        $('.nama_pegawai').val(nama_pegawai);
        $('.jml_pribadi').val(jml_pribadi);
        // Call Modal Edit
        $('#ModalInfoUpah').modal('show');
    });


});

