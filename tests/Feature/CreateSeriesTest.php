<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
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

        Storage::fake(config('filesystems.default'));

        $this->post('/admin/series', [
            'title' => 'Vue is not best for frontened',
            'description' => 'the best magic site ever',
            'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertRedirect();

        Storage::disk(config('filesystems.default'))->assertExists('series/' . Str::slug('Vue is not best for frontened') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('Vue is not best for frontened')
        ]);
    }
}
