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
	'qa_create' => 'बनाइए (क्रिएट)',
	'qa_save' => 'सुरक्षित करे ',
	'qa_edit' => 'संपादित करे (एडिट)',
	'qa_view' => 'देखें',
	'qa_update' => 'सुधारे ',
	'qa_list' => 'सूची',
	'qa_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'qa_custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'qa_logout' => 'लोग आउट',
	'qa_add_new' => 'नया समाविष्ट करे',
	'qa_are_you_sure' => 'आप निस्चित है ?',
	'qa_back_to_list' => 'सूची पे वापस जाए',
	'qa_dashboard' => 'डॅशबोर्ड ',
	'qa_delete' => 'मिटाइए',
	'quickadmin_title' => 'Walgreens Boot Aliance Calendar Manager',
];