<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Categories;
use App\Models\EventImages;
use App\Models\EventCat;

class EventController extends Controller {

    //show event page
    public function show_event() {
        $data = Categories::get();
        //echo "<pre>";print_r($data);exit;
        return view('admin.events.add-events', compact('data'));
    }

    //add/insert event
    public function add_event(Request $request)
    {
        $data = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);
        if ($data) {
            $insertedId = $data->id;
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

            //Check id category id is exit or not
            if (count($request->category) >= 1) {
                foreach ($request->category as $category_id) {
                    //Create cate $ events
                    EventCat::create([
                        'event_id' => $insertedId,
                        'cat_id' => $category_id,
                    ]);
                }
            }

            return redirect('/add-events')->with('status', 'Event Added Successfully');
        } else {
            return redirect('/add-events')->with('unsucces', 'oops something went wrong!');
        }
    }

    //get all  event
    public function all_event()
    {
        $data = Event::with('get_event_cat_realtion')->get()->toArray();
        //$events = Event::
        //echo "<pre>";print_r($data);exit;
        return view('admin.events.all-events', compact ('data'));
    
    }

    //edit  event
    public function edit_events($id) {
        $categories = Categories::get()->toArray();
        $images = EventImages::where('event_id',$id)->get()->toArray();
        //echo "<pre>";print_r($images);exit;
        $data = Event::with('event_category_relations')->find($id);
        return view('admin.events.edit-events', compact('data','categories','images'));
    }

    //update  event
    public function update_events(Request $request, $id){
        if ($request->hasfile('choosefile')) {
            $update = Event::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ]);

            //print_r($request->file('choosefile'));exit;
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
                return redirect('/all-events')->with('status', 'Event Updated Successfully');
            } else {
                return redirect()
                    ->back()
                    ->with('unsucces', 'oops something went wrong!');
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
                return redirect('/all-events')->with('status', 'Event Updated Successfully');
            } else {
                return redirect()
                    ->back()
                    ->with('unsucces', 'oops something went wrong!');
            }
        }
    }

    //delete  event
    public function delete_events($id) {
        $data = Event::find($id)->delete();
        if($data) {
            return redirect('/all-events')->with('status','Event Deleted Successfully');
        }
    }


    //delete images
    public function delete_image($id){   
        $imagePath = EventImages::select('event_images')->where('id', $id)->first();
            //echo $imagePath;exit;
            $filePath = public_path('event/' . $imagePath->event_images);
                    if (file_exists($filePath)) {

                    unlink($filePath);

                    EventImages::where('id', $id)->delete();

            }else{

                EventImages::where('id', $id)->delete();
            }
            return redirect()->back() ->with('success', 'image deleted successfully');
    }
}


