<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\EventCat;
use App\Models\Event;
use App\Models\EventImages;

class EventCategoryController extends Controller
{
    //Function for get category events    
    public function get_event(){
        //Get categories detail
        $data = Categories::with('event_details')->get()->toArray();
        //Check if event is exists or not
        if ($data) {
            $message['status'] = 200;
            $message['message'] = "Show Event Successfully";
            $message['data'] = $data;
            return response()->json($message, 200);
        } else {
            $message['status'] = 401;
            $message['message'] = "Oops something wrong.";
            $message['data'] = [];
            return response()->json($message, 401);
        }   
    }

    //Function for get categroy event detail
    public function get_category_event_detail(Request $request){
        //Get request for category id
        $category_id = $request->id;
        //Get category details
        $category_data = Categories::where('id', $category_id)->get()->toArray();
        //Check if category data pis exit or not
        $category_details = [];
        $all_event_details = [];
        if(count($category_data) >= 1){
            foreach ($category_data as $key => $category) {
                //Get event category realtions
                $event_realation_list = EventCat::orderBy('event_id','ASC')->Where('cat_id',$category['id'])->get()->toArray();
                if(count($event_realation_list) >= 1){
                    foreach ($event_realation_list as $key2 => $event_realation){
                        $event_id = $event_realation['event_id'];                        
                        //Get event detail
                        $event_details = Event::Where('id',$event_id)->with('event_images')->get()->toArray();
                        //Check if event images is exit or not
                        if(count($event_details) >= 1){
                            foreach ($event_details as $key3 => $event_detail) {
                                $event_images = [];
                                //Check if event images is exit or not
                                if(count($event_detail['event_images']) >= 1){
                                    foreach ($event_detail['event_images'] as $key4 => $event_image) {
                                        $event_images[] = url('/').'/public/event/'.$event_image['event_images'];
                                    }
                                }                    
                               //Store event images
                                $all_event_details[] = [
                                            'event_id' => $event_detail['id'],
                                          'event_name' => $event_detail['name'],
                                          'event_description' => $event_detail['description'],
                                          'start_date' => $event_detail['start_date'], 
                                          'end_date' => $event_detail['end_date'],  
                                          'event_images' => $event_images
                                    ];        
                            }
                        }
                    }
                }
    
                //Final array
                $category_details[] = [
                    'category_id' => $category['id'],
                    'category_name' => $category['name'],
                    'event_details' => $all_event_details,
                ];
            }
        }
    
        //Check category is exists or not
        if($category_details) {
            $message['status'] = 200;
            $message['message'] = "Category Event Details List";
            $message['data'] = $category_details;
            return response()->json($message, 200);
        }  else  {
            $message['status'] = 401;
            $message['message'] = "Oops something wrong.";
            $message['data'] = [];
            return response()->json($message, 401);
        }  
    }
}

