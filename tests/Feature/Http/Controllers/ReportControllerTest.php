<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ReportController
 */
class ReportControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReportController::class,
            'store',
            \App\Http\Requests\ReportStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $reason = $this->faker->word;
        $user = User::factory()->create();
        $reportable_type = $this->faker->word;
        $reportable_id = $this->faker->numberBetween(-10000, 10000);
        $comment = $this->faker->word;
        $is_resolved = $this->faker->boolean;

        $response = $this->post(route('report.store'), [
            'reason' => $reason,
            'user_id' => $user->id,
            'reportable_type' => $reportable_type,
            'reportable_id' => $reportable_id,
            'comment' => $comment,
            'is_resolved' => $is_resolved,
        ]);

        $reports = Post::query()
            ->where('reason', $reason)
            ->where('user_id', $user->id)
            ->where('reportable_type', $reportable_type)
            ->where('reportable_id', $reportable_id)
            ->where('comment', $comment)
            ->where('is_resolved', $is_resolved)
            ->get();
        $this->assertCount(1, $reports);
        $report = $reports->first();

        $response->assertRedirect(route('back'));
    }
}
