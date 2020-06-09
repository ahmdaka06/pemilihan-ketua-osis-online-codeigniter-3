<title>Dashboard || E-Pilketos</title>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 style="float: left;">
    Dashboard
  </h1>&nbsp;&nbsp;
  Real time
  <div class="btn-group" id="realtime" data-toggle="btn-toggle">
    <button type="button" class="btn btn-default btn-xs" data-toggle="on" onclick="start()">On</button>
    <button type="button" class="btn btn-default btn-xs active" data-toggle="off" onclick="clearInterval(realtime)">Off</button>
  </div>
  <div id="box"></div>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content" id="view-dashboard">

  <!-- Your Page Content Here -->
  

</section>
<!-- /.content -->

<script>
    function start() 
    {
      realtime = setInterval(function(){
        $('#view-dashboard').load('admin/dashboard_view');
      }, 5000); 
    }
</script>