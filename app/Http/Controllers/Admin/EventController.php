<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Categories;
use App\Models\EventImages;
use App\Models\EventCat;

class EventController extends Controller 
{
    //Function for add new event
    public function add_event() {
        //Get categories
        $get_categories_details = Categories::orderby('ID','DESC')->get();
        return view('admin.events.add-new-event', compact('get_categories_details'));
    }

    //Function for submit event
    public function submit_event(Request $request) {
        //Create event
        $is_create_event = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'Active',
        ]);
        //Check if event is craete or not
        if ($is_create_event) {
            $insertedId = $is_create_event->id;
            //Check if image is exist or not
            if ($request->hasfile('choosefile')) {
                foreach ($request->file('choosefile') as $file) {
                    $name = time() . rand(1, 50) . '.' . $file->extension();
                    $file->move('public/event', $name);
                    $files[] = $name;
                    $extension = $file->getClientOriginalExtension();
                    $image = EventImages::create([
                        'event_id' => $insertedId,
                        'event_images' => $name,
                    ]);
                }
            }
            //Check category id is exit or not
            if (count($request->category) >= 1) {
                foreach ($request->category as $category_id) {
                    //Create category $ events
                    EventCat::create([
                        'event_id' => $insertedId,
                        'cat_id' => $category_id,
                    ]);
                }
            }
           return back()->with('success', 'Event created successfully.');
        } else {
            return back()->with('unsuccess', 'Oops something went wrong!');
        }
    }

    //Function for all events list
    public function all_events(){
        //Get events detail
        $data = Event::orderby('ID', 'DESC')->with('get_event_cat_realtion')->get()->toArray();
        return view('admin.events.all-events', compact ('data')); 
    }

    //Function for edit event
    public function edit_event($id) {
        //Get categories
        $categories = Categories::get()->toArray();
        //Get event images
        $images = EventImages::where('event_id',$id)->get()->toArray();
        //Get events
        $data = Event::with('event_category_relations')->find($id);
        return view('admin.events.edit-event', compact('data','categories','images'));
    }

    //Function for update event
    public function update_event(Request $request, $id){
        //Check if image is exist or not
        if ($request->hasfile('choosefile')) {
            $update = Event::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ]);

            foreach ($request->file('choosefile') as $file) {
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move('public/event', $name);
                $files[] = $name;
                $extension = $file->getClientOriginalExtension();
                $image = EventImages::create([
                    'event_id' => $id,
                    'event_images' => $name,
                ]);
            }

            //delete even cat realtion first
           /* $event_relation_exist = EventCat::where('event_id', $id)->first();
            if($event_relation_exist){
                    EventCat::where('event_id', $id)->delete();
            }*/
            //Check id category id is exit or not
            if (count($request->category) >= 1) {
                foreach ($request->category as $category_id) {
                     //Create cate $ events
                     EventCat::updateOrCreate([
                        'event_id'   => $id,
                        'cat_id'   =>  $category_id,
                    ],[
                        'event_id' => $id,
                        'cat_id' => $category_id,
                    ]);
                }
            }

            if ($image) {
                return back()->with('success', 'Event updated successfully.');
            } else {
                return back()->with('unsucces', 'Oops something went wrong!');
            }
        } else {
            $update = Event::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ]);

            if ($update) {
                //delete even cat realtion first
                /*$event_relation_exist = EventCat::where('event_id', $id)->first();
                if($event_relation_exist){
                    EventCat::where('event_id', $id)->delete();
                }*/
                
                //Check id category id is exit or not
                if (count($request->category) >= 1) {
                    foreach ($request->category as $category_id) {
                        //Create cate $ events
                        EventCat::updateOrCreate([
                                'event_id'   => $id,
                                'cat_id'   =>  $category_id,
                            ],[
                                'event_id' => $id,
                                'cat_id' => $category_id,
                            ]);
                    }
                }
                return back()->with('success', 'Event updated successfully.');
            } else {
                return back()->with('unsucces', 'Oops something went wrong!');
            }
        }
    }

    //Function for delete event
    public function delete_event(Request $request){
        //Get ajax request for event id
        $event_id = $request->event_id;
        //Delete event
        $is_delete_event = Event::where('id', $event_id)->delete();
        //Check if event is deleted or not
        if($is_delete_event) {
            return back()->with('success', 'Event deleted successfully.');
        } else {
            return back()->with('unsucces', 'Oops something went wrong!');
        }
    }

    //Function for delete images
    public function delete_image(Request $request){   
        //Get ajax request for image id
        $image_id = $request->image_id;
        //Check if image is exit or not
        $imagePath = EventImages::select('event_images')->where('id', $image_id)->first();
        $filePath = public_path('event/' . $imagePath->event_images);
        //Unlink image folder
        if (file_exists($filePath)) {
            unlink($filePath);
            //Delete image
            EventImages::where('id', $image_id)->delete();
            return redirect()->back()->with('success', 'Image deleted successfully.');
        } else {
            //Delete image delete db
            EventImages::where('id', $image_id)->delete();
            return redirect()->back()->with('success', 'Image deleted successfully.');
        }               
    }
}


