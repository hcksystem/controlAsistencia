<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\User;
use App\ProfitCenter;
use App\Country;
use App\Account;
use App\Port;
use App\AccountMetaType;
use App\AccountMeta;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountCategorySedder::class);
        $this->call(CountrySeeder::class);
        $this->call(PortySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(LogunitsSeeder::class);
        $this->call(IncotermsSeeder::class);
        $this->call(Currier::class);
        $this->call(DocStatus::class);
        $this->call(ShelfLife::class);
        $this->call(CargoUnitSedder::class);
        $this->call(OperationStatusSedder::class);
        $this->call(OrderPtmTermtSedder::class);

        factory(ProfitCenter::class,5)->create();
        factory(Permission::class,4)->create(); 
        factory(Role::class,4)->create();
        factory(User::class,100)->create();
        factory(Account::class,20)->create();
        factory(AccountMetaType::class,20)->create();
        factory(AccountMeta::class,20)->create();
        
        $this->call(UserSeeder::class);
	}
}
