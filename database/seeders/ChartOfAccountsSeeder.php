<?php

namespace Database\Seeders;

use App\Enums\AccountType;
use App\Models\AccountingChart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChartOfAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('accounting_charts')->delete();
        
        DB::table('accounting_charts')->insert([
            // Assets (1000 - 1999)
            array('id' => 1, 'code' => '1000', 'name' => 'Cash', 'type' => 'asset'),
            array('id' => 2, 'code' => '1010', 'name' => 'Petty Cash', 'type' => 'asset'),
            array('id' => 3, 'code' => '1020', 'name' => 'Bank Account', 'type' => 'asset'),
            array('id' => 4, 'code' => '1030', 'name' => 'Accounts Receivable', 'type' => 'asset'),
            array('id' => 5, 'code' => '1040', 'name' => 'Inventory', 'type' => 'asset'),

            // Liabilities (2000 - 2999)
            array('id' => 6, 'code' => '2000', 'name' => 'Accounts Payable', 'type' => 'liability'),
            array('id' => 7, 'code' => '2010', 'name' => 'Salaries Payable', 'type' => 'liability'),
            array('id' => 8, 'code' => '2020', 'name' => 'Taxes Payable', 'type' => 'liability'),
            array('id' => 9, 'code' => '2030', 'name' => 'Loans Payable', 'type' => 'liability'),

            // Equity (3000 - 3999)
            array('id' => 10, 'code' => '3000', 'name' => 'Retained Earnings', 'type' => 'equity'),
            array('id' => 11, 'code' => '3010', 'name' => 'Common Stock', 'type' => 'equity'),

            // Revenue (4000 - 4999)
            array('id' => 12, 'code' => '4000', 'name' => 'Sales Revenue', 'type' => 'revenue'),
            array('id' => 13, 'code' => '4010', 'name' => 'Service Revenue', 'type' => 'revenue'),
            array('id' => 14, 'code' => '4020', 'name' => 'Other Revenue', 'type' => 'revenue'),

            // Expenses (5000 - 5999)
            array('id' => 15, 'code' => '5000', 'name' => 'Operating Expenses', 'type' => 'expense'),
            array('id' => 16, 'code' => '5010', 'name' => 'Salaries Expense', 'type' => 'expense'),
            array('id' => 17, 'code' => '5020', 'name' => 'Rent Expense', 'type' => 'expense'),
            array('id' => 18, 'code' => '5030', 'name' => 'Utilities Expense', 'type' => 'expense'),
            array('id' => 19, 'code' => '5040', 'name' => 'Depreciation Expense', 'type' => 'expense'),
            array('id' => 20, 'code' => '5050', 'name' => 'Interest Expense', 'type' => 'expense')
        ]);
    }
    }

    

