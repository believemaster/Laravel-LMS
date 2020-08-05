<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class CreateSeriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_a_user_can_create_a_series()
    {
        $this->withoutExceptionHandling();
        $this->loginAdmin();

        Storage::fake(config('filesystems.default'));

        $this->post('/admin/series', [
            'title' => 'Vue is not best for frontened',
            'description' => 'the best magic site ever',
            'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertRedirect()
            ->asssertSessionHas('success', 'Series Created Successfull');

        Storage::disk(config('filesystems.default'))->assertExists('public/series/' . Str::slug('Vue is not best for frontened') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('Vue is not best for frontened')
        ]);
    }

    public function test_a_series_must_be_created_with_a_title()
    {
        $this->loginAdmin();

        $this->withoutExceptionHandling();
        $this->post('/admin/series', [
            'description' => 'the best magic site ever',
            'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertSessionHasErrors('title');
    }

    public function test_a_series_must_be_created_with_a_description()
    {
        $this->loginAdmin();

        $this->withoutExceptionHandling();
        $this->post('/admin/series', [
            'title' => 'the best magic site ever',
            'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertSessionHasErrors('description');
    }

    public function test_a_series_must_be_created_with_an_image()
    {
        $this->loginAdmin();

        $this->withoutExceptionHandling();
        $this->post('/admin/series', [
            'title' => 'the best magic site ever',
            'description' => 'the best magic site ever description',
        ])->assertSessionHasErrors('image');
    }

    public function test_a_series_must_be_created_with_an_image_which()
    {
        $this->withoutExceptionHandling();
        $this->loginAdmin();

        $this->post('/admin/series', [
            'title' => 'the best magic site ever',
            'description' => 'the best magic site ever description',
            'image' => 'STRING_INVALID_IMAGE'
        ])->assertSessionHasErrors('image');
    }

    public function test_only_administrators_can_create_series()
    {
        $this->actingAs(
            factory(User::class)->create()
        );

        $this->post('/admin/series')->assertSessionHas('error', 'You are not authorized to perform this action');
    }
}
