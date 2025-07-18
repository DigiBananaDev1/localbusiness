<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateCategorySlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:category-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //This is used to generate unique slug for each category
        $categories = Category::all();
       
        foreach ($categories as $category) {
            if (empty($category->slug)) { // Check if slug is empty
                $slug = Str::slug($category->name); // Generate slug
                $count = Category::where('slug', 'LIKE', "{$slug}%")->count();
                // Ensure slug is unique
                $category->slug = $count > 0 ? "{$slug}-{$count}" : $slug;
                $category->save();
            }
            $this->info("Generating slug for Category ID: {$category->id}, Name: {$category->name}, Slug : {$category->slug}");
        }
        $this->info('Slugs generated successfully for all categories!');
    }
}
