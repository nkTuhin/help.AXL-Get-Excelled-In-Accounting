<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Document;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\UserRequest;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Document=Document::all();
        $Download=Document::all();
        return view('home',compact('Document','Download'));
    }

    public function DownloadFile($id){
        $Document=Document::where('id',$id)->first();

        $myFile=storage_path()."/app/public/".$Document->document;

        return response()->download($myFile);
    
    }

    public function ViewDocument($id){
        $Document=Document::where('id',$id)->first();
        return view('documentview',compact('Document'));
    }

    // public function showJournal($file) {
        //  $filepath = Storage::disk('public')->get($file);

         

        // $Document=Document::where('id',$id)->first();
        // $myFile=storage_path()."/app/public/".$Document->document;
        // $path = storage_path($filepath);
        // $contentType = mime_content_type($path);
        // return Response::make(file_get_contents($path), 200, [
        //     'Content-Type' => $contentType,
        //     'Content-Disposition' => 'inline; filename="'.$filepath.'"'
        // ]);

        // return response()->file($filepath);
        // 
        // $Document=Document::where('id',$id)->first();
            
         //    $Document=Document::all();
         //    $filepath = Storage::disk('public')->get($file);
         // if($Document){
         //          $myFile=storage_path()."/app/public/".$Document->document;
         //        if (file_exists($myFile)){

         //           $ext =File::extension($myFile);
                  
         //            if($ext=='pdf'){
         //                $content_types='application/pdf';
         //               }elseif ($ext=='doc') {
         //                 $content_types='application/msword';  
         //               }elseif ($ext=='docx') {
         //                 $content_types='application/vnd.openxmlformats-officedocument.wordprocessingml.document';  
         //               }elseif ($ext=='xls') {
         //                 $content_types='application/vnd.ms-excel';  
         //               }elseif ($ext=='xlsx') {
         //                 $content_types='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';  
         //               }elseif ($ext=='txt') {
         //                 $content_types='application/octet-stream';  
         //               }
                   
         //             return $pdf->stream();
         //            return response(file_get_contents($myFile),200)
         //                   ->header('Content-Type',$content_types);
                                                             
         //        }else{
         //         exit('Requested file does not exist on our server!');
         //        }

         //   }else{
         //     exit('Invalid Request');
         //   } 

    // }
    
    // public function showJournal($file) {

        
    //     $Document=Document::where('document',$file)->first();
    //     $myFile=storage_path()."/app/public/".$Document->document;
    //     // $pdf = PDF::loadView('myFile', $myFile);
    //     return $myFile;
    // }


    public function userrequestpage() {
        
        return view('request');
    }

    public function userRequest(Request $request) {

         $this->validate($request, [

            'paper_name' => 'required|max:10' ,
            'what_about' => 'required|max:30' 

        ]);

        $userrequest = new UserRequest();

        $userrequest->paper_name = $request->paper_name;
        $userrequest->what_about = $request->what_about;

        $save=$userrequest->save();

        if ($save) {
            $notification = array(
            'message' => 'Request successfully send!', 
            'alert-type' => 'success'
        );
            return redirect()->route('home')->with($notification);
        }   

        else{
           return redirect()->route('home')->with(['error'=>'Unable to Save.']); 
        }

    }




}
