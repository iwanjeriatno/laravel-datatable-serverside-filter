// custom language datatable
var customLanguageDatatable = {
    "sLengthMenu": "Tampilkan _MENU_ data",
    "sEmptyTable": "Data tidak ditemukan",
    "sLoadingRecords": "Sedang Proses.. Silahkan Tunggu",
    "sProcessing": "Load Data..",
    "sInfo": "Menampilkan data _START_ - _END_ dari _TOTAL_ total data",
    "sInfoEmpty": "Menampilkan data 0 - 0 dari 0 total data"
};
var customDomPosition = "<'row'<'col-sm-12'tr>>" +
"<'row'<'col-sm-4'l><'col-sm-4 text-center'i><'col-sm-4'p>>";

// multilevel menu with active state parent handler
$('#m_ver_menu ul li').find('a').each(function () {
    if (document.location.href == $(this).attr('href')) {
        $(this).addClass("m-menu__item--active");
        $(this).parents().addClass("m-menu__item--open");
        if (!$(this).parents().parents().hasClass("m-menu__item--open")) {
            $(this).parents().parents().addClass("m-menu__item--expanded");
        }
    }
});
