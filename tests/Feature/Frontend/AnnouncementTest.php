<?php

namespace Tests\Feature\Frontend;

use App\Domains\Announcement\Models\Announcement;
use Tests\TestCase;

/**
 * Class AnnouncementTest.
 */
class AnnouncementTest extends TestCase
{
    /** @test */
    public function announcement_is_only_visible_on_frontend()
    {
        $announcement = factory(Announcement::class)->states(['enabled', 'frontend', 'no-dates'])->create();

        $response = $this->get('login');

        $response->assertSee($announcement->message);

        $this->loginAsAdmin();

        $response = $this->get('admin/dashboard');

        $response->assertDontSee($announcement->message);
    }

    /** @test */
    public function announcement_is_only_visible_on_backend()
    {
        $announcement = factory(Announcement::class)->states(['enabled', 'backend', 'no-dates'])->create();

        $response = $this->get('login');

        $response->assertDontSee($announcement->message);

        $this->loginAsAdmin();

        $response = $this->get('admin/dashboard');

        $response->assertSee($announcement->message);
    }

    /** @test */
    public function announcement_is_visible_globally()
    {
        $announcement = factory(Announcement::class)->states(['enabled', 'global', 'no-dates'])->create();

        $response = $this->get('login');

        $response->assertSee($announcement->message);

        $this->loginAsAdmin();

        $response = $this->get('admin/dashboard');

        $response->assertSee($announcement->message);
    }

    /** @test */
    public function a_disabled_announcement_does_not_show()
    {
        $announcement = factory(Announcement::class)->states(['disabled', 'global', 'no-dates'])->create();

        $response = $this->get('login');

        $response->assertDontSee($announcement->message);
    }

    /** @test */
    public function an_announcement_inside_of_date_range_shows()
    {
        $announcement = factory(Announcement::class)->states(['enabled', 'global', 'inside-date-range'])->create();

        $response = $this->get('login');

        $response->assertSee($announcement->message);
    }

    /** @test */
    public function an_announcement_outside_of_date_range_doesnt_show()
    {
        $announcement = factory(Announcement::class)->states(['enabled', 'global', 'outside-date-range'])->create();

        $response = $this->get('login');

        $response->assertDontSee($announcement->message);
    }
}
