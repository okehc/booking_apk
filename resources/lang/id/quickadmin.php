<?php

return [
		'user-management' => [		'title' => 'Administración de usuarios',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Título',		],	],
		'users' => [		'title' => 'Usuarios',		'fields' => [			'name' => 'Nombre',			'apellido-paterno' => 'Apellido Paterno',			'apellido-materno' => 'Apellido Materno',			'email' => 'Correo',			'password' => 'Contraseña',			'role' => 'Rol',			'remember-token' => 'Recordar token',		],	],
		'reservacion' => [		'title' => 'Mis Reservaciones',		'fields' => [			'nombre-de-reunion' => 'Reunión',			'ubicacion' => 'Ubicación',			'sala-de-juntas' => 'Sala de Juntas',			'fecha-de-inicio' => 'Fecha de Inicio',			'fecha-de-finalizacion' => 'Fecha de Finalización',			'repeat' => 'Repetir?',			'invitado' => 'Invitado(s)',			'comentario' => 'Mensaje',		],	],
		'ubicaciones' => [		'title' => 'Adminitración de Ubicaciones',		'fields' => [			'nombre' => 'Nombre de Ubicación',			'ciudad' => 'Ciudad',			'estado' => 'Estado',		],	],
		'accesos' => [		'title' => 'Adminitración de Accesos',		'fields' => [			'nombre-acceso' => 'Nombre del Acceso',			'id-ubicacion' => 'Ubicación',		],	],
		'seccion' => [		'title' => 'Administración de recursos ( salas ) ',		'fields' => [			'id-ubicacion' => 'Ubicación',			'nombre-seccion' => 'Nombre de sección',			'id-atributos' => 'Id atributos',		],	],
		'administracion' => [		'title' => 'Administración',		'fields' => [		],	],
		'adminitracion' => [		'title' => 'Adminitración General',		'fields' => [		],	],
	'qa_create' => 'Buat',
	'qa_save' => 'Simpan',
	'qa_edit' => 'Edit',
	'qa_view' => 'Lihat',
	'qa_update' => 'Update',
	'qa_list' => 'Daftar',
	'qa_no_entries_in_table' => 'Tidak ada data di tabel',
	'qa_custom_controller_index' => 'Controller index yang sesuai kebutuhan Anda.',
	'qa_logout' => 'Keluar',
	'qa_add_new' => 'Tambahkan yang baru',
	'qa_are_you_sure' => 'Anda yakin?',
	'qa_back_to_list' => 'Kembali ke daftar',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Hapus',
	'qa_delete_selected' => 'Hapus terpilih',
	'quickadmin_title' => 'Walgreens Boot Aliance Calendar Manager',
];