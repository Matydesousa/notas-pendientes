<?php

namespace Tests\Feature;

use App\Models\Pending;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PendingManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_pending_item_can_be_created_updated_and_deleted(): void
    {
        $this->post(route('pending.store'), [
            'title' => 'Preparar documentación',
            'description' => 'Completar el README del proyecto',
        ])->assertRedirect(route('pending.index'));

        $pending = Pending::firstOrFail();

        $this->get(route('pending.show', $pending))
            ->assertOk()
            ->assertSeeText('Preparar documentación');

        $this->put(route('pending.update', $pending), [
            'title' => 'Revisar documentación',
            'description' => 'Comprobar las instrucciones del proyecto',
        ])->assertRedirect(route('pending.index'));

        $this->assertDatabaseHas('pendings', ['title' => 'Revisar documentación']);

        $this->delete(route('pending.destroy', $pending))
            ->assertRedirect(route('pending.index'));

        $this->assertDatabaseMissing('pendings', ['id' => $pending->id]);
    }

    public function test_pending_fields_are_validated(): void
    {
        $this->post(route('pending.store'), [
            'title' => 'No',
            'description' => '',
        ])->assertInvalid(['title', 'description']);

        $this->assertDatabaseCount('pendings', 0);
    }

    public function test_a_pending_item_can_be_toggled_and_filtered_by_status(): void
    {
        $pending = Pending::create([
            'title' => 'Publicar proyecto',
            'description' => 'Crear el repositorio público',
        ]);

        $this->get(route('pending.pending'))
            ->assertOk()
            ->assertSeeText('Publicar proyecto');

        $this->patch(route('pending.toggle', $pending))
            ->assertRedirect();

        $this->assertTrue($pending->fresh()->completed);

        $this->get(route('pending.completed'))
            ->assertOk()
            ->assertSeeText('Publicar proyecto');

        $this->get(route('pending.pending'))
            ->assertOk()
            ->assertDontSeeText('Publicar proyecto');
    }
}
