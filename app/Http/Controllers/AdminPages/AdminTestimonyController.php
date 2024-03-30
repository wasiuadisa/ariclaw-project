<?php

namespace App\Http\Controllers\AdminPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import models
use App\Models\Testimonial;

// Import logic classes
use App\Logic\TestimonialLogic;
use App\Logic\ImageLogic;

// Import request classes
use App\Http\Requests\TestimonialFormRequest;
use App\Http\Requests\ImageFormRequest;

class AdminTestimonyController extends Controller
{
    /**
     * Show the form for creating new testimony.
     */
    public function newTestimony()
    {
        $pageTitle = "New testimonial";
        $pageTag = ", new-testimonial";

        return view('admin.new-testimonial', [
            'pageTitle' => $pageTitle,
        ]);
    }

    /**
     * Store or post new testimony form resource to database.
     */
    public function newTestimonyFormProcessing(TestimonialFormRequest $request)
    {
        // Instantiate and sanitize input class model
        $newTestimony                = new Testimonial;
 
        // Sanitize inputs
        $newTestimony->fullname        = htmlspecialchars($request->input('fullname'), ENT_QUOTES);
        $newTestimony->job_title       = htmlspecialchars($request->input('position'), ENT_SUBSTITUTE);
        $newTestimony->company         = htmlspecialchars($request->input('business'), ENT_SUBSTITUTE);
        $newTestimony->testimony       = htmlspecialchars($request->input('statement'), ENT_SUBSTITUTE);
        $newTestimony->witness         = htmlspecialchars($request->input(''), ENT_SUBSTITUTE);
        $newTestimony->image_filename  = 'default-image.png';
        $newTestimony->created_at      = now();
        $newTestimony->updated_at      = now();
        $newTestimony->save();

        session()->flash('info', 'Good Job! The new testimony has been created, successfully. Now, upload a photo for the saved profile.');

        //Redirect to a route's name
        return redirect()->route('admin.new-testimony-photo', [ $newTestimony->id, ]);
    }

    /**
     * Show the form for creating a new testimony image.
     *
     * @return \Illuminate\Http\Response
     */
    public function newTestimonialImage($testimonialID)
    {
        // Fetch form for new testimony image
        $testimonialClass = new TestimonialLogic();
        $testimonial_contents = $testimonialClass->testimonialContentById($testimonialID);
        $pageTitle = 'New photo for ' . htmlspecialchars_decode($testimonial_contents->fullname);

        return view('admin.new-image', [
            'resource_contents' => $testimonial_contents,
            'pageTitle' => $pageTitle,
            'imageResource' => 'testimonial',
            'buttonTitle' => 'Upload New Testimonial Photo',
            'processingRoute' => route('admin.new-testimony-photo-processing'),
        ]);
    }

    /**
     * Store a newly created testimonial photo in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newTestimonialImageFormProcessing(ImageFormRequest $request)
    {
        // Set form inputs as variable.
        $testimonialID    = intval($request->input('postID'));
        $testimonialPhoto = $request->file('image_file');

        // Check that such post exists
        if($testimonialID == '' || $testimonialPhoto == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'Nice try! The testimonial\'s ID and its photo don\'t exist. Stop trying to hack this website.');

            //Redirect to previous URL
            return redirect()->route('admin.testimonials');
        }

         /* Get testimonial's full details */
        // Instantiate classes
        $testimonialClass = new TestimonialLogic();
        $testimonial_contents = $testimonialClass->testimonialContentById($testimonialID);

        // Check that such testimonial exists
        if($testimonial_contents == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'Nice try! The testimonial you want to upload a photo for, doesn\'t exist. Stop trying to hack this website.');

