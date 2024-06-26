<?php

namespace App\Logic;

use App\Models\Contactuscategorys;
use App\Models\Contactus;
use App\Models\ContactusPage;
use Illuminate\Support\Facades\DB;

class ContactusLogic
{
   /**
     * Get contact us page contents
     */
    public function contactUsPageContent()
    {
        // Get contact us page contents
         $contents = ContactusPage::first();

        return $contents;
    }

   /**
     * Get contact us page contents
     */
    public function ContactUsPageContentById($id)
    {
        // Get contact us page contents
         $contents = ContactusPage::where('id', $id)->count();

        return $contents;
    }

   /**
     * Get contact us category list
     */
    public function ContactUsCategoryContents()
    {
         $contents = Contactuscategorys::all()->where('blocked', 0)->where('deleted', 0);

        return $contents;
    }
}
