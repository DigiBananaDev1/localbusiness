<?php

namespace App\Console\Commands;

use App\Models\Faq;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateFaqSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:faq-slug';

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
        //This is used to generate unique slug for each faq
        $faqs = Faq::all();
       
        foreach ($faqs as $faq) {
            if (empty($faq->slug)) { // Check if slug is empty
                $slug = Str::slug($faq->question); // Generate slug
                $count = Faq::where('slug', 'LIKE', "{$slug}%")->count();
                // Ensure slug is unique
                $faq->slug = $count > 0 ? "{$slug}-{$count}" : $slug;
                $faq->save();
            }
            $this->info("Generating slug for Category ID: {$faq->id}, Name: {$faq->question}, Slug : {$faq->slug}");
        }
        $this->info('Slugs generated successfully for all faqs!');
    }
}
