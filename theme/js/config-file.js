if($('#tipo').val() == 'DISPLAY'){
	$('[name=search').hide();
	$('[name=position]').hide();
	$('[name=display]').show();
	$('[name=conversoes]').show();
	$('[name=gmail]').hide();
}

if($('#tipo').val() == 'SEARCH'){
	$('[name=display]').hide();
	$('[name=search]').show();
	$('[name=conversoes]').hide();
	$('[name=gmail]').hide();
}

if($('#tipo').val() == 'SHOPPING'){
	$('[name=display]').hide();
	$('[name=search]').show();
	$('[name=conversoes]').hide();
	$('[name=gmail]').hide();
}

if($('#tipo').val() == 'GMAIL'){
	$('[name=search').hide();
	$('[name=position]').hide();
	$('[name=display]').show();
	$('[name=conversoes]').hide();
	$('[name=gmail]').show();
}

if($('#word-to').val() != null){
	$('[name=keyword]').hide();
}

$('#bi-content').hide();