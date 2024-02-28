<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Profesional']);
        $role2 = Role::create(['name' => 'Almacenista']);

        //PENDIENTES
        Permission::create(['name' => 'pendientes.index',
        'description' => 'Ver listado de pendientes'])->syncRoles([$role1]);

        Permission::create(['name' => 'pendientes.show',
        'description' => 'Ver pendiente'])->syncRoles([$role1]);

        Permission::create(['name' => 'pendientes.create',
        'description' => 'Crear pendiente'])->syncRoles([$role1]);

        Permission::create(['name' => 'pendientes.edit',
        'description' => 'Editar pendiente'])->syncRoles([$role1]);

        Permission::create(['name' => 'pendientes.destroy',
        'description' => 'Eliminar pendiente'])->syncRoles([$role1]);


        //CITAS
        Permission::create(['name' => 'citas.index',
        'description' => 'Ver calendario'])->syncRoles([$role1]);

        Permission::create(['name' => 'citas.show',
        'description' => 'Ver cita'])->syncRoles([$role1]);

        Permission::create(['name' => 'citas.create',
        'description' => 'Crear cita'])->syncRoles([$role1]);

        Permission::create(['name' => 'citas.edit',
        'description' => 'Editar cita'])->syncRoles([$role1]);

        Permission::create(['name' => 'citas.destroy',
        'description' => 'Eliminar cita'])->syncRoles([$role1]);


        //CONSULTAS
        Permission::create(['name' => 'consultas.index',
        'description' => 'Ver consultas'])->syncRoles([$role1]);

        Permission::create(['name' => 'consultas.show',
        'description' => 'Ver consulta'])->syncRoles([$role1]);

        Permission::create(['name' => 'consultas.create',
        'description' => 'Crear consulta'])->syncRoles([$role1]);

        Permission::create(['name' => 'consultas.edit',
        'description' => 'Editar consulta'])->syncRoles([$role1]);

        Permission::create(['name' => 'consultas.destroy',
        'description' => 'Eliminar consulta'])->syncRoles([$role1]);


        //HISTORIALES MEDICOS
        Permission::create(['name' => 'historialesMedicos.index',
        'description' => 'Ver historiales médicos'])->syncRoles([$role1]);

        Permission::create(['name' => 'historialesMedicos.show',
        'description' => 'Ver historial médico'])->syncRoles([$role1]);

        Permission::create(['name' => 'historialesMedicos.create',
        'description' => 'Crear historial médico'])->syncRoles([$role1]);

        Permission::create(['name' => 'historialesMedicos.edit',
        'description' => 'Editar historial médico'])->syncRoles([$role1]);

        Permission::create(['name' => 'historialesMedicos.destroy',
        'description' => 'Eliminar historial médico'])->syncRoles([$role1]);


        //ALMACENES - INVENTARIOS
        Permission::create(['name' => 'inventarios.index',
        'description' => 'Ver almacenes'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'inventarios.show',
        'description' => 'Ver almacén'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'inventarios.create',
        'description' => 'Crear almacenén'])->syncRoles([$role1]);

        Permission::create(['name' => 'inventarios.edit',
        'description' => 'Editar almacén'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'inventarios.destroy',
        'description' => 'Eliminar almacén'])->syncRoles([$role1, $role2]);


        //INCAPACIDADES
        Permission::create(['name' => 'incapacidades.index',
        'description' => 'Ver incapacidades'])->syncRoles([$role1]);

        Permission::create(['name' => 'incapacidades.show',
        'description' => 'Ver incapacidad'])->syncRoles([$role1]);

        Permission::create(['name' => 'incapacidades.create',
        'description' => 'Crear incapacidad'])->syncRoles([$role1]);

        Permission::create(['name' => 'incapacidades.edit',
        'description' => 'Editar incapacidad'])->syncRoles([$role1]);

        Permission::create(['name' => 'incapacidades.destroy',
        'description' => 'Eliminar incapacidad'])->syncRoles([$role1]);
    }
}
