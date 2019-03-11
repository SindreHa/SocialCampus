<?php 

/* tegner en kalender */

function draw_calendar($month,$year){

	/* tegne tabell */
    
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

    
    
    /* tabell header */
	$header = array('Søndag','Mandag','Tirsdag','Onsdag','Torsdag','Fredag','Lørdag');
    
	$calendar.= '<tr class= "calendar-row"> <td class="calendar-day-head">'
    .implode('</td><td class="calendar-day-head">',$header).'</td></tr>';
    
    
    /* dager og uker */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$month_days = date('t',mktime(0,0,0,$month,1,$year));
	$week_days = 1;
	$day_count = 0;
	$date_array = array();
    $calendar.= '<tr class="calendar-row">';
    
    
    /* print blanke dager til den første dagen i uka*/
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$week_days++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';
    
    ;?>