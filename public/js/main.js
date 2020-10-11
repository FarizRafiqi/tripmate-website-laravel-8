// aktifkan overlay homepage setelah user mengklik widget produk
$(".home-page form")
    .children()
    .on("click", function () {
        $(".overlay").addClass("show");
    });

$(".overlay").on("click", function () {
    $(".overlay").removeClass("show");
    $("div.dropdown-menu").removeClass("show");
    $(".wrapper-change-search").addClass("d-none");
});
// -----PESAWAT-----
//Input Tanggal Penerbangan
const returnCheckbox = $("#returnCheckbox");
// const inputTanggalPulang = $("#inputTanggalPulangContainer");

// inputTanggalPulang.addClass("d-none");
$("#input-tanggal-pulang").attr("disabled", true);

returnCheckbox.on("click", function isChecked() {
    // Jika tidak di ceklis maka sembunyikan input tanggal pulangnya
    if (!returnCheckbox.is(":checked")) {
        $("#input-tanggal-pulang").prop("disabled", true);
        $("#oneway").prop("checked", true);
        $("#roundtrip").prop("checked", false);
        // jika di ceklis, munculkan input tanggal pulangnya
    } else {
        $("#input-tanggal-pulang").prop("disabled", false);
        $("#oneway").prop("checked", false);
        $("#roundtrip").prop("checked", true);
        $("#input-tanggal-pulang").datepicker("show");
    }
});

// Ketika radio button Sekali Jalan ditekan, nonaktifkan datepicker tanggal pulang
$("#oneway").on("click", function (e) {
    returnCheckbox.prop("checked", false);
    $("#input-tanggal-pulang").prop("disabled", true);
});

// Ketika radio button Pulang-Pergi ditekan, aktifkan datepicker tanggal pulang
$("#roundtrip").on("click", function (e) {
    returnCheckbox.prop("checked", true);
    $("#input-tanggal-pulang").prop("disabled", false);
    $("#inputTanggalPulang").datepicker("show");
});

// INPUT BANDARA ASAL
const selectBoxBandaraAsal = $("#selectBoxBandaraAsal");
const selectBoxBandaraTujuan = $("#selectBoxBandaraTujuan");
const dropdownMenu1 = $("#boxAirport .dropdown-menu");
const dropdownMenu2 = $("#boxAirport2 .dropdown-menu");
// const dropdownItem1 = $("#boxAirport .dropdown-menu > .dropdown-item");
// const dropdownItem2 = $("#boxAirport2 .dropdown-menu > .dropdown-item");

// Tukar bandara, bandara pergi untuk pulang, bandara pulang untuk pergi

let i = 0;
$("#switch-btn").on("click", function () {
    if (i == 0) {
        $(this).css({
            transition: "transform .2s ease-in",
            transform: "rotate(180deg)",
        });
        i++;
    } else if (i == 1) {
        $(this).css({
            transition: "transform .2s ease-in",
            transform: "rotate(0deg)",
        });
        i = 0;
    }
});

// Select Box Kelas Kabin
$("#selectBoxKelasKabin").on("click", function () {
    $(".tm.tm-caret").toggleClass("active");
});

// Select Box Passenger

$(".passenger-dropdown-container .dropdown-menu").on("click", function (e) {
    e.stopPropagation();
    e.preventDefault();
});

