;(function ($) {
    var cost, notary;
    var local_tax, local_percent, notary_fee, agency_tax, vat_tax, total;

    $('#cost').on('input', function () {
        //e.preventDefault();
        calculateFee();

    });

    $('#city').on('change', function () {
        //e.preventDefault();
        calculateFee();

    });
    function calculateFee() {
        cost = $("#cost").val();

        console.log($("#cost").val());

        if (checkNumber(cost) === false) {
            $("#error").text("Моля правилна въведете стойност на сделката!").css('color', 'red');
            $("#local-tax").text(0);

            $("#notary-fee").text(0);

            $("#agency").text(0);

            $("#vat").text(0);

            $("#total").text(0);

            return false;

        } else {
            $("#error").hide();
        }


        local_tax = localTax(cost);
        notary_fee = notaryFee(cost);
        agency_tax = agency(cost);
        vat_tax = vat(notary_fee);
        total = local_tax + notary_fee + agency_tax + vat_tax;


        $("#local-tax").text(local_tax.toFixed(2) + " лв.");

        $("#notary-fee").text(notary_fee.toFixed(2) + " лв.");

        $("#agency").text(agency_tax.toFixed(2) + " лв.");

        $("#vat").text(vat_tax.toFixed(2) + " лв.");


        $("#total").text(total.toFixed(2) + " лв.");
    }
    //==========================================================
    function checkNumber(cost) {
        if (cost <= 0 || isNaN(cost) === true || isFinite(cost) === false) {
            return false;
        } else {
            return true;
        }
    }

    function getNotaryGroup(cost) {

        if (cost < 100 && cost > 0) {
            notary = {price: 0, fee: 30, percent: 0}
        }
        else if (cost >= 100 && cost < 1000) {
            notary = {price: 100, fee: 30, percent: 1.5}
        }
        else if (cost >= 1000 && cost < 10000) {
            notary = {price: 1000, fee: 43.5, percent: 1.3}
        }
        else if (cost >= 10000 && cost < 50000) {
            notary = {price: 10000, fee: 160.5, percent: 0.8}

        } else if (cost >= 50000 && cost < 100000) {
            notary = {price: 50000, fee: 480.5, percent: 0.5}

        } else if (cost >= 100000 && cost < 500000) {
            notary = {price: 100000, fee: 730.5, percent: 0.2}

        } else {
            notary = {price: 500000, fee: 1530.5, percent: 0.1}

        }

        if (notary > 6000) {
            return 6000;

        } else {

            return notary;

        }
    }

    // изчислява превишението
    function getExceedance(cost, min_exc) {
        return cost - min_exc;
    }

    //=================
    function localTax(cost) {
        local_percent = $("#city").val();
        var tax = cost * local_percent / 100;
        return Math.round(tax * 100) / 100;
    }

    function agency(cost) {
        a = cost * 0.1 / 100;
        return a < 10 ? 10 : a;
    }

    function notaryFee(cost) {
        var fee, feeGroup;

        feeGroup = getNotaryGroup(cost);

        fee = parseFloat(feeGroup.fee + (getExceedance(cost, feeGroup.price) * (feeGroup.percent / 100)));

        return Math.round(fee * 100) / 100
    }

    function vat(fee) {
        var vat_tax = fee * 20 / 100;
        return Math.round(vat_tax * 100) / 100;
    }
})(jQuery)

