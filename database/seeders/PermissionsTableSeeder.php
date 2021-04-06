<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'status_create',
            ],
            [
                'id'    => 24,
                'title' => 'status_edit',
            ],
            [
                'id'    => 25,
                'title' => 'status_show',
            ],
            [
                'id'    => 26,
                'title' => 'status_delete',
            ],
            [
                'id'    => 27,
                'title' => 'status_access',
            ],
            [
                'id'    => 28,
                'title' => 'contract_create',
            ],
            [
                'id'    => 29,
                'title' => 'contract_edit',
            ],
            [
                'id'    => 30,
                'title' => 'contract_show',
            ],
            [
                'id'    => 31,
                'title' => 'contract_delete',
            ],
            [
                'id'    => 32,
                'title' => 'contract_access',
            ],
            [
                'id'    => 33,
                'title' => 'nda_create',
            ],
            [
                'id'    => 34,
                'title' => 'nda_edit',
            ],
            [
                'id'    => 35,
                'title' => 'nda_show',
            ],
            [
                'id'    => 36,
                'title' => 'nda_delete',
            ],
            [
                'id'    => 37,
                'title' => 'nda_access',
            ],
            [
                'id'    => 38,
                'title' => 'comment_create',
            ],
            [
                'id'    => 39,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 40,
                'title' => 'comment_show',
            ],
            [
                'id'    => 41,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 42,
                'title' => 'comment_access',
            ],
            [
                'id'    => 43,
                'title' => 'license_create',
            ],
            [
                'id'    => 44,
                'title' => 'license_edit',
            ],
            [
                'id'    => 45,
                'title' => 'license_show',
            ],
            [
                'id'    => 46,
                'title' => 'license_delete',
            ],
            [
                'id'    => 47,
                'title' => 'license_access',
            ],
            [
                'id'    => 48,
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => 49,
                'title' => 'currency_create',
            ],
            [
                'id'    => 50,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 51,
                'title' => 'currency_show',
            ],
            [
                'id'    => 52,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 53,
                'title' => 'currency_access',
            ],
            [
                'id'    => 54,
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 55,
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 56,
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 57,
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 58,
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 59,
                'title' => 'income_source_create',
            ],
            [
                'id'    => 60,
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 61,
                'title' => 'income_source_show',
            ],
            [
                'id'    => 62,
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 63,
                'title' => 'income_source_access',
            ],
            [
                'id'    => 64,
                'title' => 'client_status_create',
            ],
            [
                'id'    => 65,
                'title' => 'client_status_edit',
            ],
            [
                'id'    => 66,
                'title' => 'client_status_show',
            ],
            [
                'id'    => 67,
                'title' => 'client_status_delete',
            ],
            [
                'id'    => 68,
                'title' => 'client_status_access',
            ],
            [
                'id'    => 69,
                'title' => 'project_status_create',
            ],
            [
                'id'    => 70,
                'title' => 'project_status_edit',
            ],
            [
                'id'    => 71,
                'title' => 'project_status_show',
            ],
            [
                'id'    => 72,
                'title' => 'project_status_delete',
            ],
            [
                'id'    => 73,
                'title' => 'project_status_access',
            ],
            [
                'id'    => 74,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 75,
                'title' => 'client_create',
            ],
            [
                'id'    => 76,
                'title' => 'client_edit',
            ],
            [
                'id'    => 77,
                'title' => 'client_show',
            ],
            [
                'id'    => 78,
                'title' => 'client_delete',
            ],
            [
                'id'    => 79,
                'title' => 'client_access',
            ],
            [
                'id'    => 80,
                'title' => 'project_create',
            ],
            [
                'id'    => 81,
                'title' => 'project_edit',
            ],
            [
                'id'    => 82,
                'title' => 'project_show',
            ],
            [
                'id'    => 83,
                'title' => 'project_delete',
            ],
            [
                'id'    => 84,
                'title' => 'project_access',
            ],
            [
                'id'    => 85,
                'title' => 'note_create',
            ],
            [
                'id'    => 86,
                'title' => 'note_edit',
            ],
            [
                'id'    => 87,
                'title' => 'note_show',
            ],
            [
                'id'    => 88,
                'title' => 'note_delete',
            ],
            [
                'id'    => 89,
                'title' => 'note_access',
            ],
            [
                'id'    => 90,
                'title' => 'document_create',
            ],
            [
                'id'    => 91,
                'title' => 'document_edit',
            ],
            [
                'id'    => 92,
                'title' => 'document_show',
            ],
            [
                'id'    => 93,
                'title' => 'document_delete',
            ],
            [
                'id'    => 94,
                'title' => 'document_access',
            ],
            [
                'id'    => 95,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 96,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 97,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 98,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 99,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 100,
                'title' => 'client_report_create',
            ],
            [
                'id'    => 101,
                'title' => 'client_report_edit',
            ],
            [
                'id'    => 102,
                'title' => 'client_report_show',
            ],
            [
                'id'    => 103,
                'title' => 'client_report_delete',
            ],
            [
                'id'    => 104,
                'title' => 'client_report_access',
            ],
            [
                'id'    => 105,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 106,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 107,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 108,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 109,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 110,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
