<?php

namespace App\Http\Controllers\AdminPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import models
use App\Models\MarketingPitch;

// Import logic classes
use App\Logic\MarketingPitchLogic;

// Import request classes
use App\Http\Requests\MarketingPitchFormRequest;

class AdminMarketingPitchController extends Controller
{
    /**
     * Show the form for creating new marketing pitch.
     */
    public function newMarketingPitch()
    {
        $pageTitle = "New Marketing Pitch";
        $pageTag = ", new-marketing-pitch";

        return view('admin.new-marketing-pitch', [
            'pageTitle' => $pageTitle,
        ]);
    }

    /**
     * Store or post new marketing pitch form resource to database.
     */
    public function newMarketingPitchFormProcessing(MarketingPitchFormRequest $request)
    {
        // Instantiate and sanitize input class model
        $newMarketingPitch                = new MarketingPitch;
 
        // Sanitize inputs
        $newMarketingPitch->icon  = htmlspecialchars($request->input('icon'), ENT_QUOTES);
        $newMarketingPitch->title = htmlspecialchars($request->input('title'), ENT_SUBSTITUTE);
        $newMarketingPitch->text  = htmlspecialchars($request->input('caption'), ENT_SUBSTITUTE);
        $newMarketingPitch->created_at      = now();
        $newMarketingPitch->updated_at      = now();
        $newMarketingPitch->save();

        session()->flash('info', 'Good Job! The new marketing pitch has been created, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.marketing-pitches');
    }

    /**
     * Show the list of marketing pitches.
     */
    public function listMarketingPitches()
    {
        $marketingPitchClass = new MarketingPitchLogic();
        $marketingPitch_contents = $marketingPitchClass->marketingPitchContents();
        $pageTitle = ' Marketing Pitches ';

        return view('admin.marketing-pitches', [
            'contents' => $marketingPitch_contents,
            'pageTitle' => $pageTitle,
        ]);
    }

    /**
     * Show the form for creating or editing marketing pitch resource.
     */
    public function editMarketingPitchForm($id)
    {
        $marketingPitchClass = new MarketingPitchLogic();
        $marketingPitch_contents = $marketingPitchClass->marketingPitchContentById($id);
        $pageTitle = 'Editing ' . htmlspecialchars_decode($marketingPitch_contents->title) . '\'s marketing pitch info';

        return view('admin.edit-marketing-pitch', [
            'contents' => $marketingPitch_contents,
            'pageTitle' => $pageTitle,
            'id' => $marketingPitch_contents->id
        ]);
    }

    /**
     * Store or update marketing pitch form resource in storage.
     */
    public function storeMarketingPitch(MarketingPitchFormRequest $request, $marketingPitchID)
    {
        // Instantiate marketing pitch logic class
        $marketingPitchClass = new MarketingPitchLogic();

        // Check that all checks out
        if($marketingPitchID == '')
        {
            // Delete all session data
            $request->session()->flush();

            // Set a message to flash at the User
            session()->flash('info', 'Stop trying to hack this site!');

            // Redirect the User to the Login page
            return redirect()->route('login');
        }

        // First of all, confirm the row intended for editing exists in marketing pitch table.
        $rowExists = $marketingPitchClass->marketingPitchContentById(intval($marketingPitchID));

        // In case the row doesn't exist delete all session data for this user and send him to the login page to log in, again.
        if($rowExists = 0)
        {
            // Delete all session data
            $request->session()->flush();

            // Set a message to flash at the User
            session()->flash('info', 'Stop trying to hack this site!');

            // Redirect the User to the Login page
            return redirect()->route('login');
        }

        // Process variables for updating
        $dataForMarketingPitchTable = array(
            //Sanitize inputs where necessary before saving to database
            //////////////////////////////////////
            /// Clean up variables for database //
            //////////////////////////////////////
            'icon' => filter_var($request->input('icon'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'title' => filter_var($request->input('title'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'text' => filter_var($request->input('caption'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'updated_at' => now()
        );

        MarketingPitch::where('id', $marketingPitchID)
            ->update($dataForMarketingPitchTable);

        /*******************************************************/
        session()->flash('info', 'Good job! '. htmlspecialchars_decode($request->input('title')) . '\'s data has been updated, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.marketing-pitch_edit', $marketingPitchID);
    }

    /**
     * Delete marketing pitch resource.
     */
    public function deleteMarketingPitch(Request $request, $id)
    {
        // Change the required parameter variable name.
        $postID = $id;

        // Check that required parameter, testimonial id, is provided.
        if($postID == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'No such marketing pitch exists.');

            //Redirect to list of marketing pitches URL
            return redirect()->route('admin.marketing-pitches');
        }

        // Delete the marketing pitch from the database. First instantiate the logic class
        $marketingPitchClass = new MarketingPitchLogic();
        // Call the delete method of the class providing the given ID
        $marketingPitchClass->deleteMarketingPitchDataById($postID);

        // Create flash message
        session()->flash('info', 'The marketing pitch has been removed, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.marketing-pitches');
    }
}
