<?php

namespace App\Http\Controllers\PublicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import logic classes
//use App\Logic\SiteSettinglogic;
use App\Logic\IndexLogic;
use App\Logic\Teamlogic;
use App\Logic\TestimonialLogic;

class TeamPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
/*        // Instantiate site setting logic class
        $siteSettingClass = new SiteSettingLogic();
        // Call method for all site setting data from Team logic
        $site_setting_contents = $siteSettingClass->siteSettingPageContent();
*/
        // Instantiate Index logic class
        $indexClass = new IndexLogic();
        // Call method for Index page data from About Us logic
        $index_contents = $indexClass->indexPageContent();

        // Instantiate Team logic class
        $teamClass = new TeamLogic();
        // Call method for all team page data from Team logic
        $team_page_contents = $teamClass->teamPageContent();
        // Call method for all team member data from Team logic
        $team_members_contents = $teamClass->teamContents();

        // Instantiate Testimonial logic class
        $testimonialClass = new TestimonialLogic();
        // Call method for all testimonial data from Testimonial logic
        $testimonial_contents = $testimonialClass->testimonialContents();

        // Set page title
        $pageTitle = ' Attorneys ';

        // Pass all necessary data to view
        return view('public.team', [
//            'site_setting_contents' => $site_setting_contents,
            'index_contents' => $index_contents,
            'team_page_contents' => $team_page_contents,
            'team_members_contents' => $team_members_contents,
            'pageTitle' => $pageTitle,
            'testimonials' => $testimonial_contents,
        ]);
    }
}
