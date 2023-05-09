<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Rules\Role;

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
        Permission::create(['name' => 'ordenservicio.modulo', 'description' => 'MODULO ORDEN DE SERVICIO', 'modulo' => 'moduloOrdeServicios'])->assignRole($admin);

        //ORDEN DE SERVICIO
        Permission::create(['name' => 'ordenservicio.index', 'description' => 'Ver Ordenes Servicios', 'modulo' => 'BandejaOrdeServicios'])->assignRole($admin);
        Permission::create(['name' => 'ordenservicio.create', 'description' => 'Crear Orden Servicio', 'modulo' => 'OrdeServicio'])->assignRole($admin);
        Permission::create(['name' => 'ordenservicio.show', 'description' => 'Detalle Orden Servicio', 'modulo' => 'OrdeServicio'])->assignRole($admin);
        Permission::create(['name' => 'ordenservicio.edit', 'description' => 'Editar Orden Servicio', 'modulo' => 'OrdeServicio'])->assignRole($admin);
        Permission::create(['name' => 'ordenservicio.destroy', 'description' => 'Eliminar Orden Servicio', 'modulo' => 'OrdeServicio'])->assignRole($admin);
        Permission::create(['name' => 'ordenservicio.factura', 'description' => 'Ver Facturas', 'modulo' => 'OrdeServicio'])->assignRole($admin);
        Permission::create(['name' => 'ordenservicio.PDF', 'description' => 'Ver PDF', 'modulo' => 'OrdeServicio'])->assignRole($admin);

        //MODULO PERSONAS
        Permission::create(['name' => 'personas.modulo', 'description' => 'MODULO PERSONAS', 'modulo' => 'moduloPersonas'])->assignRole($admin);

        //CLIENTES
        Permission::create(['name' => 'clientes.index', 'description' => 'Ver Clientes', 'modulo' => 'BandejaClientes'])->assignRole($admin);
        Permission::create(['name' => 'clientes.create', 'description' => 'Crear Cliente', 'modulo' => 'Clientes'])->assignRole($admin);
        Permission::create(['name' => 'clientes.show', 'description' => 'Ver Sucursal', 'modulo' => 'Clientes'])->assignRole($admin);
        Permission::create(['name' => 'clientes.edit', 'description' => 'Editar Cliente', 'modulo' => 'Clientes'])->assignRole($admin);
        Permission::create(['name' => 'clientes.destroy', 'description' => 'Eliminar Cliente', 'modulo' => 'Clientes'])->assignRole($admin);
        Permission::create(['name' => 'sucursal.create', 'description' => 'Crear Sucursal', 'modulo' => 'Clientes'])->assignRole($admin);
        Permission::create(['name' => 'sucursal.delete', 'description' => 'Eliminar Sucursal', 'modulo' => 'Clientes'])->assignRole($admin);

        //USUARIOS
        Permission::create(['name' => 'usuarios.index', 'description' => 'Ver Usuarios', 'modulo' => 'BandejaUsuarios'])->assignRole($admin);
        Permission::create(['name' => 'usuarios.create', 'description' => 'Crear Usuario', 'modulo' => 'Usuarios'])->assignRole($admin);
        Permission::create(['name' => 'usuarios.show', 'description' => 'Detalle Usuario', 'modulo' => 'Usuarios'])->assignRole($admin);
        Permission::create(['name' => 'usuarios.edit', 'description' => 'Editar Usuario', 'modulo' => 'Usuarios'])->assignRole($admin);
        Permission::create(['name' => 'usuarios.destroy', 'description' => 'Eliminar Usuario', 'modulo' => 'Usuarios'])->assignRole($admin);

        //ROLES
        Permission::create(['name' => 'roles.index', 'description' => 'Ver Roles', 'modulo' => 'BandejaRoles'])->assignRole($admin);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear Rol', 'modulo' => 'Roles'])->assignRole($admin);
        Permission::create(['name' => 'roles.show', 'description' => 'Detalle Rol', 'modulo' => 'Roles'])->assignRole($admin);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar Rol', 'modulo' => 'Roles'])->assignRole($admin);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar Rol', 'modulo' => 'Roles'])->assignRole($admin);

        //MODULO MANTENIMIENTOS
        Permission::create(['name' => 'mantenimientos.modulo', 'description' => 'MODULO MANTENIMIENTOS', 'modulo' => 'moduloMantenimientos'])->assignRole($admin);

        //SERVICIOS
        Permission::create(['name' => 'servicios.index', 'description' => 'Ver Servicios', 'modulo' => 'BandejaServicios'])->assignRole($admin);
        Permission::create(['name' => 'servicios.create', 'description' => 'Crear Servicio', 'modulo' => 'Servicios'])->assignRole($admin);
        Permission::create(['name' => 'servicios.show', 'description' => 'Detalle Servicio', 'modulo' => 'Servicios'])->assignRole($admin);
        Permission::create(['name' => 'servicios.edit', 'description' => 'Editar Servicio', 'modulo' => 'Servicios'])->assignRole($admin);
        Permission::create(['name' => 'servicios.destroy', 'description' => 'Eliminar Servicio', 'modulo' => 'Servicios'])->assignRole($admin);

        //PRODUCTOS
        Permission::create(['name' => 'productos.index', 'description' => 'Ver Productos', 'modulo' => 'BandejaProductos'])->assignRole($admin);
        Permission::create(['name' => 'productos.create', 'description' => 'Crear Producto', 'modulo' => 'Productos'])->assignRole($admin);
        Permission::create(['name' => 'productos.show', 'description' => 'Detalle Producto', 'modulo' => 'Productos'])->assignRole($admin);
        Permission::create(['name' => 'productos.edit', 'description' => 'Editar Producto', 'modulo' => 'Productos'])->assignRole($admin);
        Permission::create(['name' => 'productos.destroy', 'description' => 'Eliminar Producto', 'modulo' => 'Productos'])->assignRole($admin);

        //MODULO REPORTES
        Permission::create(['name' => 'reportes.modulo', 'description' => 'MODULO REPORTES', 'modulo' => 'moduloReportes'])->assignRole($admin);

        //REPORTE VENTAS
        Permission::create(['name' => 'reportes.ventas', 'description' => 'Ver Reportes Ventas', 'modulo' => 'ReporteVentas'])->assignRole($admin);
    }
}
