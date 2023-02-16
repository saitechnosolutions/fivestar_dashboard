<!DOCTYPE html>

<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	{{-- <link href="/assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet"/> --}}
	<link href="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
	<!-- loader-->
	<link href="/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="/assets/css/app.css" rel="stylesheet">
	<link href="/assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="/assets/css/dark-theme.css" />
	<link rel="stylesheet" href="/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="/assets/css/header-colors.css" />
    <link href="/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<title>@yield('title')</title>
</head>
<style>
    .select2-container--default .select2-selection--multiple
    {
        height:40px !important;
        overflow-y:scroll !important;
    }
    .activesidebar
{
    background-color: #98803b !important;
}
</style>

<body onload="info_noti()">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->

		@include('pages.layouts.includes.navbar');
		<!--end header -->
		<!--start page wrapper -->
        @section('main-content')

        @show
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
        @include('pages.layouts.includes.footer');
	</div>
	<!--end wrapper-->
	<!--start switcher-->

	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="/assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="/assets/plugins/chartjs/js/Chart.extension.js"></script>
	<script src="/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<!--notification js -->
	{{-- <script src="/assets/plugins/notifications/js/lobibox.min.js"></script> --}}
	{{-- <script src="/assets/plugins/notifications/js/notifications.min.js"></script> --}}
	<script src="/assets/js/index2.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
    <script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/select2/js/select2.min.js"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    {{-- <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"> --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


</body>

</html>
{{-- <script>
    tinymce.init({
      selector: '#mytextarea'
    });
</script> --}}
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
<script>
     $(document).ready(function() {
        var html =
   '<tr><td><input class="form-control f_name1" placeholder="Name" type="text" name="attrname[]" id="f_name1"></td><td><input placeholder="Relation" class="form-control" type="text" name="value[]"></td><td><button class="btn btn-danger remove">X</button></td></tr>';
    $(document).on('click', '#addProduct1', function() {
//    alert("Hellow");


   $('#appp').append(html);
//    alert($("#app1").val())
});

$(document).on('click', '.remove', function() {
   $(this).parents('tr').remove();
});

    });
</script>
<script>
    $(document).ready(function() {
       var html =
  '<tr><td><input class="form-control f_name1" placeholder="Name" type="text" name="features[]" id="f_name1"></td><td><button class="btn btn-danger remove">X</button></td></tr>';
   $(document).on('click', '#addProduct', function() {
//    alert("Hellow");


  $('#appp2').append(html);
//    alert($("#app1").val())
});

$(document).on('click', '.remove', function() {
  $(this).parents('tr').remove();
});

   });
</script>
<script>
    $(document).ready(function() {
       var html =
  '<tr><td><input class="form-control f_name1" placeholder="Name" type="text" name="suitablefor[]" id="f_name1"></td><td><button class="btn btn-danger remove">X</button></td></tr>';
   $(document).on('click', '#addProduct2', function() {
//    alert("Hellow");


  $('#appp3').append(html);
//    alert($("#app1").val())
});

$(document).on('click', '.remove', function() {
  $(this).parents('tr').remove();
});

   });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );

        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
<script>
    $(".status").click(function(){

        var id = $(this).attr("id");

        var varanid = $(this).data("varanid");

        $(".prid").val(id);
        $(".varanid").val(varanid);

    });
</script>

<script>
    $(".brokerstatus").click(function(){

        var id = $(this).attr("id");

        $(".getbrokerid").val(id);

    });
</script>

<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
<script>
    $("#partnerageto").change(function(){

            var fromage = $("#partneragefrom").val();
            var toage = $(this).val();

// alert(fromage);
// alert(toage);

            if(fromage > toage)
            {


                $("#error").text("Wrong Age..! To age greater than from age")
            }
            else
            {

            }

    })
</script>

<script>
    $(".bodytype").select2();
