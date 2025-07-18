<?php

namespace App\Console\Commands;

use App\Models\Query;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateQuerySlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:query-slug';

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
        //This is used to generate unique slug for each query
        $queries = Query::all();
       
        foreach ($queries as $query) {
            if (empty($query->slug)) { // Check if slug is empty
                $slug = Str::slug($query->user_name); // Generate slug
                $count = Query::where('slug', 'LIKE', "{$slug}%")->count();
                // Ensure slug is unique
                $query->slug = $count > 0 ? "{$slug}-{$count}" : $slug;
                $query->save();
            }
            $this->info("Generating slug for Category ID: {$query->id}, Name: {$query->name}, Slug : {$query->slug}");
        }
        $this->info('Slugs generated successfully for all queries!');
    }
}
