
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='<?php echo base_url()?>gui_modul/full_calendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url()?>gui_modul/full_calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url()?>gui_modul/full_calendar/lib/moment.min.js'></script>
<script src='<?php echo base_url()?>gui_modul/full_calendar/lib/jquery.min.js'></script>
<script src='<?php echo base_url()?>gui_modul/full_calendar/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: new Date(),
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: "<?php echo site_url()?>/pemesanan/t/allevent"
		});
		
	});
</script>

</head>
<body>

	<div id='calendar'></div>

</body>
</html>
