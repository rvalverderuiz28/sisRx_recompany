<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Administrador']);

        //MODULO DASHBOARD
        Permission::create(['name' => 'dashboard.modulo', 'description' => 'MODULO DASHBOARD', 'modulo' => 'moduloDashboard'])->assignRole($admin);

        //MODULO ORDEN DE SERVICIO
        Permission::create(['name' => 'proyecto.modulo', 'description' => 'MODULO DE PROYECTO', 'modulo' => 'moduloProyectos'])->assignRole($admin);

        //ORDEN DE SERVICIO
        Permission::create(['name' => 'proyecto.index', 'description' => 'Ver Proyectos', 'modulo' => 'BandejaProyectos'])->assignRole($admin);
        Permission::create(['name' => 'proyecto.create', 'description' => 'Crear Proyecto', 'modulo' => 'Proyectos'])->assignRole($admin);
        Permission::create(['name' => 'proyecto.show', 'description' => 'Detalle De Proyecto', 'modulo' => 'Proyectos'])->assignRole($admin);
        Permission::create(['name' => 'proyecto.edit', 'description' => 'Editar Proyecto', 'modulo' => 'Proyectos'])->assignRole($admin);
        Permission::create(['name' => 'proyecto.destroy', 'description' => 'Eliminar Proyecto', 'modulo' => 'Proyectos'])->assignRole($admin);
        Permission::create(['name' => 'proyecto.misproyectos', 'description' => 'Ver Mis Proyectos', 'modulo' => 'Proyectos'])->assignRole($admin);
        Permission::create(['name' => 'proyecto.proyectossinasignar', 'description' => 'Ver Proyectos Sin Asignar', 'modulo' => 'Proyectos'])->assignRole($admin);
        Permission::create(['name' => 'proyecto.proyectosenejecucion', 'description' => 'Ver Proyectos En Ejecucion', 'modulo' => 'Proyectos'])->assignRole($admin);
        Permission::create(['name' => 'proyecto.proyectosterminados', 'description' => 'Ver Proyectos Terminados', 'modulo' => 'Proyectos'])->assignRole($admin);
        // Permission::create(['name' => 'proyecto.PDF', 'description' => 'Ver PDF', 'modulo' => 'OrdeServicio'])->assignRole($admin);

        //MODULO PERSONAS
        Permission::create(['name' => 'personas.modulo', 'description' => 'MODULO PERSONAS', 'modulo' => 'moduloPersonas'])->assignRole($admin);

        //CLIENTES
        Permission::create(['name' => 'clientes.index', 'description' => 'Ver Clientes', 'modulo' => 'BandejaClientes'])->assignRole($admin);
        Permission::create(['name' => 'clientes.create', 'description' => 'Crear Cliente', 'modulo' => 'Clientes'])->assignRole($admin);
        Permission::create(['name' => 'clientes.show', 'description' => 'Detalle De Cliente', 'modulo' => 'Clientes'])->assignRole($admin);
        Permission::create(['name' => 'clientes.edit', 'description' => 'Editar Cliente', 'modulo' => 'Clientes'])->assignRole($admin);
        Permission::create(['name' => 'clientes.destroy', 'description' => 'Eliminar Cliente', 'modulo' => 'Clientes'])->assignRole($admin);

        //USUARIOS
        Permission::create(['name' => 'usuarios.index', 'description' => 'Ver Usuarios', 'modulo' => 'BandejaUsuarios'])->assignRole($admin);
        Permission::create(['name' => 'usuarios.create', 'description' => 'Crear Usuario', 'modulo' => 'Usuarios'])->assignRole($admin);
        Permission::create(['name' => 'usuarios.show', 'description' => 'Detalle De Usuario', 'modulo' => 'Usuarios'])->assignRole($admin);
        Permission::create(['name' => 'usuarios.edit', 'description' => 'Editar Usuario', 'modulo' => 'Usuarios'])->assignRole($admin);
        Permission::create(['name' => 'usuarios.destroy', 'description' => 'Eliminar Usuario', 'modulo' => 'Usuarios'])->assignRole($admin);

        //MODULO MANTENIMIENTOS
        Permission::create(['name' => 'mantenimientos.modulo', 'description' => 'MODULO MANTENIMIENTOS', 'modulo' => 'moduloMantenimientos'])->assignRole($admin);

        //ROLES
        Permission::create(['name' => 'roles.index', 'description' => 'Ver Roles', 'modulo' => 'BandejaRoles'])->assignRole($admin);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear Rol', 'modulo' => 'Roles'])->assignRole($admin);
        Permission::create(['name' => 'roles.show', 'description' => 'Detalle De Rol', 'modulo' => 'Roles'])->assignRole($admin);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar Rol', 'modulo' => 'Roles'])->assignRole($admin);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar Rol', 'modulo' => 'Roles'])->assignRole($admin);

        //ESTADOS
        Permission::create(['name' => 'estados.index', 'description' => 'Ver Estados', 'modulo' => 'BandejaEstados'])->assignRole($admin);
        Permission::create(['name' => 'estados.create', 'description' => 'Crear Estado', 'modulo' => 'Estados'])->assignRole($admin);
        Permission::create(['name' => 'estados.show', 'description' => 'Detalle De Estado', 'modulo' => 'Estados'])->assignRole($admin);
        Permission::create(['name' => 'estados.edit', 'description' => 'Editar Estado', 'modulo' => 'Estados'])->assignRole($admin);
        Permission::create(['name' => 'estados.destroy', 'description' => 'Eliminar Estado', 'modulo' => 'Estados'])->assignRole($admin);

        //MODULO REPORTES
        Permission::create(['name' => 'reportes.modulo', 'description' => 'MODULO REPORTES', 'modulo' => 'moduloReportes'])->assignRole($admin);

        //REPORTE VENTAS
        Permission::create(['name' => 'reportes.ventas', 'description' => 'Ver Reportes Ventas', 'modulo' => 'ReporteVentas'])->assignRole($admin);
    }
}
