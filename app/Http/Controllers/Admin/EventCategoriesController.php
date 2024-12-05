<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
class EventCategoriesController extends Controller {

//show categories page
public function show_categories() {
    return view('admin.event-categories.add-categories');
}
//add/insert categories
public function add_categories(Request $request) {
     $data = categories::create([
             'name' => $request->name,
             ]);
    if($data) {
      return redirect('/add-categories')->with('status','Event Categories Add Successfully');
    }
}
//all categories
public function all_categories()
{
    $data = categories::get();
        return view('admin.event-categories.all-categories', compact ('data'));

}
//edit categories
public function edit_categories($id) {
    $data = categories::find($id);
    return view('admin.event-categories.edit-categories', compact('data'));
}
//update categories
public function update_categories(Request $request,$id) {
    $update = categories::where('id',$id)->update([
    'name' => $request->name,
    ]);
if($update) {
    return redirect('/all-categories')->with('status','Categories Updated Successfully');
}
}
//delete categories
public function delete_categories($id) {
    $data = categories::find($id)->delete();
if($data) {
   return redirect('/all-categories')->with('status','Categories Deleted Successfully');
}
}
}
