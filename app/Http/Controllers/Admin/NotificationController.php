<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{  
    //Function for show all notifications
    public function all_notifications() {
        //Get all notifications
        $all_notifications = Notification::OrderBy('ID', 'DESC')->get();
        return view('admin.notifications.all-notifications', compact('all_notifications'));
    }

    //Function for add notification
    public function add_notification() {
        return view('admin.notifications.add-new-notification');
    }

    //Function for submit notification
    public function submit_notification(Request $request) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/notifications'), $filename);
        }

        //If new notification create old status update notification pending
        Notification::query()->update(['status' => 'Pending']);

        //Create notifincation
        $is_notification_create = Notification::create([
            'title' => $request->title,
            'status' => 'Active',
            'image' => $filename,
        ]);
        //Check if notification is created or not
        if ($is_notification_create) {
            return back()->with('success', 'Notification created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }    
    }

    //Function for edit notification
    public function edit_notification($id) {
        //Get notification
        $notification = Notification::find($id);
        return view('admin.notifications.edit-notification', compact('notification'));
    }

    //Function for update notification
    public function update_notification(Request $request, $id) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/notifications'), $filename);

            //If new notification create old status update notification pending
            Notification::query()->update(['status' => 'Pending']);

            //Update notfication with image
            $is_update_notification = Notification::where('id', $id)->update([
                'title' => $request->title,
                'status' => $request->status,
                'image' => $filename,
            ]);
            //Check if notificatin is updated or not
            if ($is_update_notification) {
                return back()->with('success', 'Notification updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        } else {
            
            //If new notification create old status update notification pending
            Notification::query()->update(['status' => 'Pending']);

            //Update notification without image
            $is_update_notification = Notification::where('id', $id)->update([
                'title' => $request->title,
                'status' => $request->status,
            ]);
            //Check if notification is updated or not
            if ($is_update_notification) {
                return back()->with('success', 'Notification updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        }
    }

    //Function for delete notification
    public function delete_notification(Request $request) {
        //Get ajax request
        $notification_id = $request->notification_id;
        //Delete notification
        $is_delete_notification = Notification::where('id', $notification_id)->delete();
        //Check if notification is deleted or not
        if ($is_delete_notification) {
            return back()->with('success', 'Notification deleted successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }
}