$(".passenger-dropdown-container .dropdown-toggle").click(function (e) {
    const btnDecrementAdultPassenger = $("input#adultPassenger")
        .next()
        .find(".input-group-prepend .btn-decrement");

    const btnDecrementChildPassenger = $("input#childPassenger")
        .next()
        .find(".input-group-prepend .btn-decrement");

    const btnDecrementInfantPassenger = $("input#infantPassenger")
        .next()
        .find(".input-group-prepend .btn-decrement");

    // Untuk Mengatur Kondisi awal dari Input Spinner Jumlah Penumpang
    if (
        $("#adultPassenger").val() == 1 &&
        $("#childPassenger").val() == 0 &&
        $("#infantPassenger").val() == 0
    ) {
        btnDecrementAdultPassenger
            .addClass("not-allowed")
            .attr("disabled", true);

        btnDecrementChildPassenger
            .addClass("not-allowed")
            .attr("disabled", true);

        btnDecrementInfantPassenger
            .addClass("not-allowed")
            .attr("disabled", true);
    }

    // Fungsi untuk mengatur jumlah penumpang
    $(".passenger-dropdown-container .dropdown-menu .dropdown-item input").on(
        "change",
        function (e) {
            let total = 0;
            let adultPassenger = parseInt($("#adultPassenger").val());
            let childPassenger = parseInt($("#childPassenger").val());
            let infantPassenger = parseInt($("#infantPassenger").val());

            const btnIncrementAdultPassenger = $("input#adultPassenger")
                .next()
                .find(".input-group-append .btn-increment");

            const btnIncrementChildPassenger = $("input#childPassenger")
                .next()
                .find(".input-group-append .btn-increment");
            const btnIncrementInfantPassenger = $("input#infantPassenger")
                .next()
                .find(".input-group-append .btn-increment");

            // Jika jumlah penumpang dewasa lebih dari jumlah minimalnya maka aktifkan tombol decrement
            if (adultPassenger > $("#adultPassenger").attr("min")) {
                btnDecrementAdultPassenger
                    .removeClass("not-allowed")
                    .prop("disabled", false);
            } else {
                btnDecrementAdultPassenger
                    .addClass("not-allowed")
                    .prop("disabled", true);
            }

            // Jika jumlah penumpang anak lebih dari jumlah minimalnya maka aktifkan tombol decrement
            if (childPassenger > $("#childPassenger").attr("min")) {
                btnDecrementChildPassenger
                    .removeClass("not-allowed")
                    .prop("disabled", false);
            } else {
                btnDecrementChildPassenger
                    .addClass("not-allowed")
                    .prop("disabled", true);
            }

            // Jika jumlah penumpang bayi lebih dari jumlah minimalnya maka aktifkan tombol decrement
            if (infantPassenger > $("#infantPassenger").attr("min")) {
                btnDecrementInfantPassenger
                    .removeClass("not-allowed")
                    .prop("disabled", false);
            } else {
                if (btnDecrementInfantPassenger.prop("disabled") === false) {
                    btnDecrementInfantPassenger
                        .addClass("not-allowed")
                        .prop("disabled", true);
                }
            }

            // Jika jumlah penumpang bayi mencapai jumlah maksimal maka nonaktifkan tombol increment milik bayi
            if (infantPassenger == $("#infantPassenger").attr("max")) {
                btnIncrementInfantPassenger
                    .addClass("not-allowed")
                    .prop("disabled", true);
            } else {
                btnIncrementInfantPassenger
                    .addClass("not-allowed")
                    .prop("disabled", false);
            }

            // Jika jumlah penumpang anak mencapai jumlah maksimal maka nonaktifkan tombol increment milik anak
            if (childPassenger == $("#childPassenger").attr("max")) {
                btnIncrementChildPassenger
                    .addClass("not-allowed")
                    .prop("disabled", true);
            } else {
                btnIncrementChildPassenger
                    .removeClass("not-allowed")
                    .prop("disabled", false);
            }

            // Jika jumlah passenger dewasa dan anak lebih dari 7 maka
            if (adultPassenger + childPassenger > 7) {
                // Jika jumlah dewasa lebih besar maka kurangi penumpang anak
                if (adultPassenger > childPassenger) {
                    childPassenger--;
                    $("#childPassenger").val(childPassenger);

                    // Jika jumlah anak lebih besar maka kurangi penumpang dewasa
                } else {
                    adultPassenger--;
                    $("#adultPassenger").val(adultPassenger);
                }
            } else if (
                adultPassenger + childPassenger == 7 &&
                adultPassenger > childPassenger &&
                childPassenger == 0
            ) {
                btnIncrementChildPassenger.prop("disabled", true);
            }

            // Jika jumlah penumpang bayi kurang dari jumlah penumpang dewasa maka nonaktifkan tombol increment milik bayi
            if (infantPassenger > adultPassenger) {
                infantPassenger--;
                $("#infantPassenger").val(infantPassenger);
            } else if (infantPassenger == adultPassenger) {
                btnIncrementInfantPassenger.prop("disabled", true);
            } else if (adultPassenger > infantPassenger) {
                // Jika jumlah Penumpang Dewasa mencapai jumlah maksimalnya maka nonaktifkan tombol increment milik dewasa
                if (adultPassenger == $("#adultPassenger").attr("max")) {
                    btnIncrementAdultPassenger
                        .addClass("not-allowed")
                        .prop("disabled", true);
                } else {
                    btnIncrementAdultPassenger
                        .removeClass("not-allowed")
                        .prop("disabled", false);
                }
            }

            // Cek apakah ada penumpang anak di dalam formnya
            // jika iya maka jumlahkan semua penumpang
            if ($.isNumeric(childPassenger) && childPassenger >= 0) {
                total = adultPassenger + childPassenger + infantPassenger;
                // jika tidak, maka hanya jumlahkan penumpang dewasa dan bayi saja
            } else {
                total = adultPassenger + infantPassenger;
            }

            // Update jumlah penumpang
            $(".passenger-dropdown-container .dropdown-toggle").html(
                total + " Penumpang"
            );
        }
    );
});

