<?php

namespace Database\Seeders;

use App\Models\AccountLevel1;
use App\Models\AccountLevel2;
use App\Models\AccountLevel3;
use App\Models\AccountLevel4;
use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account1s = [
            [
                "id" => 1,
                "name" => "Asset",
                "status" => 'active',
                "start_code" => "000",
                "end_code" => "099",
                "uid" => "876128e5f3db112af141255d4502107a",
            ],
            [
                "id" => 2,
                "name" => "Liability",
                "status" => 'active',
                "start_code" => "100",
                "end_code" => "199",
                "uid" => "876128e5f3db112af141255d4502107b"
            ],
            [
                "id" => 3,
                "name" => "Equity",
                "status" => 'active',
                "start_code" => "200",
                "end_code" => "299",
                "uid" => "876128e5f3db112af141255d4502107c"
            ],
            [
                "id" => 4,
                "name" => "Revenue",
                "status" => 'active',
                "start_code" => "300",
                "end_code" => "399",
                "uid" => "876128e5f3db112af141255d4502107d"
            ],
            [
                "id" => 5,
                "name" => "Expense",
                "status" => 'active',
                "start_code" => "400",
                "end_code" => "499",
                "uid" => "876128e5f3db112af141255d4502107e"
            ],
        ];

        $account2s = [
            [
                "id" => 1,
                "name" => "Current Asset",
                "parent_id" => 1,
                "status" => "active",
                "code" => "001-001",
            ],
            [
                "id" => 2,
                "name" => "Non Current Asset",
                "parent_id" => 1,
                "status" => "active",
                "code" => "001-002",
            ],
            [
                "id" => 3,
                "name" => "Current Liability",
                "parent_id" => 2,
                "status" => "active",
                "code" => "101-001",
            ],
            [
                "id" => 4,
                "name" => "Non Current Liability",
                "parent_id" => 2,
                "status" => "active",
                "code" => "101-002",
            ],
            [
                "id" => 5,
                "name" => "Product Sales",
                "parent_id" => 4,
                "status" => "active",
                "code" => "301-001",
            ],
            [
                "id" => 6,
                "name" => "Administrator Expenses",
                "parent_id" => 5,
                "status" => "active",
                "code" => "401-001",
            ]
        ];

        $account3s = [
            [
                "id" => 1,
                "name" => "Bank",
                "status" => "active",
                "parent_id" => 1,
                "code" => "001-001-001",
            ],
            [
                "id" => 2,
                "name" => "Cash in Hand",
                "status" => "active",
                "parent_id" => 1,
                "code" => "001-001-002",
            ],
            [
                "id" => 3,
                "name" => "Recievables",
                "status" => "active",
                "parent_id" => 2,
                "code" => "001-002-001",
            ],
            [
                "id" => 4,
                "name" => "Payables",
                "status" => "active",
                "parent_id" => 3,
                "code" => "101-001-001",
            ],
            [
                "id" => 5,
                "name" => "Web Chanel",
                "status" => "active",
                "parent_id" => 5,
                "code" => "301-001-001",
            ],
            [
                "id" => 6,
                "name" => "Store",
                "status" => "active",
                "parent_id" => 5,
                "code" => "301-001-002",
            ],
            [
                "id" => 7,
                "name" => "Purchase Expense",
                "status" => "active",
                "parent_id" => 6,
                "code" => "401-001-001",
            ],
        ];

        $account4s = [
            [
                "id" => 1,
                "name" => "Online Gateway",
                "balance" => 0,
                "status" => "active",
                "parent_id" => 1,
                "code" => "001-001-001-001",
            ],
            [
                "id" => 2,
                "name" => "Office Account",
                "balance" => 0,
                "status" => "active",
                "parent_id" => 2,
                "code" => "001-001-001-001",
            ],
            [
                "id" => 3,
                "name" => "Payment Recievable",
                "balance" => 0,
                "status" => "active",
                "parent_id" => 3,
                "code" => "001-002-001-002",
            ],
            [
                "id" => 4,
                "name" => "Others",
                "balance" => 0,
                "status" => "active",
                "parent_id" => 5,
                "code" => "301-001-001-001",
            ],
            [
                "id" => 5,
                "name" => "Sales Person",
                "balance" => 0,
                "status" => "active",
                "parent_id" => 6,
                "code" => "301-001-002-001",
            ],
            [
                "id" => 6,
                "name" => "Vendor",
                "balance" => 0,
                "status" => "active",
                "parent_id" => 7,
                "code" => "401-001-001-001",
            ],
        ];
        foreach ($account1s as $account1) {
            AccountLevel1::create($account1);
        }
        foreach ($account2s as $account2) {
            AccountLevel2::create($account2);
        }
        foreach ($account3s as $account3) {
            AccountLevel3::create($account3);
        }
        foreach ($account4s as $account4) {
            AccountLevel4::create($account4);
        }
    }
}
