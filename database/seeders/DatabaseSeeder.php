<?php

namespace Database\Seeders;

use App\Models\User;
use Modules\System\Models\Menu;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\System\Database\Seeders\MenuItemsSeeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Modules\Business\Models\Currency;
use Modules\Business\Models\Tax;
use Modules\Global\Models\ReferenceSchema;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Create the admin menu
      // Create or get the admin menu
    $menu = Menu::firstOrCreate(
        ['name' => 'Admin Menu'],
        ['name' => 'Admin Menu']
    );

    // Create or get the admin role
    $role = Role::firstOrCreate(
        ['name' => 'Admin'],
        ['name' => 'Admin']
    );

    // Create or get the admin user
    $user = User::firstOrCreate(
        ['email' => 'admin@admin.com'],
        [
            'name' => 'Admin',
            'menu_id' => $menu->id,
            'password' => bcrypt('password') // Ensure password is set if not exists
        ]
    );

    // Attach the role if not already attached
    if (!$user->roles()->where('id', $role->id)->exists()) {
        $user->roles()->attach($role->id);
    }

        // Call the MenuItemsSeeder
        $this->call(MenuItemsSeeder::class);

        $currencyData = config('global.default_currency');

        $currency = Currency::firstOrCreate(
            ['code' => $currencyData['code']],   // Condition to check
            $currencyData                        // Data to insert if not found
        );

        $tax1 = Tax::updateOrCreate(
            ['name' => 'No Tax'], // Match condition
            [
                'rate' => 0,
                'status' => 'active',
                'is_default' => 0
            ]
        );

        $tax2Data = config('global.default_tax');

        $tax2 = Tax::firstOrCreate(
            ['name' => $tax2Data['name']], // condition to check existence
            $tax2Data                      // values to insert if not found
        );

        $year = date('Y');

        $schemas = [
            [
                'type' => 'sales_order',
                'prefix' => $year . 'SO',
            ],
            [
                'type' => 'purchase_order',
                'prefix' => $year . 'PO',
            ],
            [
                'type' => 'sales_invoice',
                'prefix' => $year . 'INV',
            ],
        ];

        foreach ($schemas as $schema) {
            ReferenceSchema::updateOrCreate(
                ['type' => $schema['type']], // Match by unique type
                [
                    'prefix' => $schema['prefix'],
                    'initial_value' => 1,
                    'next_value' => 1,
                    'increment' => 1,
                    'digits' => 6,
                ]
            );
        }

        /*DB::table('asset_document_types')->insert([
            [
                'name' => 'Istemara (Jamurkiya)',
            ],
            [
                'name' => 'Fahas',
            ],
            [
                'name' => 'TUV',
            ],
            [
                'name' => 'Operational Card',
            ],
            [
                'name' => 'Catalog',
            ],
            [
                'name' => 'Other Documents',
            ],
        ]);*/


        $this->importCountries();
        $this->importStates();
        // $this->importCities();

    }

    private function importCountries()
    {
        if (DB::table('countries')->count() === 0) {
            $filePath = database_path('sql/countries.sql');
            if (File::exists($filePath)) {
                $sql = File::get($filePath);
                DB::unprepared($sql);
            }
        }
    }

    private function importStates()
    {
        if (DB::table('states')->count() === 0) {
            $filePath = database_path('sql/states.sql');
            if (File::exists($filePath)) {
                $sql = File::get($filePath);
                DB::unprepared($sql);
            }
        }
    }

    private function importCities()
    {
         if (DB::table('cities')->count() === 0) {
            $filePath = database_path('sql/cities.sql');
            if (File::exists($filePath)) {
                $sql = File::get($filePath);
                DB::unprepared($sql);
            }
        }
    }
}
