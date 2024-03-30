<?php

namespace App\Http\Controllers\AdminPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Imported model class
use App\Models\FaqPage;

// Import logic class
use App\Logic\FaqLogic;

// Import request class
use App\Http\Requests\FaqPageFormRequest;

class AdminFaqPageController extends Controller
{
    /**
     * Show the form for creating or editing FAQ page resource.
     */
    public function faqPageEditForm()
    {
        $faqClass = new FaqLogic();
        $faq_contents = $faqClass->faqPageContent();
        $pageTitle = ' FAQ page ';

        return view('admin.edit-faq-page', [
            'contents' => $faq_contents,
            'pageTitle' => $pageTitle,
        ]);
    }

    /**
     * Store or update faq page form resource in storage.
     */
    public function storeFaqPageFormEdits(FaqPageFormRequest $request)
    {
        // Instantiate FAQ logic class
        $faqClass = new FaqLogic();

        // First of all, confirm the row intended for editing exists in FAQ page table.
        $rowExists = $faqClass->faqPageContentById(intval($request->input('postID')));

        // In case the row doesn't exist delete all session data for this user and send him to the login page to log in, again.
        if($rowExists == 0)
        {
            // Delete all session data
            $request->session()->flush();

            // Set a message to flash at the User
            session()->flash('membershipInfo', 'Stop trying to hack this site!');

            // Redirect the User to the Login page
            return redirect()->route('login');
        }

        // Process variables for updating
        $dataForDatabaseTable = array(
            //Sanitize inputs where necessary before saving to database 
            //////////////////////////////////////
            /// Clean up variables for database //
            //////////////////////////////////////
            'title' => filter_var($request->input('title'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'text' => filter_var($request->input('text'), FILTER_SANITIZE_SPECIAL_CHARS,           FILTER_FLAG_ENCODE_LOW),
            'updated_at' => now()
        );

        FaqPage::where('id', $request->input('postID'))
            ->update($dataForDatabaseTable);

        /*******************************************************/
        session()->flash('info', 'Good job! The FAQ page text has been updated, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.faq-page');
    }
}
