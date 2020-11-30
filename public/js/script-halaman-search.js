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

//Ini digunakan untuk mengisi kembali inputan tanggal yang kosong
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
    $("input[name='class']").val(kelasKabin);
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

// $(".change s").on("submit", function (e) {
//     $.ajax({
//         url: "/pesawat/search/edit",
//         method: "get",
//         dataType: "json",
//         data: $(this).serialize(),
//         success: function (data) {
//             console.log(data);
//             let persen = 0;
//             $(".progress").removeClass("d-none");
//             let timer = setInterval(function () {
//                 persen = persen + 20;
//                 progressBarProcess(persen, timer);
//             }, 500);
//             let request = data.request;
//             // Tutup modal ubah penerbangan
//             $("#changeSearchModal").modal("hide");
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
