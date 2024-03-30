<?php

namespace App\Http\Controllers\PublicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import model classes
use App\Models\IndexPage;

// Imported classes
use App\Logic\IndexLogic;
use App\Logic\AboutUsLogic;
use App\Logic\TeamLogic;
use App\Logic\TestimonialLogic;
use App\Logic\MarketingPitchLogic;

class IndexPageController extends Controller
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

        // Instantiate About Us logic class
        $aboutUsClass = new AboutUsLogic();
        // Call method for About Us page data from About Us logic
        $about_us_contents = $aboutUsClass->aboutUsPageContent();

        // Instantiate Team logic class
        $teamClass = new TeamLogic();
        // Call method for all team page data from Team logic
        $team_page_contents = $teamClass->teamPageContent();
        // Call method for all Team data from Team logic
        $team_contents = $teamClass->teamContentFew(3);

        // Instantiate Testimonial logic class
        $testimonialClass = new TestimonialLogic();
        // Call method for all testimonial data from Testimonial logic
        $testimonial_contents = $testimonialClass->testimonialContents();

        // Instantiate marketing pitch logic class
        $marketingPitchClass = new MarketingPitchLogic();
        // Call method for all marketing pitch data from marketing pitch logic
        $marketingPitch_contents = $marketingPitchClass->marketingPitchContents();

        // Set page title
        $pageTitle = ' Home page ';

        // Set page title
        return view('public.index', [
            'index_contents' => $index_contents,
            'about_us_contents' => $about_us_contents,
            'pageTitle' => $pageTitle,
            'team_page_contents' => $team_page_contents,
            'teams' => $team_contents,
            'testimonials' => $testimonial_contents,
            'marketingPitch' => $marketingPitch_contents,
        ]);
    }
}