$(".passenger-dropdown-container.dropdown .dropdown-toggle").html(
    $(".dropdown-menu .dropdown-item input").val() + " Penumpang"
);

// Tombol Silang
$(".dropdown i.fa.fa-times").each(function () {
    $(this).on("click", function () {
        $(".dropdown-menu").removeClass("show");
    });
});

// -----KERETA API-----
const inputStasiunAsal = $("#input-stasiun-asal");
const inputStasiunTujuan = $("#input-stasiun-tujuan");
const dropdownMenuStasiunAsal = $("#boxStasiun1 .dropdown-menu");
const dropdownMenuStasiunTujuan = $("#boxStasiun2 .dropdown-menu");

// Untuk menampilkan semua list stasiun asal
inputStasiunAsal.on("click", function () {
    // untuk memastikan dropdown input stasiun tujuan telah ditutup
    if (dropdownMenuStasiunTujuan.hasClass("show")) {
        dropdownMenuStasiunTujuan.removeClass("show");
    }
    dropdownMenuStasiunAsal.addClass("show");
    $(".stasiun-list-box .dropdown-menu > .dropdown-item").remove();
    $.ajax({
        url: "js/stasiun.json",
        method: "get",
        dataType: "json",
        success: function (data) {
            let stasiun = data.stasiun;
            $.each(stasiun, function (key, val) {
                dropdownMenuStasiunAsal.append(
                    `
                    <div class="dropdown-item d-flex">
                        <div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
                        <div class="dropdown-option-content">
                            <div class="station-location">${val.lokasi}</div>
                            <div class="station-name">${val.nama}</div>
                        </div>
                        <div class="dropdown-option-code ml-auto text-center">${val.kode}</div>
                    </div>`
                );
            });

            $(".stasiun-list-box .dropdown-item").on("click", function (e) {
                const namastasiun = $(this).find(".station-name").text();
                const kodestasiun = $(this)
                    .find(".dropdown-option-code")
                    .text();
                inputStasiunAsal.val(namastasiun + " (" + kodestasiun + ")");
                inputStasiunTujuan.trigger("click");
            });
        },
    });
});

