<?php

//personalizado
if ($range == 'PERSONALIZADO'){
	$diferenca =  strtotime($_POST['dt_final']) - strtotime($_POST['dt_inicial']);
	$dias = (int)floor( $diferenca / (60 * 60 * 24));
	
	if($dias <= 31){
		$sintax = 'Date';
	}
	
	if($dias > 31 && $dias < 366){
		$sintax = 'Month';
	}
	
	if($dias > 366){
		$sintax = 'Year';
	}
	$startdate = date('Y-m-d', strtotime($_POST['dt_inicial']));
	$enddate = date('Y-m-d', strtotime($_POST['dt_final']));
	
	$ranges = date('Ymd', strtotime($_POST['dt_inicial'])).','. date('Ymd', strtotime($_POST['dt_final']));
	$month = date('d/m/Y', strtotime($_POST['dt_inicial'])).' a '. date('d/m/Y', strtotime($_POST['dt_final']));
}

//Hoje
if ($range == 'TODAY'){
	$month = date('d/m/Y');
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("today"));
	$enddate = date('Y-m-d', strtotime("today"));
}

//ontem
if ($range == 'YESTERDAY'){
	$month = date('d/m/Y', strtotime("yesterday"));
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("yesterday"));
	$enddate = date('Y-m-d', strtotime("yesterday"));
	
}

//Esta semana (Dom- hoje)
if ($range == 'THIS_WEEK_SUN_TODAY'){
	$month = date("d/m/Y",strtotime("last sunday")).' a '.date("d/m/Y", strtotime("today"));
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("last sunday"));
	$enddate = date('Y-m-d', strtotime("today"));
}

//Esta semana (Seg- hoje)
if ($range == 'THIS_WEEK_MON_TODAY'){
	$month = date("d/m/Y",strtotime("last monday")).' a '.date("d/m/Y", strtotime("today"));
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("last monday"));
	$enddate = date('Y-m-d', strtotime("today"));
	
}

//ultimos 7 dias	
if ($range == 'LAST_7_DAYS'){
	$month = date("d/m/Y",strtotime("-7 days")).' a '.date("d/m/Y", strtotime("yesterday"));
	$sintax = 'Date';
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("-7 days"));
	$enddate = date('Y-m-d', strtotime("yesterday"));
}

//Semana passada (seg - dom)	
if($range == 'LAST_WEEK'){
	$month = date("d/m/Y",strtotime("monday",strtotime("last week"))).' a '.date("d/m/Y", strtotime("sunday",strtotime("last week")));
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("monday",strtotime("last week")));
	$enddate = date('Y-m-d', strtotime("sunday",strtotime("last week")));
	
}

//Semana passada (Dom - Sab)
if ($range == 'LAST_WEEK_SUN_SAT'){
	$month = date("d/m/Y",strtotime("last sunday",strtotime("last week"))).' a '.date("d/m/Y", strtotime("saturday",strtotime("last week")));
	$sintax = 'Date';
	
		//para analytics
	$startdate = date('Y-m-d', strtotime("last sunday",strtotime("last week")));
	$enddate = date('Y-m-d', strtotime("saturday",strtotime("last week")));
}

//Ultima semana útil (seg - sex)	
if($range == 'LAST_BUSINESS_WEEK'){
	$month = date("d/m/Y",strtotime("monday",strtotime("last week"))).' a '.date("d/m/Y", strtotime("friday",strtotime("last week")));
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("monday",strtotime("last week")));
	$enddate = date('Y-m-d', strtotime("friday",strtotime("last week")));
}

//Ultimos 14 dias
if ($range == 'LAST_14_DAYS'){
	$month = date("d/m/Y",strtotime("-14 days")).' a '.date("d/m/Y", strtotime("yesterday"));
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("-14 days"));
	$enddate = date('Y-m-d', strtotime("yesterday"));
}

//Este mês
if ($range == 'THIS_MONTH'){
	$month = '01'.date("/m/Y",strtotime("today")).' a '.date("d/m/Y", strtotime("today"));
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m', strtotime("today")).'-01';
	$enddate = date('Y-m-d', strtotime("today"));
}

//Ultimos 30 dias
if ($range == 'LAST_30_DAYS'){
	$month = date("d/m/Y",strtotime("-30 days")).' a '.date("d/m/Y", strtotime("yesterday"));
	$sintax = 'Date';
		//para analytics
	$startdate = date('Y-m-d', strtotime("-30 days"));
	$enddate = date('Y-m-d', strtotime("yesterday"));
}

//Mês Anterior
if ($range == 'LAST_MONTH'){
	$month = date("d/m/Y",strtotime("first day of last month")).' a '.date("t/m/Y", strtotime("last day of last month"));
	$sintax = 'Date';
		//para analytics
	$startdate = date("Y-m-d",strtotime("first day of last month"));
	$enddate = date("Y-m-t", strtotime("last day of last month"));
}

//Ano atual
if ($range == 'ALL'){
	$month = date("Y",strtotime("today"));
	$sintax = 'Month';
		//para analytics
	$startdate = date('Y', strtotime("today")).'-01-01';
	$enddate = date('Y-m-d', strtotime("today"));
}

//Ano anterior
if ($range == 'LAST_YEAR'){
	$month = date('Y', strtotime("last year"));
	$sintax = 'Month';
		//para analytics
	$startdate = date('Y', strtotime("-1 year")).'-01-01';
	$enddate = date('Y', strtotime("-1 year")).'-12-31';
}

//Ultimos 3 anos
if ($range == 'LAST_3_YEAR'){
	$ranges = date('Y', strtotime("-3 year"))."0101,". date('Y', strtotime("-1 year")).'1231';
	$month = strftime ("%Y",strtotime("-3 year")).' a '.strftime ("%Y", strtotime("-1 year"));
	$sintax = 'Year';
		//para analytics
	$startdate = date('Y', strtotime("-3 year")).'-01-01';
	$enddate = date('Y', strtotime("-1 year")).'-12-31';
}
