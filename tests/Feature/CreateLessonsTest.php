<?php

namespace Tests\Feature;

use App\Series;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateLessonsTest extends TestCase
{
    public function test_a_user_can_create_test()
    {
        $this->loginAdmin();
        $this->withoutExceptionHandling();

        $series = factory(Series::class)->create();

        $lessons = [
            "title" => "new lesson title",
            "description" => "new lesson description",
            "episode_number" => 23,
            "video_id" => 451212,
        ];

        $this->postJson("/admin/{$series->id}/lessons", $lessons)
            ->assertStatus(200)
            ->assertJson($lessons);

        $this->assertDatabaseHas('lessons', [
            'title' => $lessons['title']
        ]);
    }

    public function test_a_title_is_required_to_create_a_lesson()
    {
        $this->loginAdmin();
        $this->withoutExceptionHandling();

        $series = factory(Series::class)->create();

        $lessons = [
            "description" => "new lesson description",
            "episode_number" => 23,
            "video_id" => 451212,
        ];

        $this->post("/admin/{$series->id}/lessons", $lessons)
            ->assertSessionHasErrors('title');
    }

    public function test_a_description_is_required_to_create_a_lesson()
    {
        $this->loginAdmin();
        $this->withoutExceptionHandling();

        $series = factory(Series::class)->create();

        $lessons = [
            "title" => "new lesson title",
            "episode_number" => 23,
            "video_id" => 451212,
        ];

        $this->post("/admin/{$series->id}/lessons", $lessons)
            ->assertSessionHasErrors('description');
    }

    public function test_an_episode_number_is_required_to_create_a_lesson()
    {
        $this->loginAdmin();
        $this->withoutExceptionHandling();

        $series = factory(Series::class)->create();

        $lessons = [
            "title" => "new lesson title",
            "description" => "new lesson description",
            "video_id" => 451212,
        ];

        $this->post("/admin/{$series->id}/lessons", $lessons)
            ->assertSessionHasErrors('episode_number');
    }

    public function test_a_video_id_is_required_to_create_a_lesson()
    {
        $this->loginAdmin();
        $this->withoutExceptionHandling();

        $series = factory(Series::class)->create();

        $lessons = [
            "title" => "new lesson title",
            "description" => "new lesson description",
            "episode_number" => 23,
        ];

        $this->post("/admin/{$series->id}/lessons", $lessons)
            ->assertSessionHasErrors('video_id');
    }
}