// Live Search Input Stasiun
inputStasiunAsal.on("input", function () {
    $(".stasiun-list-box .dropdown-menu > .dropdown-item").remove();
    let value = inputStasiunAsal.val().trim();
    let expression = new RegExp(value, "i");

    $.ajax({
        url: "js/stasiun.json",
        method: "get",
        dataType: "json",
        success: function (data) {
            let stasiun = data.stasiun;
            $.each(stasiun, function (key, val) {
                if (
                    val.nama.search(expression) != -1 ||
                    val.lokasi.search(expression) != -1
                ) {
                    dropdownMenuStasiunAsal.append(
                        `
										<div class="dropdown-item d-flex">
												<div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
												<div class="dropdown-option-content">
												<div class="station-location">${val.lokasi}</div>
												<div class="station-name">${val.nama}</div>
												</div>
												<div class="dropdown-option-code ml-auto text-center">${val.kode}</div>
										</div>`
                    );
                }
            });

            $(".stasiun-list-box .dropdown-item").on("click", function (e) {
                const namastasiun = $(this).find(".station-name").text();
                const kodestasiun = $(this)
                    .find(".dropdown-option-code")
                    .text();
                inputStasiunAsal.val(namastasiun + " (" + kodestasiun + ")");
                dropdownMenuStasiunAsal.removeClass("display");
                dropdownMenuStasiunTujuan.addClass("display");
            });
        },
    });
});

// Untuk menampilkan semua list stasiun tujuan
inputStasiunTujuan.on("click", function () {
    // untuk memastikan dropdown input stasiun tujuan telah ditutup
    if (dropdownMenuStasiunAsal.hasClass("show")) {
        dropdownMenuStasiunAsal.removeClass("show");
    }
    dropdownMenuStasiunTujuan.addClass("show");
    $(".stasiun-list-box .dropdown-menu > .dropdown-item").remove();
    $.ajax({
        url: "js/stasiun.json",
        method: "get",
        dataType: "json",
        success: function (data) {
            let stasiun = data.stasiun;
            $.each(stasiun, function (key, val) {
                dropdownMenuStasiunTujuan.append(
                    `
								<div class="dropdown-item d-flex">
										<div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
										<div class="dropdown-option-content">
										<div class="station-location">${val.lokasi}</div>
										<div class="station-name">${val.nama}</div>
										</div>
										<div class="dropdown-option-code ml-auto text-center">${val.kode}</div>
							</div>`
                );
            });

            $(".stasiun-list-box .dropdown-item").on("click", function (e) {
                const namastasiun = $(this).find(".station-name").text();
                const kodestasiun = $(this)
                    .find(".dropdown-option-code")
                    .text();
                inputStasiunTujuan.val(namastasiun + " (" + kodestasiun + ")");
                dropdownMenuStasiunTujuan.removeClass("show");
            });
        },
    });
});

// Live Search Input Stasiun
inputStasiunTujuan.on("input", function () {
    $(".stasiun-list-box .dropdown-menu > .dropdown-item").remove();
    let value = inputStasiunTujuan.val().trim();
    let expression = new RegExp(value, "i");

    $.ajax({
        url: "js/stasiun.json",
        method: "get",
        dataType: "json",
        success: function (data) {
            let stasiun = data.stasiun;
            $.each(stasiun, function (key, val) {
                if (
                    val.nama.search(expression) != -1 ||
                    val.lokasi.search(expression) != -1
                ) {
                    dropdownMenuStasiunTujuan.append(
                        `
													<div class="dropdown-item d-flex">
															<div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
															<div class="dropdown-option-content">
															<div class="station-location">${val.lokasi}</div>
															<div class="station-name">${val.nama}</div>
															</div>
															<div class="dropdown-option-code ml-auto text-center">${val.kode}</div>
													</div>`
                    );
                }
            });

            $(".stasiun-list-box .dropdown-item").on("click", function (e) {
                const namastasiun = $(this).find(".station-name").text();
                const kodestasiun = $(this)
                    .find(".dropdown-option-code")
                    .text();
                inputStasiunTujuan.val(namastasiun + " (" + kodestasiun + ")");
                dropdownMenuStasiunTujuan.removeClass("display");
            });
        },
    });
});

// PLUGIN

