<?php

namespace App\Http\Controllers\AdminPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Imported model classes
use App\Models\SiteSetting;
use App\Models\IndexPage;
use App\Models\AboutPage;
use App\Models\TeamPage;
use App\Models\Team;
use App\Models\FaqPage;
use App\Models\Faq;
use App\Models\ServicePage;
use App\Models\Service;
use App\Models\Marketing;
use App\Models\Testimonial;
use App\Models\ContactusPage;
use App\Models\Contactus;

// Useless imported model class
use App\Models\BlogImage;

// Imported logic classes
use App\Logic\ImageLogic;

// Imported request classes
use App\Http\Requests\ImageFormRequest;

class AdminVariousImageController extends Controller
{
    /**
     * Show the form for editing an image
     */
    public function imageFormForVariousImages($pageName, $imageName, $postID)
    {
        $imageClass = new ImageLogic();
        $image_contents = $imageClass->getImageFromTable($pageName);

        // Check that the given postID matches the database ID of resource to change
        if($image_contents->id != $postID)
        {
            // Delete all session data
            $request->session()->flush();

            // Set a message to flash at the User
            session()->flash('membershipInfo', 'Stop trying to hack this site! The image or photo doesn\'t exist');

            // Redirect the User to the Login page
            return redirect()->route('login');            
        }

        // Set the page title
        $pageTitle = ' Image editing';

        return view('admin.various-images-edit-form', [
            'pageTitle' => $pageTitle,
            'image_contents' => $image_contents,
            'pageName' => $pageName,
            'imageName' => $imageName,
            'postID' => $postID,
        ]);
    }

    /**
     * Store or update form resource in storage.
     */
    public function storeImagesFormForVariousImages(ImageFormRequest $request, $pageName, $imageName)
    {
        // Set form inputs as variable.
        $photo     = $request->file('image_file');
        $previousPageRoute = $request->input('previous_page_url');

        // Check that the required variables exist
        if($pageName == '' || $imageName == '' || $photo == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('membershipInfo', 'Nice try! The link you clicked is not valid. Stop trying to hack this website.');

            //Redirect to previous URL
            return redirect()->route('dashboard');
        }

        /* If the photo editing form is called, the photo should exist. Just to be sure, check that the photo exists. Get photo's filename from the database */
        $imageClass = new ImageLogic();
        $image_db_contents = $imageClass->getImageFromTable($pageName);

        // Check that such post exists
        if($image_db_contents == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('membershipInfo', 'Nice try! The photo you want to replace ddoesn\'t exist. Stop trying to hack this website.');

            //Redirect to previous URL
            return redirect()->route('dashboard');
        }

        // Check that the image exists. Otherwise redirect to the Dashboard page with a warning.
        if($image_db_contents->$imageName == '')
        {
            // Set a message to flash at the User
            session()->flash('membershipInfo', 'Stop trying to hack this site! Follow the links as provided by the application.');

            // Redirect the User to the Login page
            return redirect()->route('dashboard');
        }

        /*************************************************************/
        /* First create a NEW filename for this uploaded photo */
        // Assign a new variable name to the photo
        $image = $photo; //This will have filename and its extension

        // Hash the file name for the uploaded photo.
        $hashedName = hash('ripemd160', time()).'.'.$image->getClientOriginalExtension();

        // Set the destination path based on the given parameter

        // $resourceName may either be a table or a page name
        switch ($pageName)
        {
            case 'aboutPage':
                // Get image data
                $destinationPath = public_path('storage/public_template/img/');
                break;
            case 'homePage':
                // Get image data
                $destinationPath = public_path('storage/public_template/img/');
                break;
            case 'setting':
                // Get image data
                $destinationPath = public_path('storage/public_template/img/');
                break;
            case 'teamPage':
                // Get image data
                $destinationPath = public_path('storage/public_template/img/');
            case 'teamMember':
                // Get image data
                $destinationPath = public_path('storage/admin_template/img/team/');
                break;
            case 'testimonial':
                // Get image data
                $destinationPath = public_path('storage/public_template/img/');
                break;
            default:
                $destinationPath = public_path('storage/public_template/img/');
                break;
        }

        /***********************************************************/
        /* Delete the existing photo file from the directory */
        /* Set the path to the files directory and include the file name */
        $pathToImageFile = $destinationPath . $image_db_contents->$imageName;

        /* Delete the file using Laravel's file handling method for deleting files */
        unlink($pathToImageFile);

        /***********************************************************/
        // Move the NEWLY uploaded and renamed photo to destination folder
        $image->move($destinationPath, $hashedName);

        $imageNameStrToLower = strtolower($imageName);

        /***********************************************************/
        // Set variables for updating image
        $dataForDatabaseTable = array(
            "$imageNameStrToLower" => $hashedName,
            'updated_at' => now()
        );

        // $resourceName may either be a table or a page name
        switch ($pageName)
        {
            case 'aboutPage':
                // Save new photo file name in database
                AboutPage::where('id', $request->input('postID'))
                    ->update($dataForDatabaseTable);

                // Redirect page
                $previousPageRoute = route('admin.about');
                break;

            case 'homePage':
                // Save new photo file name in database
                IndexPage::where('id', $request->input('postID'))
                    ->update($dataForDatabaseTable);

                // Redirect page
                $previousPageRoute = route('admin.index');
                break;

            case 'setting':
                // Save new photo file name in database
                SiteSetting::where('id', $request->input('postID'))
                    ->update($dataForDatabaseTable);

                // Redirect page
                $previousPageRoute = route('admin.site-settings');
                break;

            case ('teamPage' || 'team'):
                // Save new photo file name in database
                TeamPage::where('id', $request->input('postID'))
                    ->update($dataForDatabaseTable);

                // Redirect page
                $previousPageRoute = route('admin.team-page');
                break;

            case 'teamMember':
                // Save new photo file name in database
                Team::where('id', $request->input('postID'))
                    ->update($dataForDatabaseTable);

                // Redirect page
                $previousPageRoute = route('admin.team_edit', $postID);
                break;

            case 'testimonial':
                // Save new photo file name in database
                Testimonial::where('id', $request->input('postID'))
                    ->update($dataForDatabaseTable);

                // Redirect page
                $previousPageRoute = route('admin.testimony_edit', $request->input('postID'));
                break;

            default:
                // Save new photo file name in database
                BlogImage::where('id', $request->input('postID'))
                    ->update($dataForDatabaseTable);
                break;
        }

        // Create flash message
        session()->flash('info', 'Great!. The photo has been changed, successfully.');

        //Redirect to a route's name
//        return redirect()->route("admin.$previousPageRoute");
//        return redirect()->url($previousPageRoute);
        return redirect()->url($request->input('previous_page_url'));
    }
}
