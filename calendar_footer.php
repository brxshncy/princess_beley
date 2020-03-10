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
        var d = new Date();
        var CurDate = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate(); 
          var calendar = $('#calendar').fullCalendar({
            editable:true,
            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
            header:{
              left:'prev,next today',
              center:'title',
              right:'month,basicWeek,basicDay'
            },
            navLinks: true, 
            editable: false,
            columnFormat: 'dddd',
            defaultDate: CurDate,
            events:{
              url:'controller/calendar_transactions.php',
              error:function(){
                alert('error');
              }
            },
            eventRender:function(event,element){
                console.log(event);
                element.find(".fc-title").append("<b>Equipment Name :</b><u>"+event.equipment_name+"</u><br><b>Benefeciaries: </b><u>"+event.benefeciaries+"</u><br> <b>Reason:</b><u>"+event.reason+"</u><br><b>Address</b>:<u>"+event.address+"<br><b>District Coordinator :</b><u>"+event.dc+"</u>")
            }
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
            navLinks: true, 
            editable: false,
            columnFormat: 'dddd',
            defaultDate: CurDate,
            events:{
                url:'controller/calendar_maintenance.php',
                error:function(){
                  alert('error');
                }
            },
            eventRender:function(event,element){
              element.find(".fc-title").append("<b>Equipment: </b>"+event.equipment_name);
            }
          });
      })
  </script>
</body>
</html>