// Plugin Datepicker
// Untuk halaman homepage, penerbangan, kereta api
$("#input-tanggal-berangkat").datepicker({
    startDate: new Date(),
    orientation: "bottom auto",
    endDate: new Date(moment().add(1, "y")),
    format: "D, dd M yyyy",
    todayHighlight: true,
    templates: {
        leftArrow: "<i class='fa fa-chevron-left'></i>",
        rightArrow: "<i class='fa fa-chevron-right'></i>",
    },
    autoclose: true,
    title: "Pilih tanggal berangkat",
    daysOfWeekHighlighted: [0],
});

$("#input-tanggal-pulang").datepicker({
    startDate: new Date(moment().add(1, "d")),
    orientation: "bottom auto",
    endDate: new Date(moment().add(1, "y")),
    format: "D, dd M yyyy",
    todayHighlight: true,
    templates: {
        leftArrow: "<i class='fa fa-chevron-left'></i>",
        rightArrow: "<i class='fa fa-chevron-right'></i>",
    },
    autoclose: true,
    title: "Pilih tanggal pulang",
    daysOfWeekHighlighted: [0],
});

// Set/atur tanggal berangkat dan pulang secara default
$("#input-tanggal-berangkat").datepicker(
    "setDate",
    moment().format("ddd, D MMM YYYY")
);
$("#input-tanggal-pulang").datepicker(
    "setDate",
    moment().add(1, "d").format("ddd, D MMM YYYY")
);

/**
 * Halaman Pencarian
 */

// untuk membatasi jumlah karakter pada teks airport sehingga tidak terlalu panjang
$(".preview-flight .right-side .list .text-airport").each(function (i, e) {
    $(e).text($(e).text().trim().substr(0, 8) + "...");
});

// inisialisasi datepicker
$("#inputTanggalBerangkat").datepicker({
    startDate: new Date(),
    orientation: "bottom auto",
    endDate: new Date(moment().add(1, "y")),
    format: "D, dd M yyyy",
    todayHighlight: true,
    templates: {
        leftArrow: "<i class='fa fa-chevron-left'></i>",
        rightArrow: "<i class='fa fa-chevron-right'></i>",
    },
    autoclose: true,
    title: "Pilih tanggal berangkat",
    daysOfWeekHighlighted: [0],
});

$("#inputTanggalPulang").datepicker({
    startDate: new Date(moment().add(1, "d")),
    orientation: "bottom auto",
    endDate: new Date(moment().add(1, "y")),
    format: "D, dd M yyyy",
    todayHighlight: true,
    templates: {
        leftArrow: "<i class='fa fa-chevron-left'></i>",
        rightArrow: "<i class='fa fa-chevron-right'></i>",
    },
    autoclose: true,
    title: "Pilih tanggal pulang",
    daysOfWeekHighlighted: [0],
});

// Disabled input tanggal pulang
if (!$("#inputTanggalPulang").val()) {
    $("#inputTanggalPulang").prop("disabled", true);
    $(".returndate-icon").css("opacity", 0.5);
}

$("#checkboxTanggalPulang").on("click", function () {
    // jika checkbox tidak di ceklis maka nonaktifkan inputnya
    if (!$(this).is(":checked")) {
        $("#inputTanggalPulang").prop("disabled", true);
        $(".returndate-icon").css("opacity", 0.5);
        $(this).val("oneway");
        // jika di ceklis maka aktifkan kembali inputnya
    } else {
        $("#inputTanggalPulang").prop("disabled", false);
        $(".returndate-icon").css("opacity", 1);
        $(this).val("roundtrip");
    }
});

// Untuk mengaktifkan tooltip pada list fasilitas penerbangan
$("[data-toggle='tooltip']").tooltip();

// Untuk merotasikan icon chevron down ketika accordion filter dibuka/klik
$(".wrapper-search-result .collapse-label a[data-toggle='collapse']").on(
    "click",
    function (e) {
        $(this).toggleClass("active");
    }
);

/**
 *  Untuk mengaktifkan kelas aktif pada tombol detail penerbangan
 *  dan harga, sehingga muncul border bottom
 */
