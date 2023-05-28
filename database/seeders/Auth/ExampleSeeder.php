<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Example;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class ExampleTableSeeder.
 */
class ExampleSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();


        $this->truncateMultiple([
            'examples',
        ]);

        // Add examples test data
        Example::newFactory()->count(10)->create();

        $this->enableForeignKeys();
    }
}
