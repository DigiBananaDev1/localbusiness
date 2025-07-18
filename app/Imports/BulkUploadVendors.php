<?php

namespace App\Imports;

use App\Models\Vendor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BulkUploadVendors implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //
        foreach ($rows as $row) {
            $vendor = new Vendor();
            $vendor->email = $row['email'];
            $vendor->status = $row['status'];
            $vendor->otp_verified = '1';
            $vendor->business_name = $row['business_name'];
            $vendor->mobile = $row['mobile'];
            $vendor->whatsapp_no = $row['whatsapp_no'];
            $vendor->block_building = $row['block_building'];
            $vendor->street_colony = $row['street_colony'];
            $vendor->landmark = $row['landmark'];
            $vendor->area = $row['area'];
            $vendor->city = $row['city'];
            $vendor->state = $row['state'];
            $vendor->pin_code = $row['pincode'];
            $vendor->categories = $row['categories'];
            $vendor->type = $row['type'];
            $vendor->search_terms = $row['search_terms'];
            $vendor->description = $row['description'];
            $vendor->name = $row['name'];
            $vendor->image = $row['image_link'];
            $vendor->save();
        }
    }

    public function rules():array
    {
        return [
            '*.email' => 'required',
            '*.status' => 'required',
            '*.business_name' => 'required',
            '*.mobile' => 'required',
            '*.whatsapp_no' => 'required',
            '*.block_building' => 'required',
            '*.street_colony' => 'required|min:10',
            '*.landmark' => 'required',
            '*.area' => 'required',
            '*.city' => 'required',
            '*.state' => 'required',
            '*.pincode' => 'required',
            '*.categories' => 'required',
            '*.type' => 'required',
            '*.search_terms' => 'required',
            '*.description' => 'required',
            '*.name' => 'required',
            '*.image_link' => 'required',
        ];
    }
}
