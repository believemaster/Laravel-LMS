<?php

namespace Tests\Feature;

use App\Series;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateSeriesTest extends TestCase
{
    public function test_a_user_can_update_a_series()
    {
        $this->withoutExceptionHandling();
        $this->loginAdmin();

        $series = factory(Series::class)->create();

        Storage::fake(config('filesystems.default'));

        $this->put(route('series.update', $series->slug), [
            'title' => 'the updated title',
            'description' => 'the updated description',
            'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertRedirect(route('series.index'))
            ->assertSessionHas('success', 'Series Updated Successfully');

        Storage::disk(config('filesystems.default'))->assertExists('series/' . Str::slug('the updated title') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('the updated title'),
            'image_url' => 'series/the-updated-title.png'
        ]);
    }

    public function test_an_image_is_not_required_to_update_a_series()
    {
        $this->withoutExceptionHandling();
        $this->loginAdmin();

        $series = factory(Series::class)->create();

        Storage::fake(config('filesystems.default'));

        $this->put(route('series.update', $series->slug), [
            'title' => 'the updated title',
            'description' => 'the updated description',
        ])->assertRedirect(route('series.index'))
            ->assertSessionHas('success', 'Series Updated Successfully');

        Storage::disk(config('filesystems.default'))->assertMissing('series/' . Str::slug('the updated title') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('the updated title'),
            'image_url' => $series->image_url
        ]);
    }
}
