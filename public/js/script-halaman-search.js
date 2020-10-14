const slider1 = document.getElementById("slider1");
const slider2 = document.getElementById("slider2");
noUiSlider.create(slider1, {
    start: [0, 13],
    connect: true,
    step: 1,
    range: {
        min: 0,
        max: 13,
    },
    format: wNumb({
        decimals: 0,
        suffix: " j",
    }),
});

noUiSlider.create(slider2, {
    start: [0, 13],
    connect: true,
    step: 1,
    range: {
        min: 0,
        max: 13,
    },
    format: wNumb({
        decimals: 0,
        suffix: " j",
    }),
});

// Ubah durasi per transit ketika nilai input range di update
slider1.noUiSlider.on("update", function (values, handle) {
    $("#section2Content .text-duration .text-hour").html(
        values[0] + " - " + values[1]
    );
});

// Ubah total durasi perjalanan ketika input range di update
slider2.noUiSlider.on("update", function (values, handle) {
    $("#section7Content .text-duration .text-hour").html(
        values[0] + " - " + values[1]
    );
});

// Plugin Input Spinner
let config = {
    incrementButton: "<i class='fa fa-plus'></i>",
    decrementButton: "<i class='fa fa-minus'></i>",
    buttonsClass: "border btn-outline-warning btn-passenger",
    buttonsOnly: true,
    groupClass: "input-passenger",
};

$("input[type='number']").inputSpinner(config);

/**
 * Cek apakah input kosong atau tidak
 * jika kosong, maka isi kembali dengan nilai sebelumnya
 */
// const bandaraAsal = $("#inputBandaraAsal").val();
// const bandaraTujuan = $("#inputBandaraTujuan").val();
// $(".box-flightform-airport .form-control").blur(function () {
//     if (!$(this).val()) {
//         if ($(this).attr("id") == "inputBandaraAsal") {
//             $(this).val(bandaraAsal);
//         } else {
//             $(this).val(bandaraTujuan);
//         }
//     }
// });

let tanggalBerangkat = $("#inputTanggalBerangkat").val();
let tanggalPulang = $("#inputTanggalPulang").val();

$("input[id*='inputTanggal']").on("hide", function (e) {
    if (!$(e.target).val()) {
        if ($(e.target).attr("id") == "inputTanggalBerangkat") {
            $(e.target).val(tanggalBerangkat);
        } else {
            $(e.target).val(tanggalPulang);
        }
    }
});

$(".cabin-class").on("click", function () {
    let kelasKabin = $.trim($(this).text().toLowerCase());
    $("input[name='kelas']").val(kelasKabin);
});

function formatBandara(bandara) {
    if (!bandara.id) {
        return bandara.text;
    }
    let $bandara = $(
        `<i class="fa fa-city mr-2"></i><span>${bandara.text} </span><span class="dropdown-option-code ml-auto text-center">${bandara.id}</span>`
    );
    return $bandara;
}

$("#selectBoxBandara1").select2({
    dropdownParent: $("#containerBandaraAsal"),
    templateResult: formatBandara,
});

$("#selectBoxBandara2").select2({
    dropdownParent: $("#containerBandaraTujuan"),
    templateResult: formatBandara,
});

$("#selectBoxBandara1").on("select2:select", function (e) {
    let data = e.params.data;
    $("input[name='nama_bandara_asal']").val(data.text);
});

$("#selectBoxBandara2").on("select2:select", function (e) {
    let data = e.params.data;
    $("input[name='nama_bandara_tujuan']").val(data.text);
});
// $.ajaxSetup({
//     headers: {
//         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//     },
// });

// $(".btn-change-search").on("click", function (e) {
//     e.preventDefault();

//     const bandaraAsal = $(
//         ".wrapper-change-search input[name='bandara_asal']"
//     ).val();
//     const bandaraTujuan = $(
//         ".wrapper-change-search input[name='bandara_tujuan']"
//     ).val();
//     const tanggalBerangkat = $(
//         ".wrapper-change-search input[name='tanggal_berangkat']"
//     ).val();
//     const tanggalPulang = $(
//         ".wrapper-change-search input[name='tanggal_pulang']"
//     ).val();
//     const dewasa = $("#adultPassenger").val();
//     const anak = $("#childPassenger").val();
//     const bayi = $("#infantPassenger").val();
//     const jumlahPenumpang = dewasa + anak + bayi;
//     const kelasKabin = $.trim($(".cabin-class.selected").text());

//     $.ajax({
//         url: "/pesawat/search/ubah",
//         method: "get",
//         dataType: "json",
//         data: {
//             bandaraAsal: bandaraAsal,
//             bandaraTujuan: bandaraTujuan,
//             tanggalBerangkat: tanggalBerangkat,
//             tanggalPulang: tanggalPulang,
//             dewasa: dewasa,
//             anak: anak,
//             bayi: bayi,
//             jumlahPenumpang: jumlahPenumpang,
//             kelasKabin: kelasKabin,
//         },
//         success: function (data) {
//             let persen = 0;
//             $(".progress").removeClass("d-none");
//             let timer = setInterval(function () {
//                 persen = persen + 20;
//                 progressBarProcess(persen, timer);
//             }, 500);
//             let request = data.request;
//             // Tutup modal ubah penerbangan
//             $("#changeSearchModal").modal("hide");

//             // Atur nilai input Form sesuai dengan request
//             $(".wrapper-change-search input[name='bandaraAsal']").val(
//                 request.bandaraAsal
//             );
//             $(".wrapper-change-search input[name='bandaraTujuan']").val(
//                 request.bandaraTujuan
//             );
//             $(".wrapper-change-search input[name='tanggalBerangkat']").val(
//                 request.tanggalBerangkat
//             );
//             $(".wrapper-change-search input[name='tanggalPulang']").val(
//                 request.tanggalPulang
//             );

//             let penerbangan = data.penerbangan[0];
//             console.log(penerbangan);
//             $(".preview-flight .text-airport").html(penerbangan.bandara_asal);
//             $(".preview-flight .text-airport-code").html(
//                 penerbangan.kode_bandara_asal
//             );
//         },
//     });
// });

// function progressBarProcess(persen, timer) {
//     $(".progress-bar").css("width", persen + "%");
//     if (persen > 100) {
//         clearInterval(timer);
//         $(".progress").addClass("d-none");
//         $(".progress-bar").css("width", "0%");
//     }
// }

$("#selectBoxBandaraAsal").select2({
    dropdownParent: $("#containerBandaraAsal"),
});
