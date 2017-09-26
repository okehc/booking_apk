<?php

return [
		'user-management' => [		'title' => 'Administración de usuarios',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Título',		],	],
		'users' => [		'title' => 'Usuarios',		'fields' => [			'name' => 'Nombre',			'email' => 'Correo',			'password' => 'Contraseña',			'role' => 'Rol',			'remember-token' => 'Recordar token',		],	],
		'reservacion' => [		'title' => 'Mis Reservaciones',		'fields' => [			'nombre-de-reunion' => 'Reunión',			'ubicacion' => 'Ubicación',			'sala-de-juntas' => 'Sala de Juntas',			'fecha-de-inicio' => 'Fecha de Inicio',			'fecha-de-finalizacion' => 'Fecha de Finalización',			'repeat' => 'Repetir?',			'invitado' => 'Invitado(s)',			'comentario' => 'Mensaje',		],	],
		'ubicaciones' => [		'title' => 'Adminitración de Ubicaciones',		'fields' => [			'nombre' => 'Nombre de Ubicación',			'ciudad' => 'Ciudad',			'estado' => 'Estado',		],	],
		'accesos' => [		'title' => 'Adminitración de Accesos',		'fields' => [			'nombre-acceso' => 'Nombre del Acceso',			'id-ubicacion' => 'Ubicación',		],	],
		'seccion' => [		'title' => 'Administración de recursos ( salas ) ',		'fields' => [			'id-ubicacion' => 'Ubicación',			'nombre-seccion' => 'Nombre de sección',			'id-atributos' => 'Id atributos',		],	],
		'administracion' => [		'title' => 'Administración',		'fields' => [		],	],
		'adminitracion' => [		'title' => 'Adminitración General',		'fields' => [		],	],
	'qa_create' => 'Létrehozás',
	'qa_save' => 'Mentés',
	'qa_edit' => 'Szerkesztés',
	'qa_view' => 'Megtekintés',
	'qa_update' => 'Frissítés',
	'qa_list' => 'Lista',
	'qa_no_entries_in_table' => 'Nincs bejegyzés a táblában',
	'qa_logout' => 'Kijelentkezés',
	'qa_add_new' => 'Új hozzáadása',
	'qa_are_you_sure' => 'Biztosan így legyen?',
	'qa_back_to_list' => 'Vissza a listához',
	'qa_dashboard' => 'Vezérlőpult',
	'qa_delete' => 'Törlés',
	'qa_custom_controller_index' => 'Egyedi vezérlő index.',
	'quickadmin_title' => 'Walgreens Boot Aliance Calendar Manager',
];