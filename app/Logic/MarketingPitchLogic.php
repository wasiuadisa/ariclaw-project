<?php

namespace App\Logic;

use Illuminate\Support\Facades\DB;

// Import model classes
use App\Models\MarketingPitch;

class MarketingPitchLogic
{
   /**
     * Get marketing pitch contents
     */
    public function marketingPitchContentFew($number_of_required_rows)
    {
        // Get few marketing pitch contents
        $contents = MarketingPitch::orderBy('id', 'asc')->take($number_of_required_rows)->get();

        return $contents;
    }

   /**
     * Get marketing pitch contents
     */
    public function marketingPitchContents()
    {
        // Get all marketing pitch contents
         $contents = MarketingPitch::all();

        return $contents;
    }

   /**
     * Get a marketing pitch contents by id
     */
    public function marketingPitchContentById($id)
    {
        // Get marketing pitch contents
         $contents = MarketingPitch::findOrFail($id);

        return $contents;
    }

   /**
     * Delete a marketing pitch data using given id
     */
    public function deleteMarketingPitchDataById($id)
    {
        // Get MarketingPitch contents
        MarketingPitch::where('id', '=', $id)->delete();
    }
}
