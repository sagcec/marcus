<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Teste unilab">
    <meta name="author" content="Teste Unilab">
    <link rel="icon" href="<?=base_url('assets/images/unici/favicon.png')?>">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>


    <title>Marcus Paulo: Teste Unilab</title>

    <!-- Folha de estilo do Boostrap 3.3.6 -->
    <link href="<?=base_url('assets/css/bootstrap/bootstrap.min.css')?>" rel="stylesheet">

    <!-- IE10 viewport hack para Surface/desktop Windows 8 -->
    <link href="<?=base_url('assets/css/plugins/ie10-viewport-bug-workaround.css')?>" rel="stylesheet">

    <!-- Folha de estilo com as configurações da fonte Source Sans Pro -->
    <link rel='stylesheet' id='hexa-source-sans-pro-css'  href='http://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C400%2C700%2C300italic%2C400italic%2C700italic&#038;ver=4.4.2' type='text/css' media='all' />

    <!-- Folha de estilo padrão dos exemplos -->
    <link href="<?=base_url('assets/css/estilo.css')?>" rel="stylesheet">

    <!--[if lt IE 9]><script src="<?=base_url('assets/js/plugins/ie8-responsive-file-warning.js')?>"></script><![endif]-->
    <script src="<?=base_url('assets/js/plugins/ie-emulation-modes-warning.js')?>"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

     <script src="<?=base_url('assets/js/jquery/jquery-1.9.1.min.js')?>"></script>
     <script src="<?=base_url('assets/js/jquery.quick.search.js')?>"></script>
     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script>
      $(document).ready(function()
      {
        $("#myInput").on("keyup", function()
        {
          var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function()
            {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
     });

     </script>
   <script>
   $(document).ready(function()
   {
    $("#checkTodos__").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
   });

   $("#checkTodos__").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
   });

     var checkTodos = $("#checkTodos");
     checkTodos.click(function () {
     if ( $(this).is(':checked') ){
     $('input:checkbox').prop("checked", true);
     }else{
           $('input:checkbox').prop("checked", false);
     }
   });
 });
 </script>


  </head>

  <body>


  
<?php $this->load->view('commons/cabecalho-unici'); ?>
