<?php

/**
 * Testing the admin pages
 *
 */
class AdminTest extends TestCase
{
    public function testWorkshopPages()
    {
        $this->visit('/admin/workshop_admin')
            ->see('Login');

        $user = factory('App\Models\User')->create();

        $this->actingAs($user)
            ->visit('/admin/workshop_admin')
            ->see('Workshop List');

    }

}