$(".btn-details a").on("click", function () {
    $(this).siblings().removeClass("active");
    $(this).toggleClass("active");
});

$("#changeSearchModal").on("show.bs.modal", () => {});

/**
 * Tutup dropdown penumpang & kelas kabin apabila
 * diklik diluar dari dropdown tersebut
 */
$(document).on("click", (e) => {
    let $trigger = $(".dropdown-passenger-cabin");
    if ($trigger !== e.target && !$trigger.has(e.target).length) {
        $(".dropdown-passenger-cabin .dropdown-menu").removeClass("show");
        $(".fa.fa-chevron-down").removeClass("active");
    }
});

/**
 * Saat input penumpang dan kelas kabin diklik,
 * munculkan dropdown dan tambahkan kelas aktif pada icon chevron
 */
$("#inputPassengerCabin").on("click", (e) => {
    e.stopPropagation();
    $(".dropdown-passenger-cabin .dropdown-menu").toggleClass("show");
    $(".fa.fa-chevron-down").addClass("active");
});

$(".dropdown-passenger-cabin .close").on("click", () => {
    $(".dropdown-passenger-cabin .dropdown-menu").removeClass("show");
    $(".fa.fa-chevron-down").removeClass("active");
});

// Select Box Kelas Kabin
function hitungTotalPenumpang() {
    let adult = parseInt($("#adultPassenger").val());
    let child = parseInt($("#childPassenger").val());
    let infant = parseInt($("#infantPassenger").val());
    total = adult + child + infant;
    return total;
}

$(".passenger-cabin-item-list.cabin-class").on("click", function (e) {
    e.stopPropagation();

    let total = hitungTotalPenumpang();
    // hilangkan semua ceklis yang terpilih, lalu beri ceklis pada element yang diklik
    $(".cabin-class").removeClass("selected");
    $(".cabin-selected").remove();
    $(this).append(
        $(`<span class="cabin-selected"><i class="fa fa-check"></i></span>`)
    );
    $(this).addClass("selected");
    $("#inputPassengerCabin").val(
        total + " Penumpang, " + $.trim($(this).text().ucwords())
    );
});

$("input[type='number']").on("change", function () {
    let total = hitungTotalPenumpang();

    $("#inputPassengerCabin").val(
        total + " Penumpang, " + $.trim($(".cabin-class.selected").text())
    );
});

/**
 * Cek apakah list kelas kabin memiliki selected class,
 * jika iya maka centang/ceklis kelas tersebut
 */
if ($(".cabin-class").hasClass("selected")) {
    $(".cabin-class.selected").append(
        $(`<span class="cabin-selected"><i class="fa fa-check"></i></span>`)
    );
}

// $(window).on("load", () => {
//     $("body")
//         .prepend(`<div class="spinner-border text-primary position-absolute" style="top: 50%; left: 50%; z-index: 1100;">
//     <span class="sr-only">Loading...</span>
//   </div>`);
// });

// Untuk menutup Navigasi Tab Detail Penerbangan secara otomatis ketika sudah tidak dipakai
// function closeTabDetail() {
//     $("#navTabDetails").removeClass("show");
//     $(".wrapper-collapse").each(function (i, e) {
//         $(e).removeClass("show");
//     });

//     $(".btn-details a").removeClass("active");
// }

// function screen_resize() {
//     var w = parseInt(window.innerWidth);

//     if (w > 0 && w <= 992) {
//         closeTabDetail();
//     }
// }
// if window resize call responsive function
// $(window).resize(function (e) {
//     screen_resize();
// });
// call responsive function on default :)
// $(document).ready(function (e) {
//     screen_resize();
// });

// let lastID = $("a[id*='flight-detail-btn-']").last().attr("id");
// let splitID = lastID.split("-");

// // ID baru
// let newID = Number(splitID[3]) + 1;
// $("a[id*='flight-detail-btn-']").last().attr("id", newID);
String.prototype.ucwords = function () {
    str = this.toLowerCase();
    return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g, function (
        $1
    ) {
        return $1.toUpperCase();
    });
};
