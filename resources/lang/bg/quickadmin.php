<?php

return [
		'user-management' => [		'title' => 'Administración de usuarios',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Título',		],	],
		'users' => [		'title' => 'Usuarios',		'fields' => [			'name' => 'Nombre',			'apellido-paterno' => 'Apellido Paterno',			'apellido-materno' => 'Apellido Materno',			'email' => 'Correo',			'password' => 'Contraseña',			'role' => 'Rol',			'remember-token' => 'Recordar token',		],	],
		'reservacion' => [		'title' => 'Mis Reservaciones',		'fields' => [			'nombre-de-reunion' => 'Reunión',			'ubicacion' => 'Ubicación',			'sala-de-juntas' => 'Sala de Juntas',			'hora-duracion' => 'Horas de Duración',			'minuto-duracion' => 'Minutos de Duración',			'repeat' => 'Repetir?',			'comentario' => 'Mensaje',		],	],
		'ubicaciones' => [		'title' => 'Adminitración de Ubicaciones',		'fields' => [			'nombre' => 'Nombre de Ubicación',			'ciudad' => 'Ciudad',			'estado' => 'Estado',		],	],
		'accesos' => [		'title' => 'Adminitración de Accesos',		'fields' => [			'nombre-acceso' => 'Nombre del Acceso',			'id-ubicacion' => 'Ubicación',		],	],
		'seccion' => [		'title' => 'Administración de recursos',		'fields' => [			'id-ubicacion' => 'Ubicación',			'nombre-seccion' => 'Nombre de sección',			'id-atributos' => 'Id atributos',		],	],
		'administracion' => [		'title' => 'Administración',		'fields' => [		],	],
		'adminitracion' => [		'title' => 'Adminitración General',		'fields' => [		],	],
	'qa_create' => 'Създай',
	'qa_save' => 'Запази',
	'qa_edit' => 'Промени',
	'qa_view' => 'Покажи',
	'qa_update' => 'Обнови',
	'qa_list' => 'Списък',
	'qa_no_entries_in_table' => 'Няма записи в таблицата',
	'qa_custom_controller_index' => 'Персонализиран контролер.',
	'qa_logout' => 'Изход',
	'qa_add_new' => 'Добави нов',
	'qa_are_you_sure' => 'Сигурни ли сте?',
	'qa_back_to_list' => 'Обратно към списъка',
	'qa_dashboard' => 'Табло',
	'qa_delete' => 'Изтрий',
	'quickadmin_title' => 'Walgreens Boot Aliance Calendar Manager',
];