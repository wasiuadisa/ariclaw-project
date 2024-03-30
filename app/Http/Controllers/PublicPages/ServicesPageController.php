<?php

namespace App\Http\Controllers\PublicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import model classes
use App\Models\ServicesPage;

// Import logic classes
use App\Logic\ServiceLogic;
use App\Logic\TestimonialLogic;

class ServicesPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Instantiate services logic class
        $serviceClass = new ServiceLogic();
        // Call method for all services page data from services logic
        $service_page_contents = $serviceClass->servicePageContent();
        // Call method for all services data from services logic
        $service_contents = $serviceClass->serviceContents();

        // Instantiate Testimonial logic class
        $testimonialClass = new TestimonialLogic();
        // Call method for all testimonial data from Testimonial logic
        $testimonial_contents = $testimonialClass->testimonialContents();

        // Set page title
        $pageTitle = ' Services ';

        // Pass all necessary data to view
        return view('public.services', [
            'pageTitle' => $pageTitle,
            'service_page_contents' => $service_page_contents,
            'service_contents' => $service_contents,
            'testimonial_contents' => $testimonial_contents,
        ]);
    }
}
