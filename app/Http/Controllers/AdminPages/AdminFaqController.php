<?php

namespace App\Http\Controllers\AdminPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import models
use App\Models\Faq;

// Import logic classes
use App\Logic\FaqLogic;

// Import request classes
use App\Http\Requests\FaqFormRequest;

class AdminFaqController extends Controller
{
    /**
     * Show the form for creating new frequntly asked questions.
     */
    public function newFaqForm()
    {
        $pageTitle = "New Fequently Asked Question";
        $pageTag = ", new-frequntly-asked-questions";

        return view('admin.new-faq', [
            'pageTitle' => $pageTitle,
        ]);
    }

    /**
     * Store or post new FAQ form resource to database.
     */
    public function newFaqFormProcessing(FaqFormRequest $request)
    {
        // Instantiate and sanitize input class model
        $newFaq                = new Faq;
 
        // Sanitize inputs
        $newFaq->block    = 0;
        $newFaq->question = filter_var($request->input('question'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW);
        $newFaq->answer   = filter_var($request->input('answer'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),;
        $newFaq->created_at  = now();
        $newFaq->updated_at  = now();
        $newFaq->save();

        session()->flash('info', 'Good Job! The new frequently asked question has been created, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.faqs');
    }

    /**
     * Show the list of faqs.
     */
    public function listFaqs()
    {
        $faqClass = new FaqLogic();
        $faq_contents = $faqClass->faqContents();
        $pageTitle = ' Faqs ';

        return view('admin.faqs', [
            'faq_contents' => $faq_contents,
            'pageTitle' => $pageTitle,
        ]);
    }

    /**
     * Show the form for creating or editing FAQ resource.
     */
    public function editFaqForm($id)
    {
        $faqClass = new FaqLogic();
        $faq_contents = $faqClass->faqContentById($id);
        $pageTitle = 'Editing ' . ucwords(htmlspecialchars_decode($faq_contents->question)) . '\'s FAQ info';

        return view('admin.edit-faq', [
            'faq_contents' => $faq_contents,
            'pageTitle' => $pageTitle,
            'id' => $faq_contents->id
        ]);
    }

    /**
     * Store or update faq form resource in storage.
     */
    public function storeFaqForm(FaqFormRequest $request, $faqID)
    {
        // Check that all checks out
        if($faqID == '')
        {
            // Delete all session data
            $request->session()->flush();

            // Set a message to flash at the User
            session()->flash('info', 'Stop trying to hack this site!');

            // Redirect the User to the Login page
            return redirect()->route('login');
        }

        // Instantiate FAQ logic class
        $faqClass = new FaqLogic();

        // First of all, confirm the row intended for editing exists in FAQ table.
        $rowExists = $faqClass->faqContentById(intval($faqID));

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
        $dataForFaqTable = array(
            //Sanitize inputs where necessary before saving to database
            //////////////////////////////////////
            /// Clean up variables for database //
            //////////////////////////////////////
            'question' => filter_var($request->input('question'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'answer' => filter_var($request->input('answer'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'updated_at' => now()
        );

        Faq::where('id', $faqID)
            ->update($dataForFaqTable);

        /*******************************************************/
        session()->flash('info', 'Good job! '. htmlspecialchars_decode($request->input('title')) . '\'s FAQ data has been updated, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.faq_edit', $faqID);
    }

    /**
     * Delete faq icon resource.
     */
    public function deleteFaq(Request $request, $id)
    {
        // Change the required parameter variable name.
        $postID = $id;

        // Check that required parameter, faq id, is provided.
        if($postID == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'No such faq exists.');

            //Redirect to list of service URL
            return redirect()->route('admin.faqs');
        }

        // Check that the FAQ exists in the database by fetching the faq data using the given parameter, postID or ID.
        $faqClass = new FaqLogic();

        // Get the 
        $images_db_contents = $faqClass->faqContentById(intval($id));

        // Check that the service icon data exists.
        if($images_db_contents == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'No such FAQ exists.');

            //Redirect to previous URL
            return redirect()->route('admin.faqs');
        }

        // Delete the FAQ from the database. First instantiate the logic class
        $faqClass = new FaqLogic();
        // Call the delete method of the class providing the given ID
        $faqClass->deleteFaqDataById($postID);

        // Create flash message
        session()->flash('info', 'The FAQ has been removed, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.faqs');
    }
}
