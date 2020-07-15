<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Absensi WebIoT</title>
    <link href="bootstrap.min.css" rel="stylesheet"  type="text/css">
    <script src="jquery.min.js"></script>
    <script src="jquery-ui-1.10.3.min.js" type="text/javascript"></script>
  </head>
  <body>
    <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    date_default_timezone_set('Asia/Jakarta');
    ini_set('max_execution_time', 0);
    $db = new SQLite3('local.db');
    if(!$db) {echo $db->lastErrorMsg();} else {$success = "Open database success...! ";}
    $success .= realpath("local.db");
    $q = $db->query("SELECT date, jam, status FROM sinkron ORDER BY id DESC LIMIT 1");
    while ($r = $q->fetchArray()) {
      $row[] = $r;
    }//$row[0]['date']
    $uDate = date('d-M-Y', strtotime($q->fetchArray()['date']));
    $jam = $row[0]['jam'];
    $status = $row[0]['status'];
    $date = date('Y-m-d');
    echo '<script>console.log("'.str_replace('\\', '/', $success).'");</script>';
    ?>
    <div class="header col-md-12" id="upDate"><strong>Sinkronisasi Sistem Absensi</strong><br>
    <small>Last Update: <span><?php echo $uDate.' / '.$jam.' WIB'; ?></span></small><br>
    <small>Status: <?php if ($status=='0') { echo '<span style="color: red;">Gagal</span>'; } else { echo '<span style="color: green;">Berhasil</span>'; } ?></small></div>
    
    <form accept-charset="utf-8" class="form-group" action="" data="ip0" id="ip0" method="POST">
      <div class="col-md-6">
        <div class="form-group">
          <label for="ip" class="form-label">Ip</label>
          <div class="controls">
            <input class="form-control small-form" id="ip" type="text" name="ip" value="192.168.198.229" autofocus />
          </div>
        </div>
        <div class="form-group">
          <label for="username" class="form-label">Username</label>
          <div class="controls">
            <input class="form-control small-form" id="username" type="text" name="username" value="admin" />
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <div class="controls">
            <input class="form-control small-form" id="password" type="password" name="password" value="ar!234PLN" />
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="max" class="form-label">Maksimal Data</label>
          <div class="controls">
            <input class="form-control small-form" id="max" type="number" name="max" value="30" />
          </div>
        </div>
        <div class="form-group">
          <label for="sDate" class="form-label">Mulai Tanggal</label>
          <div class="controls">
            <input class="form-control small-form" id="sDate" type="date" name="sDate" value="<?php echo $date;?>" />
          </div>
        </div>
        <div class="form-group">
          <label for="eDate" class="form-label">Akhir Tanggal</label>
          <div class="controls">
            <input class="form-control small-form" id="eDate" type="date" name="eDate" value="<?php echo $date;?>" />
          </div>
        </div>        
      </div>
      <div class="col-md-12">
        <div class="box-footer ip0" data="ip0">
          <button type="submit" class="btn btn-success">Login</button>
        </div>
      </div>
    </form>
    <div id="lib">
    </div>
    <div class="footer col-md-12">
      <strong><?php echo date('Y');?> &copy; Sinkronisasi Sistem Absensi</strong>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        window.setTimeout(function() {window.location.reload();},18000000);
        window.setTimeout(function(){$('#ip0').submit(); },1800000);
        $('#ip0').submit(function(e){
          e.preventDefault();
          var id = $(this).attr('data');
          $.ajax({
              data: $(this).serialize(),
              type: 'POST',
              url: 'lib.php',
              beforeSend: function() {$('.'+id).html('<div id="loading"></div>');}, 
              complete: function() {}, 
              success : function(response){
                  window.setTimeout(function() {$("#loading").slideUp(300, function() {$('.'+id).html('<button type="submit" class="btn btn-success">Login</button>');});}, 3000);
                  $('#upDate').load(" #upDate > *" );
                  //$('#lib').html(response);
                  if (response == false) {
                    console.log('gagal koneksi');
                    if(!alert('Transmisi ke alat Face gagal!')){window.location.reload();}
                  }
              } 
          }) 
          .fail(function(jqXHR, textStatus, errorThrown) {if(!alert('Transmisi gagal!')){window.location.reload();} })
        })
      })
    </script>
  </body>
</html>
