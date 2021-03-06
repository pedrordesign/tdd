<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 26/10/16
 * Time: 13:13
 */

namespace CodePress\CodeCategory\Testing;


use CodePress\CodeCategory\Models\Category;
use CodePress\CodeUser\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminCategoriesTest extends \TestCase
{

    use DatabaseTransactions;

    protected function getUser(){
        return factory(User::class)->create();
    }

    public function test_cannot_access_categories()
    {

        $this
            ->visit('/admin/categories')
            ->see('E-Mail Address');

    }

    public function test_can_visit_admin_categories_page()
    {

        $this
            ->actingAs($this->getUser())
            ->visit('/admin/categories')
            ->see('Categories');

    }

    public function test_categories_listing()
    {
        Category::create(['name' => 'Category 7', 'active' => true]);
        Category::create(['name' => 'Category 8', 'active' => true]);
        Category::create(['name' => 'Category 9', 'active' => true]);
        Category::create(['name' => 'Category 10', 'active' => true]);
        Category::create(['name' => 'Category 11', 'active' => true]);


        $this
            ->actingAs($this->getUser())
            ->visit('/admin/categories')
            ->see('Categories')
            ->see('Category 7')
            ->see('Category 8')
            ->see('Category 9')
            ->see('Category 10')
            ->see('Category 11');
    }

    public function test_click_create_new_button()
    {
        $this
            ->actingAs($this->getUser())
            ->visit('admin/categories')
            ->click('Create Category')
            ->seePageIs('/admin/categories/create')
            ->see('Create Category');
    }

    public function test_create_new_button()
    {
        $this
            ->actingAs($this->getUser())
            ->visit('admin/categories/create')
            ->type('Category Test', 'name')
            ->check('active')
            ->press('Create Category')
            ->seePageIs('admin/categories')
            ->see('Category Test')
        ;
    }

}