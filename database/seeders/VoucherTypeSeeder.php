<?php

namespace Database\Seeders;

use App\Models\VoucherType;
use Illuminate\Database\Seeder;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $voucherTypes = [
            // [
            //     "short" => "BRV",
            //     "Bank Receipt Voucher",
            //     "credit_level" => "level4",
            //     "debit_level" => "level4",
            //     "debit_id" => 1,
            //     "credit_id" => 3,
            //     "description" => "BRV account is used to transfer amount from recievable to Bank(Invoice Payment Case)",
            // ],
            // [
            //     "short" => "CRV",
            //     "Cash Receipt Voucher",
            //     "credit_level" => "level4",
            //     "debit_level" => "level4",
            //     "debit_id" => 2,
            //     "credit_id" => 3,
            //     "description" => "CRV account is used to transfer amount from recievable to Cash in hand(Invoice Payment Case)",
            // ],
            [
                "short" => "APV",
                "name" => "Account Payable Voucher",
                "credit_level" => "level4",
                "debit_level" => "level4",
                "debit_id" => 4,
                "credit_id" => 5,
                "description" => "APV account is used to mark liabilty and expense(Add Stock Case)",
            ],


        ];
        foreach ($voucherTypes as $key => $voucherType) {
            VoucherType::create($voucherType);
        }
    }
}
