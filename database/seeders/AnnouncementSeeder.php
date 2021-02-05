<?php

namespace Database\Seeders;

use App\Domains\Announcement\Models\Announcement;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class AnnouncementSeeder.
 */
class AnnouncementSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncate('announcements');

        if (app()->environment(['local', 'testing'])) {
            /*
             * Note: There is currently no UI for this feature. If you are going to build a UI, and if you are going to use a WYSIWYG editor for the message (because it supports HTML on the frontend) that you properly sanitize the input before it is stored in the database.
             */
            Announcement::create([
                'area' => null,
                'type' => 'info',
                'message' => 'This is a <strong>Global</strong> announcement that will show on both the frontend and backend. <em>See <strong>AnnouncementSeeder</strong> for more usage examples.</em>',
                'enabled' => true,
            ]);

//            Announcement::create([
//                'area' => 'frontend',
//                'type' => 'warning',
//                'message' => 'This is a <strong>Frontend</strong> announcement that will not show on the backend.',
//                'enabled' => true,
//            ]);
//
//            Announcement::create([
//                'area' => 'backend',
//                'type' => 'danger',
//                'message' => 'This is a <strong>Backend</strong> announcement that will not show on the frontend.',
//                'enabled' => true,
//            ]);
//
//            Announcement::create([
//                'area' => null,
//                'type' => 'danger',
//                'message' => 'This announcement will be shown because the current time falls between the start and end dates.' ,
//                'enabled' => true,
//                'starts_at' => now()->subWeek(),
//                'ends_at' => now()->addWeek()
//            ]);
//
//            Announcement::create([
//                'area' => null,
//                'type' => 'danger',
//                'message' => 'This announcement will not be shown because it is disabled.' ,
//                'enabled' => false,
//            ]);
//
//            Announcement::create([
//                'area' => null,
//                'type' => 'danger',
//                'message' => 'This announcement will not be shown because the end date has passed.' ,
//                'enabled' => true,
//                'ends_at' => now()->subDay()
//            ]);
//
//            Announcement::create([
//                'area' => null,
//                'type' => 'danger',
//                'message' => 'This announcement will not be shown because the current time does not fall between the start and end dates.' ,
//                'enabled' => true,
//                'starts_at' => now()->subWeek(),
//                'ends_at' => now()->subDay()
//            ]);
        }

        $this->enableForeignKeys();
    }
}
