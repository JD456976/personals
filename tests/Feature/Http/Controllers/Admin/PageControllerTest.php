<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\PageController
 */
class PageControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $pages = Page::factory()->count(3)->create();

        $response = $this->get(route('page.index'));

        $response->assertOk();
        $response->assertViewIs('page.index');
        $response->assertViewHas('pages');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('page.create'));

        $response->assertOk();
        $response->assertViewIs('page.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\PageController::class,
            'store',
            \App\Http\Requests\Admin\PageStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $slug = $this->faker->slug;
        $content = $this->faker->paragraphs(3, true);
        $active = $this->faker->boolean;
        $main_menu = $this->faker->boolean;
        $footer_menu = $this->faker->boolean;

        $response = $this->post(route('page.store'), [
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'active' => $active,
            'main_menu' => $main_menu,
            'footer_menu' => $footer_menu,
        ]);

        $pages = Page::query()
            ->where('title', $title)
            ->where('slug', $slug)
            ->where('content', $content)
            ->where('active', $active)
            ->where('main_menu', $main_menu)
            ->where('footer_menu', $footer_menu)
            ->get();
        $this->assertCount(1, $pages);
        $page = $pages->first();

        $response->assertRedirect(route('page.index'));
        $response->assertSessionHas('page.id', $page->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $page = Page::factory()->create();

        $response = $this->get(route('page.show', $page));

        $response->assertOk();
        $response->assertViewIs('page.show');
        $response->assertViewHas('page');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $page = Page::factory()->create();

        $response = $this->get(route('page.edit', $page));

        $response->assertOk();
        $response->assertViewIs('page.edit');
        $response->assertViewHas('page');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\PageController::class,
            'update',
            \App\Http\Requests\Admin\PageUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $page = Page::factory()->create();
        $title = $this->faker->sentence(4);
        $slug = $this->faker->slug;
        $content = $this->faker->paragraphs(3, true);
        $active = $this->faker->boolean;
        $main_menu = $this->faker->boolean;
        $footer_menu = $this->faker->boolean;

        $response = $this->put(route('page.update', $page), [
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'active' => $active,
            'main_menu' => $main_menu,
            'footer_menu' => $footer_menu,
        ]);

        $page->refresh();

        $response->assertRedirect(route('page.index'));
        $response->assertSessionHas('page.id', $page->id);

        $this->assertEquals($title, $page->title);
        $this->assertEquals($slug, $page->slug);
        $this->assertEquals($content, $page->content);
        $this->assertEquals($active, $page->active);
        $this->assertEquals($main_menu, $page->main_menu);
        $this->assertEquals($footer_menu, $page->footer_menu);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $page = Page::factory()->create();

        $response = $this->delete(route('page.destroy', $page));

        $response->assertRedirect(route('page.index'));

        $this->assertDeleted($page);
    }
}
