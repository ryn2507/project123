$(document).ready(function() {
        $("#nama_minuman").append('<option value="">-- Nama Minuman --</option>');
        url = "modules/fin/get_minuman.php?jenis=1";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i < result.length; i++)
                    $("#nama_minuman").append('<option value="' + result[i].id_vending + '">' + result[i].nama_vending + ' || Rp ' + result[i].harga_vending + '</option>');
            }
        });
    });

    $(document).ready(function() {
        $("#uang_bayar").append('<option value="">-- Uang Pecahan --</option>');
        url = "modules/fin/get_minuman.php?jenis=3";
        //alert(url);
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i < result.length; i++)
                    //alert(result);
                    $("#uang_bayar").append('<option value="' + result[i].pecahan + '">Rp ' + result[i].pecahan + '</option>');
            }
        });
    });

    $("#nama_minuman").change(function() {
        var idMinum = $(this).val();
        url = "modules/fin/get_minuman.php?jenis=2&id=" + idMinum + "";
        //alert(idMinum);
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i < result.length; i++)
                    //alert("abc");
                    $("#harga").val(result[i].harga);
            }
        });
    });

    $("#uang_bayar").change(function() {
        var harga = Number($("#harga").val());
        var bayar = Number($(this).val());
        if (bayar < harga) {
            alert("Uang Tidak Cukup !!!");
            $("#uang_bayar").val('');
            $("#submit").attr("disabled", true);
        } else {
            $("#submit").removeAttr("disabled", false);
        }
    });

    $(document).on('click', "#submit", function(e) {
        e.preventDefault();
        let data = {
            bayar: $('#uang_bayar').val(),
            harga: $('#harga').val(),
        }
        //alert(data);
        $.ajax({
            url: 'modules/fin/get_minuman.php?jenis=4',
            method: "POST",
            data: data,
            //success: function(res) {
            //    alert(res);
            //}
            success: function(result) {
                alert("Uang Kembalian : \n" + result);
                $("#uang_bayar").val('');
                $("#harga").val('');
                $("#nama_minuman").val('');
                $("#submit").attr("disabled", true);
            }
        })
    });