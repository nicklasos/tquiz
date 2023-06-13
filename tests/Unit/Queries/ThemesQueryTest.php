<?php

declare(strict_types=1);

namespace Tests\Unit\Queries;

use App\Models\Theme;
use App\Queries\ThemesQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ThemesQueryTest extends TestCase
{
    use DatabaseTransactions;

    public function testByName()
    {
        $theme1 = Theme::factory()->create([
            'name' => 'test_theme_1',
        ]);

        $theme2 = Theme::factory()->create([
            'name' => 'test_theme_2',
        ]);

        $theme3 = Theme::factory()->create([
            'name' => 'test_theme_3',
        ]);

        $query = app(ThemesQuery::class);

        $ids = $query->byNames(
            'test_theme_1',
            'test_theme_2',
        );

        $this->assertEquals($theme1->id, $ids[0]);
        $this->assertEquals($theme2->id, $ids[1]);

        $this->assertCount(2, $ids);
    }
}
