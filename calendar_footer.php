 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3-pre
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>


  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script>
      $(document).ready(function(){
          var calendar = $('#calendar').fullCalendar({
            editable:true,
            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
            nextDayThreshold: '09:00:00',
            header:{
              left:'prev,next today',
              center:'title',
              right:'month,agendaWeek,agendaDay'
            },
            events:'controller/calendar_transactions.php'
          });
          
          var calendar1 = $('#calendar1').fullCalendar({
            editable:true,
            plugins: ['bootstrap','interaction','dayGrid','timeGrid'],
            nextDayThreshold: '09:00:00',
            header:{
                left:'prev,next today',
              center:'title',
              right:'month,agendaWeek,agendaDay'
            },
            events:'controller/calendar_maintenance.php'
          });
      })
  </script>
</body>
</html>
