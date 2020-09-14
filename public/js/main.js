$(document).ready(function () {
    // aktifkan overlay homepage setelah user mengklik widget produk
    $("#productWidget")
        .children()
        .on("click", function () {
            $(".home-page-widget-overlay").addClass("show");
        });

    $(".home-page-widget-overlay").on("click", function () {
        $(".home-page-widget-overlay").removeClass("show");
        $("div.dropdown-menu").removeClass("display");
    });
    // -----PESAWAT-----
    //Input Tanggal Penerbangan
    const returnCheckbox = $("#returnCheckbox");
    const inputTanggalPulang = $("#inputTanggalPulangContainer");
    inputTanggalPulang.addClass("d-none");

    returnCheckbox.on("click", function isChecked() {
        // Jika tidak di ceklis maka sembunyikan input tanggal pulangnya
        if (!returnCheckbox.is(":checked")) {
            returnCheckbox.prop("checked", false);
            inputTanggalPulang.addClass("d-none");
            $("#roundtrip").prop("checked", false);
            $("#oneway").prop("checked", true);
            // jika di ceklis, munculkan input tanggal pulangnya
        } else {
            returnCheckbox.prop("checked", true);
            inputTanggalPulang.removeClass("d-none");
            $("#oneway").prop("checked", false);
            $("#roundtrip").prop("checked", true);
            $("#inputTanggalPulang").datepicker("show");
        }
    });

    // Ketika radio button Sekali Jalan ditekan, nonaktifkan datepicker tanggal pulang
    $("#oneway").on("click", function (e) {
        returnCheckbox.prop("checked", false);
        inputTanggalPulang.addClass("d-none");
        e.stopPropagation();
    });

    // Ketika radio button Pulang-Pergi ditekan, aktifkan datepicker tanggal pulang
    $("#roundtrip").on("click", function (e) {
        returnCheckbox.prop("checked", true);
        inputTanggalPulang.removeClass("d-none");
        $("#inputTanggalPulang").datepicker("show");
        e.stopPropagation();
    });

    // INPUT BANDARA ASAL
    const inputBandaraAsal = $("#input-bandara-asal");
    const inputBandaraTujuan = $("#input-bandara-tujuan");
    const dropdownMenu1 = $("#boxAirport .dropdown-menu");
    const dropdownMenu2 = $("#boxAirport2 .dropdown-menu");
    // const dropdownItem1 = $("#boxAirport .dropdown-menu > .dropdown-item");
    // const dropdownItem2 = $("#boxAirport2 .dropdown-menu > .dropdown-item");

    // Untuk menampilkan semua list bandara asal
    inputBandaraAsal.on("click", function (e) {
        if (dropdownMenu2.hasClass("display")) {
            dropdownMenu2.removeClass("display");
        }
        $(".home-page-widget-overlay").addClass("show");
        dropdownMenu1.addClass("display");
        e.stopPropagation();
        $(".boxairport .dropdown-menu > .dropdown-item").remove();
        $.ajax({
            url: "js/bandara.json",
            method: "get",
            dataType: "json",
            success: function (data) {
                let bandara = data.bandara;
                $.each(bandara, function (key, val) {
                    dropdownMenu1.append(
                        `
                    <div class="dropdown-item d-flex">
                        <div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
                        <div class="dropdown-option-content">
                            <div class="airport-city-location">${val.lokasi}</div>
                            <div class="airport-city-name">${val.nama}</div>
                        </div>
                        <div class="dropdown-option-code ml-auto text-center">${val.kode}</div>
                    </div>`
                    );
                });

                $(".boxairport .dropdown-item").on("click", function (e) {
                    const namabandara = $(this)
                        .find(".airport-city-name")
                        .text();
                    const kodebandara = $(this)
                        .find(".dropdown-option-code")
                        .text();
                    inputBandaraAsal.attr("value", kodebandara);
                    inputBandaraAsal.val(
                        namabandara + " (" + kodebandara + ")"
                    );
                    inputBandaraTujuan.trigger("click");
                });
            },
        });
    });

    // live Search Bandara Asal
    inputBandaraAsal.on("input", function (e) {
        $(".boxairport .dropdown-menu > .dropdown-item").remove();
        let value = inputBandaraAsal.val().trim();
        let expression = new RegExp(value, "i");

        $.ajax({
            url: "js/bandara.json",
            method: "get",
            dataType: "json",
            success: function (data) {
                let bandara = data.bandara;
                $.each(bandara, function (key, val) {
                    if (
                        val.nama.search(expression) != -1 ||
                        val.lokasi.search(expression) != -1
                    ) {
                        dropdownMenu1.append(
                            `
                        <div class="dropdown-item d-flex">
                            <div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
                            <div class="dropdown-option-content">
                                <div class="airport-city-location">${val.lokasi}</div>
                                <div class="airport-city-name">${val.nama}</div>
                            </div>
                            <div class="dropdown-option-code ml-auto text-center">${val.kode}</div>
                        </div>`
                        );
                    }
                });

                $(".boxairport .dropdown-item").on("click", function (e) {
                    const namabandara = $(this)
                        .find(".airport-city-name")
                        .text();
                    const kodebandara = $(this)
                        .find(".dropdown-option-code")
                        .text();
                    inputBandaraAsal.attr("value", kodebandara);
                    inputBandaraAsal.val(
                        namabandara + " (" + kodebandara + ")"
                    );
                    dropdownMenu1.removeClass("display");
                    dropdownMenu2.addClass("display");

                    inputBandaraTujuan.on("click", function () {
                        dropdownMenu2.addClass("display");
                    });
                    inputBandaraTujuan.trigger("click");
                    e.stopPropagation();
                });
            },
        });
        e.stopPropagation();
    });

    // INPUT BANDARA TUJUAN

    // Untuk menampilkan semua list bandara Tujuan
    inputBandaraTujuan.on("click", function (e) {
        if (dropdownMenu1.hasClass("display")) {
            dropdownMenu1.removeClass("display");
        }
        dropdownMenu2.addClass("display");
        $(".home-page-widget-overlay").addClass("show");
        $(".boxairport .dropdown-menu > .dropdown-item").remove();
        $.ajax({
            url: "js/bandara.json",
            method: "get",
            dataType: "json",
            success: function (data) {
                let bandara = data.bandara;
                $.each(bandara, function (key, val) {
                    dropdownMenu2.append(
                        `
                    <div class="dropdown-item d-flex">
                        <div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
                        <div class="dropdown-option-content">
                        <div class="airport-city-location">${val.lokasi}</div>
                        <div class="airport-city-name">${val.nama}</div>
                        </div>
                        <div class="dropdown-option-code ml-auto text-center">${val.kode}</div>
                  </div>`
                    );
                });

                $(".boxairport .dropdown-item").on("click", function (e) {
                    const namabandara = $(this)
                        .find(".airport-city-name")
                        .text();
                    const kodebandara = $(this)
                        .find(".dropdown-option-code")
                        .text();
                    inputBandaraTujuan.attr("value", kodebandara);
                    inputBandaraTujuan.val(
                        namabandara + " (" + kodebandara + ")"
                    );
                    dropdownMenu2.removeClass("display");
                    e.stopPropagation();
                });
            },
        });
        e.stopPropagation();
    });

    // Live Search Bandara Tujuan
    inputBandaraTujuan.on("input", function (e) {
        $(".boxairport .dropdown-menu > .dropdown-item").remove();
        let value = inputBandaraTujuan.val().trim();
        let expression = new RegExp(value, "i");

        $.ajax({
            url: "js/bandara.json",
            method: "get",
            dataType: "json",
            success: function (data) {
                let bandara = data.bandara;
                $.each(bandara, function (key, val) {
                    if (
                        val.nama.search(expression) != -1 ||
                        val.lokasi.search(expression) != -1
                    ) {
                        dropdownMenu2.append(
                            `
                        <div class="dropdown-item d-flex">
                            <div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
                            <div class="dropdown-option-content">
                            <div class="airport-city-location">${val.lokasi}</div>
                            <div class="airport-city-name">${val.nama}</div>
                            </div>
                            <div class="dropdown-option-code ml-auto text-center">${val.kode}</div>
                      </div>`
                        );
                    }
                });

                $(".boxairport .dropdown-item").on("click", function (e) {
                    const namabandara = $(this)
                        .find(".airport-city-name")
                        .text();
                    const kodebandara = $(this)
                        .find(".dropdown-option-code")
                        .text();
                    inputBandaraTujuan.attr("value", kodebandara);
                    inputBandaraTujuan.val(
                        namabandara + " (" + kodebandara + ")"
                    );
                    dropdownMenu2.removeClass("display");
                    e.stopPropagation();
                });
            },
        });
    });

    // Tukar bandara, bandara pergi untuk pulang, bandara pulang untuk pergi
    let i = 0;
    $("#opposite-arrow").on("click", function () {
        if (i == 0) {
            $(this).css({
                transition: "transform .2s ease-in",
                transform: "rotate(180deg)",
            });
            i++;
            // cek apakah element input bandara ada, jika ada ambil nilainya
            if (inputBandaraAsal.length && inputBandaraTujuan.length) {
                if (
                    inputBandaraAsal.val().length != 0 &&
                    inputBandaraTujuan.val().length != 0
                ) {
                    const bandaraTujuan = inputBandaraTujuan.val();
                    const bandaraAsal = inputBandaraAsal.val();
                    // balik nilainya
                    inputBandaraAsal.val(bandaraTujuan);
                    inputBandaraTujuan.val(bandaraAsal);
                }
                // Jika tidak ada elemen input bandara, berarti user sedang di halaman kereta api
            } else {
                if (
                    $("#input-stasiun-asal").val().length != 0 &&
                    $("#input-stasiun-tujuan").val().length != 0
                ) {
                    const stasiunAsal = $("#input-stasiun-asal").val();
                    const stasiunTujuan = $("#input-stasiun-tujuan").val();
                    // balik nilainya
                    $("#input-stasiun-asal").val(stasiunTujuan);
                    $("#input-stasiun-tujuan").val(stasiunAsal);
                }
            }
        } else if (i == 1) {
            $(this).css({
                transition: "transform .2s ease-in",
                transform: "rotate(0deg)",
            });

            i = 0;
            if (inputBandaraAsal.length && inputBandaraTujuan.length) {
                if (
                    inputBandaraAsal.val().length != 0 &&
                    inputBandaraTujuan.val().length != 0
                ) {
                    const bandaraTujuan = inputBandaraTujuan.val();
                    const bandaraAsal = inputBandaraAsal.val();
                    inputBandaraAsal.val(bandaraTujuan);
                    inputBandaraTujuan.val(bandaraAsal);
                }
            } else {
                if (
                    $("#input-stasiun-asal").val().length != 0 &&
                    $("#input-stasiun-tujuan").val().length != 0
                ) {
                    const stasiunAsal = $("#input-stasiun-asal").val();
                    const stasiunTujuan = $("#input-stasiun-tujuan").val();

                    $("#input-stasiun-asal").val(stasiunTujuan);
                    $("#input-stasiun-tujuan").val(stasiunAsal);
                }
            }
        }
    });

    // Select Box Kelas Kabin
    $("#selectBoxKelasKabin").on("click", function () {
        $(".tm.tm-caret").toggleClass("active");
    });

    // $(document).click(function (event) {
    //     let $target = $(event.target);
    //     if (
    //         !$target.closest(".passenger-dropdown-container").length &&
    //         $(".passenger-dropdown-container").is(":visible")
    //     ) {
    //         $(".passenger-dropdown-container").removeClass("active");
    //     }
    // });

    // Select Box Passenger

    $(".passenger-dropdown-container .dropdown-menu").on("click", function (e) {
        e.stopPropagation();
        e.preventDefault();
    });

    $(".passenger-dropdown-container .dropdown-toggle").click(function () {
        $(".passenger-dropdown-container").addClass("active");

        if (
            $(".passenger-dropdown-container .dropdown-menu").hasClass("show")
        ) {
            $(".passenger-dropdown-container .dropdown-menu").removeClass(
                "show"
            );
        }

        $(".passenger-dropdown-container .dropdown-menu").addClass("display");

        const btnDecrementAdultPassenger = $(
            ".passenger-dropdown-container .dropdown-item input#adultPassenger"
        )
            .next()
            .find(".input-group-prepend .btn-decrement");

        const btnDecrementChildPassenger = $(
            ".passenger-dropdown-container .dropdown-item input#childPassenger"
        )
            .next()
            .find(".input-group-prepend .btn-decrement");

        const btnDecrementInfantPassenger = $(
            ".passenger-dropdown-container .dropdown-item input#infantPassenger"
        )
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
        $(
            ".passenger-dropdown-container .dropdown-menu .dropdown-item input"
        ).on("change", function () {
            let total = 0;
            let adultPassenger = parseInt($("#adultPassenger").val());
            let childPassenger = parseInt($("#childPassenger").val());
            let infantPassenger = parseInt($("#infantPassenger").val());

            const btnIncrementAdultPassenger = $(
                ".passenger-dropdown-container .dropdown-item input#adultPassenger"
            )
                .next()
                .find(".input-group-append .btn-increment");

            const btnIncrementChildPassenger = $(
                ".passenger-dropdown-container .dropdown-item input#childPassenger"
            )
                .next()
                .find(".input-group-append .btn-increment");
            const btnIncrementInfantPassenger = $(
                ".passenger-dropdown-container .dropdown-item input#infantPassenger"
            )
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
        });
    });

    $(".dropdown .dropdown-toggle").html(
        $(".dropdown-menu .dropdown-item input").val() + " Penumpang"
    );

    $(
        ".passenger-dropdown-container .dropdown-menu .dropdown-header i.fa.fa-times"
    ).on("click", function () {
        $(".passenger-dropdown-container .dropdown-menu").removeClass("show");
        $(".passenger-dropdown-container .input-group").removeClass("show");
        $(".passenger-dropdown-container .dropdown-menu").removeClass(
            "display"
        );
        $(".passenger-dropdown-container").removeClass("active");
    });

    // Tombol Silang
    $("i.fa.fa-times").each(function () {
        $(this).on("click", function () {
            $(".dropdown-menu").removeClass("display");
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
        if (dropdownMenuStasiunTujuan.hasClass("display")) {
            dropdownMenuStasiunTujuan.removeClass("display");
        }
        dropdownMenuStasiunAsal.addClass("display");
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
                    inputStasiunAsal.val(
                        namastasiun + " (" + kodestasiun + ")"
                    );
                    inputStasiunTujuan.trigger("click");
                });
            },
        });
    });

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
                    inputStasiunAsal.val(
                        namastasiun + " (" + kodestasiun + ")"
                    );
                    dropdownMenuStasiunAsal.removeClass("display");
                    dropdownMenuStasiunTujuan.addClass("display");
                });
            },
        });
    });

    // Untuk menampilkan semua list stasiun tujuan
    inputStasiunTujuan.on("click", function () {
        // untuk memastikan dropdown input stasiun tujuan telah ditutup
        if (dropdownMenuStasiunAsal.hasClass("display")) {
            dropdownMenuStasiunAsal.removeClass("display");
        }
        dropdownMenuStasiunTujuan.addClass("display");
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
                    inputStasiunTujuan.val(
                        namastasiun + " (" + kodestasiun + ")"
                    );
                    dropdownMenuStasiunTujuan.removeClass("display");
                });
            },
        });
    });

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
                    inputStasiunTujuan.val(
                        namastasiun + " (" + kodestasiun + ")"
                    );
                    dropdownMenuStasiunTujuan.removeClass("display");
                });
            },
        });
    });
    // PLUGIN
    // Plugin Datepicker

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
        language: "id",
        autoclose: true,
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
        language: "id",
        autoclose: true,
    });

    $("#inputTanggalPulang").val(
        moment().locale("id").add(1, "d").format("ddd, D MMM YYYY")
    );

    // Plugin Input Spinner

    let config = {
        incrementButton: "<i class='fa fa-plus'></i>",
        decrementButton: "<i class='fa fa-minus'></i>",
    };

    $("input[type='number']").inputSpinner(config);

    // Halaman Search
    $(".preview-flight .right-side .list .text-airport").each(function (i, e) {
        $(e).text($(e).text().trim().substr(0, 8) + "...");
    });

    $("[data-toggle='tooltip']").tooltip();
    $(".filter-box .collapse.in").on("show.bs.collapse", function () {
        console.log(this);
        $("i.fa.fa-chevron-down").addClass("i.fa.fa-chevron-up");
    });
});