$("#checkbox").click(function(){
    if($("#checkbox").is(':checked') ){
        $(".bodytype > option").prop("selected","selected");
        $(".bodytype").trigger("change");

    }else{
        alert("remove");
        $(".bodytype > option").removeAttr("selected");
         $(".bodytype").trigger("change");
     }
});
</script>

<script>
    $(".complexion").select2();
$("#checkbox2").click(function(){
    if($("#checkbox2").is(':checked') ){
        $(".complexion > option").prop("selected","selected");
        $(".complexion").trigger("change");

    }else{

        $(".complexion > option").removeAttr("selected");
         $(".complexion").trigger("change");
     }
});
</script>

<script>
    $(".maritalstatus").select2();
$("#checkbox3").click(function(){
    if($("#checkbox3").is(':checked') ){
        $(".maritalstatus > option").prop("selected","selected");
        $(".maritalstatus").trigger("change");

    }else{

        $(".maritalstatus > option").removeAttr("selected");
         $(".maritalstatus").trigger("change");
     }
});
</script>

<script>
    $(".religion").select2();
$("#checkbox4").click(function(){
    if($("#checkbox4").is(':checked') ){
        $(".religion > option").prop("selected","selected");
        $(".religion").trigger("change");

    }else{

        $(".religion > option").removeAttr("selected");
         $(".religion").trigger("change");
     }
});
</script>

<script>
    $(".caste").select2();
$("#checkbox5").click(function(){
    if($("#checkbox5").is(':checked') ){
        $(".caste > option").prop("selected","selected");
        $(".caste").trigger("change");

    }else{

        $(".caste > option").removeAttr("selected");
         $(".caste").trigger("change");
     }
});
</script>

<script>
    $(".subcaste").select2();
$("#checkbox6").click(function(){
    if($("#checkbox6").is(':checked') ){
        $(".subcaste > option").prop("selected","selected");
        $(".subcaste").trigger("change");

    }else{

        $(".subcaste > option").removeAttr("selected");
         $(".subcaste").trigger("change");
     }
});
</script>

<script>
    $(".star").select2();
$("#checkbox7").click(function(){
    if($("#checkbox7").is(':checked') ){
        $(".star > option").prop("selected","selected");
        $(".star").trigger("change");

    }else{

        $(".star > option").removeAttr("selected");
         $(".star").trigger("change");
     }
});
</script>

<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<script>
    $(".getid").click(function(){

        var id = $(this).attr("id");

        $(".userid").val(id);
    });
</script>
<script>
    $(".viewbtn").click(function(){

            var id = $(this).data("id");
            var user = $(this).data("user");
            var view = $(this).data("view");

           $(".userid").val(id);
           $(".username").val(user);
           $(".viewpermission").val(view);
    });
</script>

<script>
    $(".getamt").click(function(){

            var amt = $(this).data("amt");

           $(".amt").val(amt);

    });
</script>
<script>
    $(document).ready(function() {
       var html =
  '<tr><td><input class="form-control f_name" type="text" name="areaname[]" id="f_name" placeholder="Area Name"></td><td><input class="form-control f_relation" type="text" name="productname[]" id="f_relation" placeholder="Product Name"></td><td><input class="form-control f_relation" type="text" name="price[]" id="f_relation" placeholder="Price"></td><td><button type="button" class="btn btn-danger">X</button></td></tr>';
   $(document).on('click', '#addmaterial', function() {
//    alert("Hellow");


  $('#appp4').append(html);
//    alert($("#app1").val())
});

$(document).on('click', '.remove', function() {
  $(this).parents('tr').remove();
});

   });
</script>

<script>
    $(document).on('click','.removeid',function(){

        var id = $(this).data("id");
        var productid = $(this).data("productid");
        // alert(id);
        // alert(productid);

        $.ajax({
            url: "/remove",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                productid: productid,
            },
            success: function(response) {
                alert(response);

            }
        });

    });
</script>

