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
        $announcement = Announcement::factory()->enabled()->frontend()->noDates()->create();

        $response = $this->get('login');

        $response->assertSee($announcement->message);

        $this->loginAsAdmin();

        $response = $this->get('admin/dashboard');

        $response->assertDontSee($announcement->message);
    }

    /** @test */
    public function announcement_is_only_visible_on_backend()
    {
        $announcement = Announcement::factory()->enabled()->backend()->noDates()->create();

        $response = $this->get('login');

        $response->assertDontSee($announcement->message);

        $this->loginAsAdmin();

        $response = $this->get('admin/dashboard');

        $response->assertSee($announcement->message);
    }

    /** @test */
    public function announcement_is_visible_globally()
    {
        $announcement = Announcement::factory()->enabled()->global()->noDates()->create();

        $response = $this->get('login');

        $response->assertSee($announcement->message);

        $this->loginAsAdmin();

        $response = $this->get('admin/dashboard');

        $response->assertSee($announcement->message);
    }

    /** @test */
    public function a_disabled_announcement_does_not_show()
    {
        $announcement = Announcement::factory()->disabled()->global()->noDates()->create();

        $response = $this->get('login');

        $response->assertDontSee($announcement->message);
    }

    /** @test */
    public function an_announcement_inside_of_date_range_shows()
    {
        $announcement = Announcement::factory()->enabled()->global()->insideDateRange()->create();

        $response = $this->get('login');

        $response->assertSee($announcement->message);
    }

    /** @test */
    public function an_announcement_outside_of_date_range_doesnt_show()
    {
        $announcement = Announcement::factory()->enabled()->global()->outsideDateRange()->create();

        $response = $this->get('login');

        $response->assertDontSee($announcement->message);
    }
}
