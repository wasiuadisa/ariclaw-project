<?php

namespace App\Logic;

use Illuminate\Support\Facades\DB;

// Import model classes
use App\Models\Testimonial;

class TestimonialLogic
{
   /**
     * Get testimonial contents
     */
    public function testimonialContentFew($number_of__required_rows)
    {
        // Get few testimonial contents
        $contents = Testimonial::orderBy('id', 'asc')->take($number_of__required_rows)->get();

        return $contents;
    }

   /**
     * Get testimonial contents
     */
    public function testimonialContents()
    {
        // Get all testimonial contents
         $contents = Testimonial::all();

        return $contents;
    }

   /**
     * Get a testimonial contents by id
     */
    public function testimonialContentById($id)
    {
        // Get testimonial contents
         $contents = Testimonial::findOrFail($id);

        return $contents;
    }

   /**
     * Delete a testimonial data using given id
     */
    public function deleteTestimonialDataById($id)
    {
        // Get testimonial contents
        Testimonial::where('id', '=', $id)->delete();
    }
}
