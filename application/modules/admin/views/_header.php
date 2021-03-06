<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Stream Soccer</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/flatly/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    
    <!-- SynCompiler : CSS -->
    <?php echo SynCompileCSS() ?>

    <!-- SynCompiler : JS -->
    <script src="https://whotalk.thenets.org/public/node_modules/core-js/client/shim.min.js"></script>
    <script src="https://whotalk.thenets.org/public/node_modules/zone.js/dist/zone.js"></script>
    <script src="https://whotalk.thenets.org/public/node_modules/reflect-metadata/Reflect.js"></script>
    <script src="https://whotalk.thenets.org/public/node_modules/rxjs/bundles/Rx.umd.js"></script>
    <script src="https://whotalk.thenets.org/public/node_modules/@angular/core/core.umd.js"></script>
    <script src="https://whotalk.thenets.org/public/node_modules/@angular/common/common.umd.js"></script>
    <script src="https://whotalk.thenets.org/public/node_modules/@angular/compiler/compiler.umd.js"></script>
    <script src="https://whotalk.thenets.org/public/node_modules/@angular/platform-browser/platform-browser.umd.js"></script>
    <script src="https://whotalk.thenets.org/public/node_modules/@angular/platform-browser-dynamic/platform-browser-dynamic.umd.js"></script>

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <?php echo SynCompileJS() ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url('admin')?>">Stream Soccer</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('admin/campeonatos') ?>">Campeonatos</a></li>
        <li><a href="<?php echo base_url('admin/equipes') ?>">Equipes</a></li>
        <li><a href="<?php echo base_url('admin/arbitros') ?>">Arbitros</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url() ?>" target="_blank">Cliente</a></li>
        <li><a href="<?php echo base_url() ?>">Sair</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>