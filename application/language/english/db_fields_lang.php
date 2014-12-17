<?php

/*************************
	 Table names
*************************/
$lang['event'] = 'Event';
$lang['place'] = 'Place';
$lang['place_has_section'] = 'Place_has_section';
$lang['reservation'] = 'Reservation';
$lang['role'] = 'Role';
$lang['seat'] = 'Seat';
$lang['section'] = 'Section';
$lang['user'] = 'User';
$lang['user_profile'] = 'User_profile';


/*************************
	 Table: Event
*************************/
$lang['id'] = '';
$lang['place_id'] = 'Lugar';
$lang['name'] = 'Nombre';
$lang['photo'] = 'Foto';
$lang['dateTime'] = 'Fecha';
$lang['delete'] = '';


/*************************
	 Table: Place
*************************/
$lang['id'] = '';
$lang['name'] = '';
$lang['photo'] = '';
$lang['description'] = '';


/*************************
	 Table: Place_has_section
*************************/
$lang['place_id'] = '';
$lang['section_id'] = '';


/*************************
	 Table: Reservation
*************************/
$lang['id'] = '';
$lang['user_id'] = '';
$lang['event_id'] = '';
$lang['date'] = '';
$lang['state'] = '';
	// 'state' has some enum values, you can name them
	$lang['PROCESSING'] = 'PROCESSING';
	$lang['DELIVERED'] = 'DELIVERED';
$lang['more'] = '';


/*************************
	 Table: Role
*************************/
$lang['id'] = '';
$lang['role'] = '';
$lang['default'] = '';


/*************************
	 Table: Seat
*************************/
$lang['id'] = '';
$lang['section_id'] = '';
$lang['number_row'] = '';
$lang['number_seat'] = '';
$lang['occupied'] = '';


/*************************
	 Table: Section
*************************/
$lang['id'] = '';
$lang['rows'] = '';
$lang['seats_per_rows'] = '';
$lang['price'] = '';
$lang['description'] = '';


/*************************
	 Table: User
*************************/
$lang['id'] = '';
$lang['name'] = '';
$lang['email'] = '';
$lang['username'] = '';
$lang['role_id'] = '';
$lang['delete'] = '';


/*************************
	 Table: User_profile
*************************/
$lang['id'] = '';
$lang['user_id'] = '';
$lang['address'] = '';
$lang['city'] = '';
$lang['province'] = '';
$lang['zipcode'] = '';
$lang['phone'] = '';
$lang['celular'] = '';
$lang['role_id'] = '';
$lang['delete'] = '';
