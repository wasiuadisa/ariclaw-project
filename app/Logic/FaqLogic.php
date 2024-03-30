<?php

namespace App\Logic;

use Illuminate\Support\Facades\DB;

// Import model classes
use App\Models\Faq;
use App\Models\FaqPage;

class FaqLogic
{
   /**
     * Get faq page contents
     */
    public function faqPageContent()
    {
        // Get faq page contents
         $contents = FaqPage::first();

        return $contents;
    }

   /**
     * Get Faq contents
     */
    public function faqContentFew($number_of__required_rows)
    {
        // Get few faq contents
        $contents = Faq::orderBy('id', 'asc')->take($number_of__required_rows)->get();

        return $contents;
    }

   /**
     * Get Faq contents
     */
    public function faqContents()
    {
        // Get all Faq contents
         $contents = Faq::all();

        return $contents;
    }

   /**
     * Get faq page contents by id
     */
    public function faqPageContentById($id)
    {
        // Get faq contents
         $contents = Faq::where('id', $id)->count();

        return $contents;
    }

   /**
     * Get a faq contents by id
     */
    public function faqContentById($id)
    {
        // Get faq contents
         $contents = Faq::findOrFail($id);

        return $contents;
    }

   /**
     * Delete a faq data using given id
     */
    public function deleteFaqDataById($id)
    {
        // Get faq contents
//        return FaqPage::where('id', '=', $id)->delete();
        Faq::where('id', '=', $id)->delete();
    }
}