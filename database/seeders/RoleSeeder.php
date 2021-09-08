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
      $role1 =  Role::create(['name'=>'Admin']);
      $role2 =  Role::create(['name'=>'Medico']);
      $role3 =  Role::create(['name'=>'Paciente']);
      
      Permission::create(['name'=>'home'])->syncRoles([$role1, $role2, $role3]);
      Permission::create(['name'=>'admin.eps.index'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.eps.create'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.eps.edit'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.eps.destroy'])->syncRoles([$role1]);

      Permission::create(['name'=>'admin.medicos.index'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.medicos.create'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.medicos.edit'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.medicos.destroy'])->syncRoles([$role1]);
      
      Permission::create(['name'=>'admin.users.index'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.users.create'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.users.edit'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.users.destroy'])->syncRoles([$role1]);

      Permission::create(['name'=>'admin.especialidades.index'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.especialidades.create'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.especialidades.edit'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.especialidades.destroy'])->syncRoles([$role1]);

      Permission::create(['name'=>'admin.citas.index'])->syncRoles([$role1, $role2, $role3]);
      Permission::create(['name'=>'admin.citas.create'])->syncRoles([$role3]);
      Permission::create(['name'=>'admin.citas.edit'])->syncRoles([$role1]);
      Permission::create(['name'=>'admin.citas.destroy'])->syncRoles([$role1,$role2,$role3]);

      Permission::create(['name'=>'admin.pacientes.index'])->syncRoles([$role1, $role2]);
      Permission::create(['name'=>'admin.pacientes.create'])->syncRoles([$role1, $role2]);
      Permission::create(['name'=>'admin.pacientes.edit'])->syncRoles([$role1, $role2]);
      Permission::create(['name'=>'admin.pacientes.destroy'])->syncRoles([$role1, $role2]);
    }
}
