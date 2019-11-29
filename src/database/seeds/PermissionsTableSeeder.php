<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'student_create',
            ],
            [
                'id'    => '18',
                'title' => 'student_edit',
            ],
            [
                'id'    => '19',
                'title' => 'student_show',
            ],
            [
                'id'    => '20',
                'title' => 'student_delete',
            ],
            [
                'id'    => '21',
                'title' => 'student_access',
            ],
            [
                'id'    => '22',
                'title' => 'project_create',
            ],
            [
                'id'    => '23',
                'title' => 'project_edit',
            ],
            [
                'id'    => '24',
                'title' => 'project_show',
            ],
            [
                'id'    => '25',
                'title' => 'project_delete',
            ],
            [
                'id'    => '26',
                'title' => 'project_access',
            ],
            [
                'id'    => '27',
                'title' => 'spoc_create',
            ],
            [
                'id'    => '28',
                'title' => 'spoc_edit',
            ],
            [
                'id'    => '29',
                'title' => 'spoc_show',
            ],
            [
                'id'    => '30',
                'title' => 'spoc_delete',
            ],
            [
                'id'    => '31',
                'title' => 'spoc_access',
            ],
            [
                'id'    => '32',
                'title' => 'college_create',
            ],
            [
                'id'    => '33',
                'title' => 'college_edit',
            ],
            [
                'id'    => '34',
                'title' => 'college_show',
            ],
            [
                'id'    => '35',
                'title' => 'college_delete',
            ],
            [
                'id'    => '36',
                'title' => 'college_access',
            ],
            [
                'id'    => '37',
                'title' => 'coach_create',
            ],
            [
                'id'    => '38',
                'title' => 'coach_edit',
            ],
            [
                'id'    => '39',
                'title' => 'coach_show',
            ],
            [
                'id'    => '40',
                'title' => 'coach_delete',
            ],
            [
                'id'    => '41',
                'title' => 'coach_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
