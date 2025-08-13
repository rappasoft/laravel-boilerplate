<?php

namespace Tests\Feature;

use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimezoneTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function timezone_package_is_loaded()
    {
        $this->assertTrue(function_exists('timezone'));
        $this->assertInstanceOf(\JamesMills\LaravelTimezone\Timezone::class, timezone());
    }

    /** @test */
    public function display_date_directive_works()
    {
        $user = User::factory()->create([
            'timezone' => 'America/New_York',
            'created_at' => '2024-01-15 10:00:00'
        ]);

        $this->actingAs($user);

        $view = $this->blade('@displayDate($date)', ['date' => $user->created_at]);

        $this->assertStringContainsString('2024', $view);
        $this->assertStringNotContainsString('N/A', $view);
    }

    /** @test */
    public function display_date_handles_null_dates()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $view = $this->blade('@displayDate($date)', ['date' => null]);

        $this->assertEquals('N/A', trim($view));
    }

    /** @test */
    public function helper_functions_work()
    {
        $user = User::factory()->create([
            'timezone' => 'America/New_York'
        ]);

        $this->actingAs($user);

        // Test userTimezone function
        $this->assertEquals('America/New_York', userTimezone());

        // Test toUserTimezone function
        $date = now();
        $converted = toUserTimezone($date);
        $this->assertNotNull($converted);

        // Test formatUserDate function
        $formatted = formatUserDate($date);
        $this->assertIsString($formatted);
        $this->assertNotEquals('N/A', $formatted);
    }

    /** @test */
    public function timezone_info_provides_details()
    {
        $user = User::factory()->create([
            'timezone' => 'America/New_York'
        ]);

        $this->actingAs($user);

        $info = getUserTimezoneInfo();

        $this->assertIsArray($info);
        $this->assertArrayHasKey('name', $info);
        $this->assertArrayHasKey('offset', $info);
        $this->assertArrayHasKey('abbreviation', $info);
        $this->assertEquals('America/New_York', $info['name']);
    }

    /** @test */
    public function user_profile_page_displays_dates_correctly()
    {
        $user = User::factory()->create([
            'timezone' => 'Europe/London',
            'created_at' => '2024-01-15 10:00:00'
        ]);

        $this->actingAs($user);

        $response = $this->get(route('frontend.user.account'));

        $response->assertSuccessful();
        $response->assertSee('Account Created');
        $response->assertSee('Last Updated');
    }

    /** @test */
    public function admin_user_view_displays_dates_correctly()
    {
        $admin = User::factory()->admin()->create();
        $user = User::factory()->create([
            'timezone' => 'Asia/Tokyo',
            'created_at' => '2024-01-15 10:00:00'
        ]);

        $this->actingAs($admin);

        $response = $this->get(route('admin.auth.user.show', $user));

        $response->assertSuccessful();
        $response->assertSee('Account Created');
        $response->assertSee('Last Updated');
    }

    /** @test */
    public function timezone_conversion_works_without_user_timezone()
    {
        $user = User::factory()->create(['timezone' => null]);
        $this->actingAs($user);

        $date = now();
        $view = $this->blade('@displayDate($date)', ['date' => $date]);

        $this->assertStringContainsString(date('Y'), $view);
        $this->assertStringNotContainsString('N/A', $view);
    }

    /** @test */
    public function timezone_handles_unauthenticated_users()
    {
        $date = now();
        $view = $this->blade('@displayDate($date)', ['date' => $date]);

        $this->assertStringContainsString(date('Y'), $view);
        $this->assertStringNotContainsString('N/A', $view);
    }

    protected function blade(string $template, array $data = []): string
    {
        $blade = app('view')->getEngineResolver()->resolve('blade');

        return $blade->get($template, $data);
    }
}
