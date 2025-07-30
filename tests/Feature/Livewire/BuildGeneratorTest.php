<?php

namespace Tests\Feature\Livewire;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Livewire\BuildGenerator;
use App\Models\User;
use App\Models\Hero;
use Livewire\Livewire;

class BuildGeneratorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_it_renders_the_build_generator_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get(route('generator'))->assertSeeLivewire('build-generator');
    }

    public function test_it_can_generate_a_build()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(BuildGenerator::class)
            ->call('generateBuild');

        $this->assertDatabaseCount('builds', 1);
        $build = \App\Models\Build::first();
        $this->assertNotNull($build->hero);
        $this->assertNotNull($build->spell);
        $this->assertCount(6, $build->items);
    }
}