            //Redirect to previous URL
            return redirect()->route('admin.testimonials');
        }

        // Assign a new variable name to the photo
        $image = $testimonialPhoto; //This will have filename and its extension

        $hashedName = hash('ripemd160', time()).'.'.$image->getClientOriginalExtension();

        // Set the destination path
        $destinationPath = public_path('storage/public_template/img/testimonial/');

        // Move the uploaded and renamed photo to destination folder
        $image->move($destinationPath, $hashedName);

        // Set variables for updating image
        $dataForTestimonialTable = array(
            'image_filename' => $hashedName,
            'created_at' => now(),
            'updated_at' => now()
        );

        // Save new testimonial photo file name in database
        Testimonial::where('id', intval($testimonialID))
            ->update($dataForTestimonialTable);

        // Create flash message
        session()->flash('info', 'The new testimonial photo has been saved for the profile. Your new testimonial was created successfully.');

        //Redirect to a route's list of testimonials
        return redirect()->route('admin.testimonials');
    }

    /**
     * Show the list of testimonials.
     */
    public function listTestimonials()
    {
        $testimonialClass = new TestimonialLogic();
        $testimonial_contents = $testimonialClass->testimonialContents();
        $pageTitle = ' Testimonials ';

        return view('admin.testimonials', [
            'contents' => $testimonial_contents,
            'pageTitle' => $pageTitle,
        ]);
    }

    /**
     * Show the form for creating or editing Testimonial resource.
     */
    public function editTestimonialForm($id)
    {
        $testimonialClass = new TestimonialLogic();
        $testimonial_contents = $testimonialClass->testimonialContentById($id);
        $pageTitle = 'Editing ' . htmlspecialchars_decode($testimonial_contents->fullname) . '\'s testimonial info';

        return view('admin.edit-testimonial', [
            'contents' => $testimonial_contents,
            'pageTitle' => $pageTitle,
            'id' => $testimonial_contents->id
        ]);
    }

    /**
     * Store or update testimonial form resource in storage.
     */
    public function storeTestimonial(TestimonialFormRequest $request, $testimonialID)
    {
        // Check that all checks out
        if($testimonialID == '')
        {
            // Delete all session data
            $request->session()->flush();

            // Set a message to flash at the User
            session()->flash('info', 'Stop trying to hack this site!');

            // Redirect the User to the Login page
            return redirect()->route('login');
        }

        // Instantiate testimonial logic class
        $testimonialClass = new TestimonialLogic();

        // First of all, confirm the row intended for editing exists in testimonial table.
        $rowExists = $testimonialClass->testimonialContentById(intval($testimonialID));

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
        $dataForTestimonialTable = array(
            //Sanitize inputs where necessary before saving to database
            //////////////////////////////////////
            /// Clean up variables for database //
            //////////////////////////////////////
            'fullname' => filter_var($request->input('fullname'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'job_title' => filter_var($request->input('position'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'company' => filter_var($request->input('business'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'testimony' => filter_var($request->input('statement'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_LOW),
            'updated_at' => now()
        );

        Testimonial::where('id', $testimonialID)
            ->update($dataForTestimonialTable);

        /*******************************************************/
        session()->flash('info', 'Good job! '. htmlspecialchars_decode($request->input('fullname')) . '\'s data has been updated, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.testimony_edit', $testimonialID);
    }

    /**
     * Edit form for testimonial image change
     * $imageResource = e.g. 'Team'
     * $imageID = e.g. 3
     */
    public function imagesFormForMultipleTestimonials($imageResource, $imageResourceID)
    {
        // Instantiate classes
        $testimonialClass = new TestimonialLogic();
        $testimonial_contents = $testimonialClass->testimonialContentById($imageResourceID);

        // Decode HTML special characters in the title and make it user-friendly 
        $pageTitle = 'Changing ' . htmlspecialchars_decode($testimonial_contents->fullname) . '\'s photo ';

        return view('admin.image-edit-testimonial', [
            'contents' => $testimonial_contents,
            'postID' => $testimonial_contents->id,
            'pageTitle' => $pageTitle,
            'imageResource' => $imageResource,
            'imageSpecific' => $imageResourceID
        ]);
    }

    /**
     * $imageResource = e.g. 'Testimonial'
     * $imageID = e.g. 3
     */
    public function storeImagesFormForMultipleTestimonials(ImageFormRequest $request, $imageResourceID)
    {
        // Set form inputs as variable.
        $photo = $request->file('image_file');

        // Check that the URL variables exist
        if($imageResourceID == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'Nice try! The link you clicked is not valid. Stop trying to hack this website. STRIKE #1');

            //Redirect to previous URL
            return redirect()->route('admin.testimonial_edit', intval($request->input('postID')));
        }

        // Check that the form variables, visible and non-visible are not null. This check is not really necesary, but for extra security, of sorts, it's being implemented. 
        if($request->input('specific') == '' 
         || $request->input('postID') == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'Nice try! The link you clicked is not valid. Stop trying to hack this website. STRIKE #2');

            //Redirect to previous URL
            return redirect()->route('admin.testimonial_edit', intval($request->input('postID')));
        }

        // But if some variables are set at all, they must match. 
        if($request->input('specific') != $imageResourceID 
            || $request->input('postID') != $imageResourceID)
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'Nice try! The link you clicked is not valid. Stop trying to hack this website. STRIKE #3');

            //Redirect to previous URL
            return redirect()->route('admin.testimonial_edit', intval($request->input('postID')));
        }        

        /* If the photo editing form is called, the photo should exist. Just to be sure, check that the photo exists. Get photo's filename from the database */
        $imageClass = new ImageLogic();
        $images_db_contents = $imageClass->getImageFromTableBySpecificParameter('testimony', $imageResourceID);

        // Check that such post exists
        if($images_db_contents == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'Nice try! The testimonial\'s profile doesn\'t exist. Stop trying to hack this website. FINAL WARNING #1');

            //Redirect to previous URL
            return redirect()->route('admin.testimonial_edit', intval($imageResourceID));
        }

        // Check that the image exists. Otherwise redirect to the Dashboard page with a warning.
        if($images_db_contents->image_filename == '')
        {
            // Set a message to flash at the User
            session()->flash('info', 'Stop trying to hack this site! Follow the links as provided by the application. FINAL WARNING #2');

            // Redirect the User to the Login page
            return redirect()->route('admin.testimonial_edit', intval($request->input('postID')));
        }

        /*************************************************************/
        /* First create a NEW filename for this uploaded photo */
        // Assign a new variable name to the photo
        $image = $photo; //This will have filename and its extension

        // Hash the file name for the uploaded photo.
        $hashedName = hash('ripemd160', time()).'.'.$image->getClientOriginalExtension();

        // Set the destination path based on the given parameter
        $destinationPath = public_path('storage/public_template/img/testimonial/');

        /***********************************************************/
        /* Delete the existing photo file from the directory */
        /* Set the path to the files directory and include the file name */
        $pathToImageFile = $destinationPath . $images_db_contents->image_filename;

        /* Delete the file using Laravel's file handling method for deleting files */
        unlink($pathToImageFile);

        /***********************************************************/
        // Move the NEWLY uploaded and renamed photo to destination folder
        $image->move($destinationPath, $hashedName);

        /***********************************************************/
        // Set variables for updating image
        $dataForDatabaseTable = array(
            'image_filename' => $hashedName,
            'updated_at' => now()
        );

        // Save new team member's photo file name in database
        Testimonial::where('id', $request->input('postID'))
                    ->update($dataForDatabaseTable);

        // Create flash message
        session()->flash('info', 'Great!. The testimonial\'s photo has been changed, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.testimony_edit', $request->input('postID'));
    }

    /**
     * Delete Testimonial resource.
     */
    public function deleteTestimonial(Request $request, $id)
    {
        // Change the required parameter variable name.
        $postID = $id;

        // Check that required parameter, testimonial id, is provided.
        if($postID == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'No such testimonial exists.');

            //Redirect to list of team members URL
            return redirect()->route('admin.testimonials');
        }

        // Check that the testimonial exists in the database by fetching the testimonial data using the given parameter, postID or ID.
        $imageClass = new ImageLogic();
        $images_db_contents = $imageClass->getImageFromTableBySpecificParameter('testimonial',  $postID);

        // Check that the testimonial data exists.
        if($images_db_contents == '')
        {
            // Flash this message. Note, it'll appear once only.
            session()->flash('info', 'No such testimonial exists.');

            //Redirect to previous URL
            return redirect()->route('admin.testimonials');
        }

        /* Set the path to the images directory and include the image file name */
        $pathToFile = public_path('storage/public_template/img/testimonial/' . $images_db_contents->image_filename);

        /* Delete the image using PHP's file deleting method for deleting files */
        unlink($pathToFile);

        // Delete the testimonial from the database. First instantiate the logic class
        $testimonialClass = new TestimonialLogic();
        // Call the delete method of the class providing the given ID
        $testimonials_db_contents = $testimonialClass->deleteTestimonialDataById($postID);

        // Create flash message
        session()->flash('info', 'The testimonial has been removed, successfully.');

        //Redirect to a route's name
        return redirect()->route('admin.testimonials');
    }
}
