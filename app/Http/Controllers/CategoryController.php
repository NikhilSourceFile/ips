<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }


    public function getCategories(Request $request){
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
         $totalRecords = Category::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Category::select('count(*) as allcount')->where('category', 'like', '%' .$searchValue . '%')->count();
         // Fetch records
         $records = Category::select( "categories.*")
         ->orderBy($columnName,$columnSortOrder)
         ->where('categories.category', 'like', '%' .$searchValue . '%')
         ->skip($start)
         ->take($rowperpage)
         ->get();
         $data_arr = array();
         foreach($records as $record){
             $id = $record->id;
             $category = $record->category;
             ($record->status == 1) ? $status = "<span class='badge bg-success'>ACTIVE</span>" : $status = "<span class='badge bg-warning'>DEACTIVE</span>";
             $edit = '<a href="category-edit-'.$id.'" class="btn btn-primary waves-effect waves-light" role="button"><span class="fas fa-edit"></a>';
             $delete = '<button class="btn btn-danger waves-effect waves-light deletecategory" type="button" data-id="'.$id.'"><span class="fas fa-trash-alt"></span></button>';
             $data_arr[] = array(
                 "id" => $id,
                 "category" => $category,
                 "status" => $status,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|unique:categories',
            'status' => 'required',
        ]);

      
        $create = Category::create($validated);
        if($create)return response()->json(['success' => 'Category Added Successfully!','category'=>$create]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
