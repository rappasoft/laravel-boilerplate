<?php

use Tests\BrowserKitTestCase;

/**
 * Class AccessHelperTest.
 */
class AccessHelperTest extends BrowserKitTestCase
{
    public function testAccessUser()
    {
        $this->actingAs($this->user);
        $this->assertEquals(auth()->user(), access()->user());
    }

    public function testAccessGuest()
    {
        $this->assertEquals(auth()->guest(), access()->guest());
    }

    public function testAccessLogout()
    {
        $this->actingAs($this->user);
        $this->assertFalse(access()->guest());
        access()->logout();
        $this->assertTrue(access()->guest());
    }

    public function testAccessGetsUserId()
    {
        $this->actingAs($this->user);
        $this->assertEquals(auth()->id(), access()->id());
    }

    public function testAccessLogsUserInById()
    {
        access()->loginUsingId(3);
        $this->assertEquals(auth()->user(), access()->user());
    }

    public function testAccessHasRole()
    {
        $this->actingAs($this->executive);
        $this->assertTrue(access()->hasRole('Executive'));
        $this->assertFalse(access()->hasRole('Administrator'));
        $this->assertTrue(access()->hasRole(2));
        $this->assertFalse(access()->hasRole(1));
    }

    public function testAdminHasAllRoles()
    {
        $this->actingAs($this->admin);
        $this->assertTrue(access()->hasRole('Administrator'));
        $this->assertTrue(access()->hasRole('Non-Existing Role'));
        $this->assertTrue(access()->hasRole(1));
        $this->assertTrue(access()->hasRole(123));
    }

    public function testAccessHasRoles()
    {
        $this->actingAs($this->executive);
        $this->assertTrue(access()->hasRoles(['Executive', 'User']));
        $this->assertTrue(access()->hasRoles([2, 3]));
    }

    public function testAccessHasRolesNeedsAll()
    {
        $this->actingAs($this->executive);
        $this->assertFalse(access()->hasRoles(['Executive', 'User'], true));
        $this->assertFalse(access()->hasRoles([2, 3], true));
    }

    public function testAccessAllow()
    {
        $this->actingAs($this->executive);
        $this->assertTrue(access()->allow('view-backend'));
        $this->assertTrue(access()->allow(1));
    }

    public function testAdminHasAllAccess()
    {
        $this->actingAs($this->admin);
        $this->assertTrue(access()->allow('view-backend'));
        $this->assertTrue(access()->allow('view-something-that-doesnt-exist'));
        $this->assertTrue(access()->allow(1));
        $this->assertTrue(access()->allow(123));
    }

    public function testAccessAllowMultiple()
    {
        $this->actingAs($this->executive);
        $this->assertTrue(access()->allowMultiple(['view-backend']));
        $this->assertTrue(access()->allowMultiple([1]));
    }

    public function testAccessAllowMultipleNeedsAll()
    {
        $this->actingAs($this->executive);
        $this->assertTrue(access()->allowMultiple(['view-backend'], true));
        $this->assertTrue(access()->allowMultiple([1], true));
    }

    public function testAccessHasPermission()
    {
        $this->actingAs($this->executive);
        $this->assertTrue(access()->hasPermission('view-backend'));
        $this->assertTrue(access()->hasPermission(1));
    }

    public function testAccessHasPermissions()
    {
        $this->actingAs($this->executive);
        $this->assertTrue(access()->hasPermissions(['view-backend']));
        $this->assertTrue(access()->hasPermissions([1]));
    }

    public function testAccessHasPermissionsNeedsAll()
    {
        $this->actingAs($this->executive);
        $this->assertTrue(access()->hasPermissions(['view-backend'], true));
        $this->assertTrue(access()->hasPermissions([1], true));
    }
}
