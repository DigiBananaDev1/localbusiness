<?php

namespace App\Console\Commands;

use App\Models\Vendor;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateVendorSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:vendor-slug';

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
        //This is used to generate unique slug for each vendor
        $vendors = Vendor::all();
       
        foreach ($vendors as $vendor) {
            if (empty($vendor->slug)) { // Check if slug is empty
                $slug = Str::slug($vendor->business_name); // Generate slug
                $count = Vendor::where('slug', 'LIKE', "{$slug}%")->count();
                // Ensure slug is unique
                $vendor->slug = $count > 0 ? "{$slug}-{$count}" : $slug;
                $vendor->save();
            }
            $this->info("Generating slug for Category ID: {$vendor->id}, Name: {$vendor->business_name}, Slug : {$vendor->slug}");
        }
        $this->info('Slugs generated successfully for all vendors!');
    }
}
