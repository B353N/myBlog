<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();

        // Run the DatabaseSeeder...
        $this->seed();
    }
    /**
     * Test Home page is displayed
     */
    public function test_home_page_no_errors(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test Pagination
     */
    public function test_home_page_pagination(): void
    {
        $response = $this->get(route('home'));

        $response->assertSee('page-item');
    }

    /**
     * Test Recent Posts
     */
    public function test_home_page_recent_posts(): void
    {
        $response = $this->get( route('home'));

        $response->assertViewHas('recent_posts');
    }

    /**
     * Test Categories
     */
    public function test_home_page_categories(): void
    {
        $response = $this->get(route('home'));

        $response->assertViewHas('categories');
    }

    /**
     * Test Tags
     */
    public function test_home_page_tags(): void
    {
        $response = $this->get(route('home'));

        $response->assertViewHas('tags');
    }
}

