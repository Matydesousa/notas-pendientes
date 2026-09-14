<?php

namespace Tests\Feature;

use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_note_can_be_created_updated_and_deleted(): void
    {
        $this->post(route('note.store'), [
            'title' => 'Idea inicial',
            'description' => 'Descripción de la nota',
        ])->assertRedirect(route('note.index'));

        $note = Note::firstOrFail();

        $this->get(route('note.show', $note))
            ->assertOk()
            ->assertSeeText('Idea inicial');

        $this->put(route('note.update', $note), [
            'title' => 'Idea actualizada',
            'description' => 'Descripción actualizada',
        ])->assertRedirect(route('note.index'));

        $this->assertDatabaseHas('notes', ['title' => 'Idea actualizada']);

        $this->delete(route('note.destroy', $note))
            ->assertRedirect(route('note.index'));

        $this->assertDatabaseMissing('notes', ['id' => $note->id]);
    }

    public function test_note_fields_are_required_and_have_a_minimum_length(): void
    {
        $this->post(route('note.store'), [
            'title' => 'No',
            'description' => '',
        ])->assertInvalid(['title', 'description']);

        $this->assertDatabaseCount('notes', 0);
    }
}
