<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creates Permissions

        // User Permissions
        
        Permission::create(['name' => 'users.index']); // Index Users
        Permission::create(['name' => 'users.create']); // Create Users
        Permission::create(['name' => 'users.edit']); // Edit Users
        Permission::create(['name' => 'users.show']); // Show Users

        // Role Permissions

        Permission::create(['name' => 'roles.index']); // Index Roles
        Permission::create(['name' => 'roles.create']); // Create Roles
        Permission::create(['name' => 'roles.edit']); // Edit Roles
        Permission::create(['name' => 'roles.show']); // Show Roles

        //Tipos de Dato Permissions

        Permission::create(['name' => 'tiposDeDato.index']); // Index Tipos de Dato
        Permission::create(['name' => 'tiposDeDato.create']); // Create Tipos de Dato
        Permission::create(['name' => 'tiposDeDato.edit']); // Edit Tipos de Dato
        Permission::create(['name' => 'tiposDeDato.show']); // Show Tipos de Dato

        // Departamentos Permissions

        Permission::create(['name' => 'departamentos.index']); // Index Departamentos
        Permission::create(['name' => 'departamentos.create']); // Create Departamentos
        Permission::create(['name' => 'departamentos.edit']); // Edit Departamentos
        Permission::create(['name' => 'departamentos.show']); // Show Departamentos

        // Nodos Permissions

        Permission::create(['name' => 'nodos.index']); // Index Nodos
        Permission::create(['name' => 'nodos.create']); // Create Nodos
        Permission::create(['name' => 'nodos.edit']); // Edit Nodos
        Permission::create(['name' => 'nodos.show']); // Show Nodos
    
        // Ciudades Permissions

        Permission::create(['name' => 'ciudades.index']); // Index Ciudades
        Permission::create(['name' => 'ciudades.create']); // Create Ciudades
        Permission::create(['name' => 'ciudades.edit']); // Edit Ciudades
        Permission::create(['name' => 'ciudades.show']); // Show Ciudades

        // Politicas Permissions

        Permission::create(['name' => 'politicas.index']); // Index Politicas
        Permission::create(['name' => 'politicas.create']); // Create Politicas
        Permission::create(['name' => 'politicas.edit']); // Edit Politicas
        Permission::create(['name' => 'politicas.show']); // Show Politicas

        // Personalizaciones Permissions

        Permission::create(['name' => 'personalizaciones.index']); // Index Personalizaciones
        Permission::create(['name' => 'personalizaciones.create']); // Create Personalizaciones
        Permission::create(['name' => 'personalizaciones.edit']); // Edit Personalizaciones
        Permission::create(['name' => 'personalizaciones.show']); // Show Personalizaciones

        // Estados Permissions

        Permission::create(['name' => 'estados.index']); // Index Estados
        Permission::create(['name' => 'estados.create']); // Create Estados
        Permission::create(['name' => 'estados.edit']); // Edit Estados
        Permission::create(['name' => 'estados.show']); // Show Estados

        // Categorias de Eventos Especiales Permissions

        Permission::create(['name' => 'categoriasEventosEspeciales.index']); // Index Categorias de Eventos Especiales Permissions
        Permission::create(['name' => 'categoriasEventosEspeciales.create']); // Create Categorias de Eventos Especiales Permissions
        Permission::create(['name' => 'categoriasEventosEspeciales.edit']); // Edit Categorias de Eventos Especiales Permissions
        Permission::create(['name' => 'categoriasEventosEspeciales.show']); // Show Categorias de Eventos Especiales Permissions

        // Eventos Especiales Permissions

        Permission::create(['name' => 'eventosEspeciales.index']); // Index Eventos Especiales Permissions
        Permission::create(['name' => 'eventosEspeciales.create']); // Create Eventos Especiales Permissions
        Permission::create(['name' => 'eventosEspeciales.edit']); // Edit Eventos Especiales Permissions
        Permission::create(['name' => 'eventosEspeciales.show']); // Show Eventos Especiales Permissions

        // Solicitudes Permissions

        Permission::create(['name' => 'solicitudes.index']); // Index Solicitudes Permissions
        Permission::create(['name' => 'solicitudes.create']); // Create Solicitudes Permissions
        Permission::create(['name' => 'solicitudes.edit']); // Edit Solicitudes Permissions
        Permission::create(['name' => 'solicitudes.show']); // Show Solicitudes Permissions

        // Tipos de Solicitudes Permissions

        Permission::create(['name' => 'tiposSolicitudes.index']); // Index Tipos de Solicitudes Permissions
        Permission::create(['name' => 'tiposSolicitudes.create']); // Create Tipos de Solicitudes Permissions
        Permission::create(['name' => 'tiposSolicitudes.edit']); // Edit Tipos de Solicitudes Permissions
        Permission::create(['name' => 'tiposSolicitudes.show']); // Show Tipos de Solicitudes Permissions

        //Servicios Por Tipos de Solicitudes

        Permission::create(['name' => 'serviciosPorTiposSolicitudes.index']); // Index Servicios Por Tipos de Solicitudes Permissions
        Permission::create(['name' => 'serviciosPorTiposSolicitudes.create']); // Create Servicios Por Tipos de Solicitudes Permissions
        Permission::create(['name' => 'serviciosPorTiposSolicitudes.edit']); // Edit Servicios Por Tipos de Solicitudes Permissions
        Permission::create(['name' => 'serviciosPorTiposSolicitudes.show']); // Show Servicios Por Tipos de Solicitudes Permissions


       // Estados de las Solicitudes

        Permission::create(['name' => 'estadosSolicitudes.index']); // Index Estados de las Solicitudes Permissions
        Permission::create(['name' => 'estadosSolicitudes.create']); // Create Estados de las Solicitudes Permissions
        Permission::create(['name' => 'estadosSolicitudes.edit']); // Edit Estados de las Solicitudes Permissions
        Permission::create(['name' => 'estadosSolicitudes.show']); // Show Estados de las Solicitudes Permissions

       // Cambiar estado de solicitud
        Permission::create(['name' => 'estadosSolicitudes.change']);


        //Datos Unicos Por Solicitud

        Permission::create(['name' => 'datosUnicosSolicitud.index']); // Index Datos Unicos Por Solicitud Permissions
        Permission::create(['name' => 'datosUnicosSolicitud.create']); // Create Datos Unicos Por Solicitud Permissions
        Permission::create(['name' => 'datosUnicosSolicitud.edit']); // Edit Datos Unicos Por Solicitud Permissions
        Permission::create(['name' => 'datosUnicosSolicitud.show']); // Show Datos Unicos Por Solicitud Permissions

        // Poder hacer modificacion en solicitudes
        Permission::create(['name' => 'solicitudes.modification']);
        
        // Dashboard
        Permission::create(['name' => 'dashboard.index']);
        Permission::create(['name' => 'dashboard.solicitudes']);
        Permission::create(['name' => 'dashboard.charts']);
        
        // Reportes
        Permission::create(['name' => 'reportes.index']);
    }
}