<?php

namespace Tests\Feature\Backend\Role;

use Tests\TestCase;
use App\Models\System\Auth\Role;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\System\Auth\Role\RoleDeleted;

class DeleteRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_role_can_be_deleted()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);

        $this->delete("/admin/auth/role/{$role->id}");

        $this->assertDatabaseMissing(config('permission.table_names.roles'), ['id' => $role->id]);
    }

    /** @test */
    public function a_role_with_assigned_users_cant_be_deleted()
    {
        $this->loginAsAdmin();

        $role = Role::whereName(config('access.users.admin_role'))->first();
        $response = $this->delete('/admin/auth/role/'.$role->id);

        $response->assertSessionHas(['flash_danger' => __('No puede eliminar el Rol de Super Administrador.')]);
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $role = factory(Role::class)->create();
        Event::fake();
        $this->loginAsAdmin();

        $this->delete("/admin/auth/role/{$role->id}");

        Event::assertDispatched(RoleDeleted::class);
    }
}
