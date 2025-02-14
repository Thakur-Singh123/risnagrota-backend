<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    //Function for all contacts list
    public function all_contacts(){
        //Get contacts detail
        $all_contacts = ContactUs::orderby('ID', 'DESC')->get();
        return view('admin.contacts.all-contacts', compact('all_contacts'));
    }

    //Function for edit contact
    public function edit_contact($id){
        //Get contact detail
        $contact_detail = ContactUs::find($id);
        return view('admin.contacts.edit-contact', compact('contact_detail'));
    }

    //Function for update contact
    public function update_contact(Request $request, $id){
        //Update contact
        $is_update_contact = ContactUs::where('id', $id)->update([
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'message' => $request->message,
        ]);
        //Check if contact is updated or not
        if ($is_update_contact) {
            return back()->with('success', 'Contact updated successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }
    
    //Function for delete contact
    public function delete_contact(Request $request){
        //Get ajax request foro contact id
        $contact_id = $request->contact_id;
        //Delete contact
        $is_delete_contact = ContactUs::where('id', $contact_id)->delete();
        //Check if contact is delete or not
        if ($is_delete_contact) {
            return back()->with('success', 'Contact deleted successfuly.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }
}
