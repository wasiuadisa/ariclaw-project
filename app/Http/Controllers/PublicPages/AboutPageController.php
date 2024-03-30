<?php

namespace App\Http\Controllers\PublicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import logic classes
use App\Logic\SiteSettingLogic;
use App\Logic\IndexLogic;
use App\Logic\AboutUsLogic;
use App\Logic\TestimonialLogic;
use App\Logic\MarketingPitchLogic;

class AboutPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Instantiate Site settings logic class
        $siteSettingClass = new SiteSettingLogic();
        // Call method for Site settings data from Site settings logic
        $site_setting_contents = $siteSettingClass->siteSettingPageContent();

        // Instantiate Index logic class
        $indexClass = new IndexLogic();
        // Call method for Index page data from Site settings logic
        $index_contents = $indexClass->indexPageContent();

        // Instantiate About Us logic class
        $aboutUsClass = new AboutUsLogic();
        // Call method for About Us page data from About Us logic
        $about_us_contents = $aboutUsClass->aboutUsPageContent();

        // Instantiate Testimonial logic class
        $testimonialClass = new TestimonialLogic();
        // Call method for all testimonial data from Testimonial logic
        $testimonial_contents = $testimonialClass->testimonialContents();

        // Instantiate marketing pitch logic class
        $marketingPitchClass = new MarketingPitchLogic();
        // Call method for all marketing pitch data from marketing pitch logic
        $marketingPitch_contents = $marketingPitchClass->marketingPitchContents();

        // Set page title
        $pageTitle = ' About Us ';

        // Pass all necessary data to view
        return view('public.about', [
            'site_setting_contents' => $site_setting_contents,
            'index_contents' => $index_contents,
            'about_us_contents' => $about_us_contents,
            'pageTitle' => $pageTitle,
            'testimonials' => $testimonial_contents,
            'marketingPitch' => $marketingPitch_contents,
        ]);
    }
}
