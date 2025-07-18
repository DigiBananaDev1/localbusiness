<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateServicesSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:service-slug';

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
        //This is used to generate unique slug for each services
        $services = Service::all();
       
        foreach ($services as $service) {
            if (empty($service->slug)) { // Check if slug is empty
                $slug = Str::slug($service->name); // Generate slug
                $count = Service::where('slug', 'LIKE', "{$slug}%")->count();
                // Ensure slug is unique
                $service->slug = $count > 0 ? "{$slug}-{$count}" : $slug;
                $service->save();
            }
            $this->info("Generating slug for Category ID: {$service->id}, Name: {$service->name}, Slug : {$service->slug}");
        }
        $this->info('Slugs generated successfully for all services!');
    }
}
