$("#btnCancelOrderBaggage").on("click", function () {
    $("#modalFasilitasEkstra").modal("hide");
    $("#modalCancelOrderBaggage").modal("hide");
});

$("#customSwitch").on("click", function () {
    let selectedTitle = $("select[name='title_pemesan']").val();
    let namapemesan = $("input[name='nama_pemesan']").val();
    if ($(this).is(":checked")) {
        $("#inputPenumpang1").val(namapemesan);
        $("#titlePenumpang1").val(selectedTitle);
    } else {
        $("#inputPenumpang1").val("");
        $("#titlePenumpang1").val("tuan");
    }
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(".btn-detail-penerbangan").on("click", function () {
    let id = $(this).data("id");
    $(".list-group-horizontal-lg").children().remove();
    let url = "/cart/flight/detail/:id";
    url = url.replace(":id", id);
    $.ajax({
        url: url,
        method: "post",
        data: {
            id: id,
        },
        dataType: "json",
        success: function (data) {
            const flight = data.flight;
            const plane = flight.plane;
            const airline = plane.airline;
            const fromAirport = flight.from_airport;
            const toAirport = flight.to_airport;
            const facilities = flight.facilities;
            const fromAirportCity = fromAirport.city;
            const toAirportCity = toAirport.city;
            const departureTime = flight.departure_time;
            const arrivalTime = flight.arrival_time;
            const departureTimeElement = $(
                "#modalDetailPenerbangan .departure-time .text-time .text-hour"
            );
            const arrivalTimeElement = $(
                "#modalDetailPenerbangan .arrival-time .text-time .text-hour"
            );
            const departureDateElement = $(
                "#modalDetailPenerbangan .departure-time .text-time .text-date"
            );
            const arrivalDateElement = $(
                "#modalDetailPenerbangan .arrival-time .text-time .text-date"
            );
            const departureFlightCode = $(
                "#modalDetailPenerbangan .departure-time .text-code"
            );
            const arrivalFlightCode = $(
                "#modalDetailPenerbangan .arrival-time .text-code"
            );

            $("#modalDetailPenerbangan .nama-maskapai").html(airline.name);
            $("#modalDetailPenerbangan .logo-airline img").attr(
                "src",
                `/../img/logo_partners/${airline.logo}`
            );
            departureTimeElement.html(moment(departureTime).format("HH:mm"));
            arrivalTimeElement.html(moment(arrivalTime).format("HH:mm"));
            departureDateElement.html(moment(departureTime).format("D MMM"));
            arrivalDateElement.html(moment(arrivalTime).format("D MMM"));

            departureFlightCode.html(fromAirport.kode_iata);
            arrivalFlightCode.html(toAirport.kode_iata);
            $(".penerbangan").html(
                fromAirport.name +
                    "<i class='fa fa-long-arrow-right mx-2'></i>" +
                    fromAirportCity.name
            );
            $.each(facilities, function (index, item) {
                $(".list-group-horizontal-lg").append(
                    $(
                        `<li class="list-group-item"><i class="${item.icon} mr-2"></i> ${item.name}</li>`
                    )
                );
            });
        },
    });
});
