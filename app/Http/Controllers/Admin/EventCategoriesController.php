<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
class EventCategoriesController extends Controller
{
    //Function for add category
    public function add_category() {
        return view('admin.event-categories.add-category');
    }

    //Function for submit category
    public function submit_category(Request $request) {
        //Craete category
        $is_create_category = categories::create([
            'name' => $request->name,
            'date' => $request->date,
            'status' => 'Active',
        ]);
        //Check if category is exist or not
        if($is_create_category) {
            return back()->with('success', 'Category created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }

    //Function for all categories list
    public function all_categories(){
        //Get categories detail
        $all_categories = categories::orderby('ID', 'DESC')->get();
        return view('admin.event-categories.all-categories', compact ('all_categories'));
    }

    //Function for edit category
    public function edit_category($id){
        //Get category detail
        $category_detail = categories::find($id);
        return view('admin.event-categories.edit-category', compact('category_detail'));
    }

    //Function for update category
    public function update_category(Request $request,$id){
        //Update category
        $is_update_category = categories::where('id',$id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'status' => $request->status,
        ]);
        //Check if category is updated or not
        if($is_update_category) {
            return back()->with('success', 'Category updated successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for delete category
    public function delete_category(Request $request) {
        //Get ajax request category id
        $category_id = $request->category_id;
        //Delete category
        $is_delete_category = categories::where('id', $category_id)->delete();
        //Check if category is deleted or not
        if($is_delete_category) {
            return back()->with('success', 'Category deleted successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }
}
