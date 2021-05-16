<?php
namespace App\Controllers;

class Migrate extends \CodeIgniter\Controller
{
    public function index()
    {
        $migrate = \Config\Services::migrations();

        try
        {
          if($migrate->latest())
          {
            echo "Successfully migrated";
          }
        }
        catch (\Exception $e)
        {
          die("error in migrations");
        }
    }

    public function movedown($regressBatchLevel)
    {
        $migrate = \Config\Services::migrations();
        try
        {
          if($migrate->regress($regressBatchLevel))
          {
            echo "Successfully migrated down ".$version;
          }
        }
        catch (\Exception $e)
        {
          die("error in migrations");
        }
    }

    public function seeder()
    {
        $seeder = \Config\Database::seeder();
        // $seeder->call('AcademicProgramsSeeder');
        // $seeder->call('AreasSeeder');
        // $seeder->call('DepartmentsSeeder');
        // $seeder->call('DocumentTypeSeeder');
        // $seeder->call('ModuleSeeder');
        // $seeder->call('ParameterSectionsSeeder');
        // $seeder->call('RolesSeeder');
        // $seeder->call('UsersSeeder');
        // $seeder->call('PermissionSeeder');
        // $seeder->call('PermissionSystemSettingsSeeder');
        // $seeder->call('PermissionDocumentsSeeder');
    }
}
