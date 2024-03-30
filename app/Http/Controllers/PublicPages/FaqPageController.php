<?php

namespace App\Http\Controllers\PublicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import logic classes
use App\Logic\IndexLogic;
use App\Logic\FaqLogic;
use App\Logic\TestimonialLogic;

// Import request classes
use App\Http\Requests\FaqFormRequest;

class FaqPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Instantiate Index logic class
        $indexClass = new IndexLogic();
        // Call method for Index page data from About Us logic
        $index_contents = $indexClass->indexPageContent();

        // Instantiate faq logic class
        $faqClass = new FaqLogic();
        // Call method for all faq page data from Faq logic
        $faq_page_contents = $faqClass->faqPageContent();
        // Call method for all faq data from Faq logic
        $faq_contents = $faqClass->faqContents();

        // Instantiate faq logic class
        $faqClass = new FaqLogic();
        // Call method for all faq data from faq logic
        $faq_contents = $faqClass->faqContents();

        // Instantiate testimonial logic class
        $testimonialClass = new TestimonialLogic();
        // Call method for all testimonial data from faq logic
        $testimonial_contents = $testimonialClass->testimonialContents();

        // Set page title
        $pageTitle = ' Frequently Asked Questions ';

        // Pass all necessary data to view
        return view('public.faq', [
            'index_contents' => $index_contents,
            'faq_page_contents' => $faq_page_contents,
            'faq_contents' => $faq_contents,
            'testimonial_contents' => $testimonial_contents,
            'pageTitle' => $pageTitle,
        ]);
    }
}
