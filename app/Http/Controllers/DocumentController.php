<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Validator;
use App\Document;
use Auth;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('add_document');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           
            'title' => 'required' ,
            'detail' => 'required' ,
            'document' => 'required|mimes:pdf'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(['pdfcondition'=>'All file required and you must choose pdf file.']);
        }

         $documents = new Document();
         $documents->title = $request['title'];
         $documents->detail = $request['detail'];

         $document_file=$request->file('document');
         $document=$request->document->getClientOriginalName();
          $document_name=date('Ymdhis') . '-' . $document;
           if($document_file){
                 $documents->document=$document_name;  
               if($documents->save()){
                    
                    Storage::disk('public')->put($document_name,File::get($document_file) );

                    return redirect()->route('admin.dashboard')->with(['success'=>'Successfully save.']);
                 }
                 else{
                   return redirect()->route('admin.dashboard')->with(['error'=>'Unable to save.']);
                 }
             }

             else{
                return redirect()->route('admin.dashboard')->with(['error'=>'Error to save.']);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
