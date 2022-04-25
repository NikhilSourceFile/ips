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
             $copy = '<a href="/get-documents/'.$document.'" target="_blank" class="btn btn-primary waves-effect waves-light" role="button">url</a>' ;
            $edit = '<a href="category-edit-'.$id.'" class="btn btn-primary waves-effect waves-light" role="button"><span class="fas fa-edit"></a>';
            $delete = '<button class="btn btn-danger waves-effect waves-light deletecategory" type="button" data-id="'.$id.'"><span class="fas fa-trash-alt"></span></button>';
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
        return response()->download($path);
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
            'document_pdf' => 'required|mimes:pdf|max:4000',
            'file_name'=> 'required|unique:documents',
        ]);
       
      $uploadedFile = $request->file('document_pdf');
      $filename = trim($request->file_name). '.pdf';
      $uploadedFile->move(public_path('assets/admin/uploads/pdf'), $filename);
      $validated['document']=$filename;
      $create = Document::create($validated);
      if($create)return response()->json(['success' => 'File Added Successfully!','category'=>$create]);
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
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
