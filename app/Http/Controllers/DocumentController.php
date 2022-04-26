<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c=Category::select('id','category')->get();
        return view('admin.document.index',['categories'=>$c]);
    }

    public function getDocuments(Request $request){
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
        // Total records
        $totalRecords = Document::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Document::select('count(*) as allcount')->where('document', 'like', '%' .$searchValue . '%')->count();
        // Fetch records
        $records = Document::join('categories','documents.category_id','categories.id')->select( "documents.*","category")
        ->orderBy($columnName,$columnSortOrder)
        ->where('documents.document', 'like', '%' .$searchValue . '%')
        ->skip($start)
        ->take($rowperpage)
        ->get();
        $data_arr = array();
        foreach($records as $record){
            $id = $record->id;
            $category = $record->category;
            $document = $record->document;
             $copy = '<button data-href="/get-documents/'.$document.'" class="btn btn-primary waves-effect waves-light copyLink">Copy</button>' ;
            $edit = '<button  class="btn btn-primary waves-effect waves-light editdocument" data-id="'.$id.'"><span class="fas fa-edit"></button>';
            $delete = '<button class="btn btn-danger waves-effect waves-light deleteDocument" data-id="'.$id.'"><span class="fas fa-trash-alt"></span></button>';
            $data_arr[] = array(
                "id" => $id,
                "category"=>$category,
                "document" => $document,
                "copy" => $copy,
                "action_edit" => $edit,
                "action_delete" => $delete
            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
        echo json_encode($response);
        exit;
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

    public function getPdf($file){
        $path=public_path('assets/admin/uploads/pdf/'.$file);
        return response()->file($path);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'document_pdf' => 'required|mimes:pdf,jpeg,png,jpg,gif,svg,doc,docx,webp|max:10000',
            'file_name'=> 'required|unique:documents',
        ]);
       
      $uploadedFile = $request->file('document_pdf');
      
      $extension = $uploadedFile->clientExtension();
      $filename = trim($request->file_name).'.'.$extension;
      $uploadedFile->move(public_path('assets/admin/uploads/pdf'), $filename);
      $validated['document']=$filename;
      $create = Document::create($validated);
      if($create){   return response()->json(['success' => 'Document Added Successfully!']);
    }else{
        return response()->json(['success' => 'fail']);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $document= Document::join('categories','documents.category_id','categories.id')->select('documents.*','category')->where('documents.id',$request->id)->first();
    $categories=Category::where('id','!=',$document->category_id)->select('id','category')->get();
    return response()->json(['document'=>$document,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'document_pdf' => 'nullable|mimes:pdf,jpeg,png,jpg,gif,svg,doc,docx,webp|max:10000',
            'file_name'=> 'required|unique:documents,file_name,'.$request->id,
        ]);
       
      $uploadedFile = $request->file('document_pdf');
      if($uploadedFile){
        $extension = $uploadedFile->clientExtension();
        $filename = trim($request->file_name).'.'.$extension;
        $uploadedFile->move(public_path('assets/admin/uploads/pdf'), $filename);
        $validated['document']=$filename;
      }
     else{
        $validated['document']=$request->old_file;
     }
      
      $create = Document::find($request->id)->update($validated);
      if($create){   return response()->json(['success' => 'Document Updated Successfully!']);
    }else{
        return response()->json(['success' => 'fail']);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if(Document::find($id)->delete()){
            return response()->json(['success' => 'Document Deleted Successfully!']);
        }else{
            return response()->json(['success' => 'fail']);
        }
    }
}
