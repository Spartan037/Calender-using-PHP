<?php
echo "
		<html>
		<head>
		<style>
			h1 {font-family: verdana; font-size: 52px; color: red; text-align: center; text-decoration: underline}
			table.calendar	{ margin-left:15em; border-left:1px solid #999; }
			tr.calendar-row	{  }
			td.calendar-day	{ min-height:80px; font-size:11px; position:relative; background:#eee;} * html div.calendar-day { height:80px; }
			td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
			td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
			div.day-number	{ background:#999; padding:10px; color:#fff; font-weight:bold; font-size: 20px; float:center; margin:-2px -2px -2px -2px; width:100px; text-align:center; }
			td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
			body {background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);}
		</style>
		</head>
		<body>";
function draw_calendar($month,$year){

	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
	$calendar.= '<tr class="calendar-row">';
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
		$calendar.= '<div class="day-number"><p>'.$list_day.'</P></div>';
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;
	$calendar.= '</tr>';
	$calendar.= '</table>';
	return $calendar;
}

echo '	<h1>December 2020</h1>';
echo draw_calendar(12,2020);


echo "
		</body>
		</html>";
?>