<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class RoomController extends Controller
{
    public function createRoom()
    {
        return view('admin.room.create');
    }

    public function storeRoom(Request $request)
    {
        $rules = [
            'room_title' => 'required',
            'price' => 'required',
        ];

        if (!empty($request->image)) {
            $rule['image'] = 'image';
        };

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('admin.createRoom')->withInput()->withErrors($validator);
        }
        $room = new Room();
        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->room_type = $request->room_type;
        $room->wifi = $request->wifi;
        $room->save();
        // Delete existing Room image (if it exists)
        if (File::exists(public_path('admin/uploads/room/' . $room->image))) {
            File::delete(public_path('admin/uploads/room/' . $room->image));
        }
        //save Room Room
        if (!empty($request->image)) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;

            $image->move(public_path('admin/uploads/room'), $imageName);
            $room->image = $imageName;
            $room->save();
        }
        return redirect()->route('admin.viewRoom')->with('success', 'Room created successfully');
    }

    public function viewRoom()
    {
        $rooms = Room::orderBy('created_at', 'DESC')->paginate(9);
        return view('admin.room.list', [
            'rooms' => $rooms
        ]);
    }

    public function editRoom(Request $request, $id)
    {
        $room = Room::find($id);
        if ($room == null) {
            session()->flash('error', 'Room Not Found');
            return response()->json([
                'status' => false,
                'message' => 'Room not found',
            ]);
        }
        return view('admin.room.edit', [
            'room' => $room,
        ]);
    }

    public function updateRoom(Request $request, $id)
    {
        $room = Room::find($id);
        $rules = [
            'room_title' => 'required',
            'price' => 'required',
        ];

        if (!empty($request->image)) {
            $rule['image'] = 'image';
        };

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('admin.createRoom')->withInput()->withErrors($validator);
        }
        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->room_type = $request->room_type;
        $room->wifi = $request->wifi;
        $room->save();
        //save Room Room
        if (!empty($request->image)) {
            File::delete(public_path('admin/uploads/room/' . $room->image));
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;

            $image->move(public_path('admin/uploads/room'), $imageName);
            $room->image = $imageName;
            $room->save();
        }
        return redirect()->route('admin.viewRoom')->with('success', 'Room updated successfully');
    }

    public function deleteRoom(Request $request)
    {
        $room = Room::find($request->id);
        if ($room == null) {
            session()->flash('error', 'Room Not Found');
            return response()->json([
                'status' => false,
                'message' => 'Room not found',
            ]);
        }

        // Delete existing Room image (if it exists)
        if (File::exists(public_path('admin/uploads/room/' . $room->image))) {
            File::delete(public_path('admin/uploads/room/' . $room->image));
        }
        $room->delete();
        session()->flash('success', 'Room deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Room deleted successfully',
        ]);
    }

    public function bookings()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->with('room')->paginate(9);
        return view('admin.room.booking', [
            'bookings' => $bookings
        ]);
    }

    public function deleteBooking(Request $request)
    {
        $booking = Booking::find($request->id);
        if ($booking == null) {
            session()->flash('error', 'Booking Not Found');
            return response()->json([
                'status' => false,
                'message' => 'booking not found',
            ]);
        }
        $booking->delete();
        session()->flash('success', 'Booking deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Booking deleted successfully',
        ]);
    }

    public function approveBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approved';

        $booking->save();
        return redirect()->route('admin.bookings')->with('success', 'Booking Approved successfully');
    }
    public function rejectBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'rejected';

        $booking->save();
        return redirect()->route('admin.bookings')->with('success', 'Booking Rejected successfully');
    }

    public function gallary()
    {
        $gallaries = Gallery::orderBy('created_at', 'DESC')->paginate(6);
        return view('admin.room.gallary', [
            'gallaries' => $gallaries
        ]);
    }
    public function gallaryStore(Request $request)
    {
        $rules = [
            'image' => 'image',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('admin.gallary')->withInput()->withErrors($validator);
        }

        $gallary = new Gallery();
        $image = $request->image;
        if ($image) {
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;

            $image->move(public_path('admin/uploads/gallary'), $imageName);
            $gallary->image = $imageName;
            $gallary->save();
        }
        return redirect()->route('admin.gallary')->with('success', 'Gallery Added Successfully');
    }

    public function destroyGallery($id)
    {
        $gallary = Gallery::find($id);
        // Delete existing gallary image (if it exists)
        if (File::exists(public_path('admin/uploads/gallary/' . $gallary->image))) {
            File::delete(public_path('admin/uploads/gallary/' . $gallary->image));
        }
        $gallary->delete();
        return redirect()->route('admin.gallary')->with('success','Gallery Delete Successfully');
    }

    public function messages()
    {
        $messages = Contact::orderBy('created_at', 'DESC')->paginate(9);
        return view('admin.room.message',[
            'messages' => $messages
        ]);
    }

    public function sendMail($id)
    {
        $sendMail = Contact::find($id);

        return view('admin.room.sendmail',[
            'sendMail' => $sendMail
        ]);
    }

    public function mail(Request $request,$id)
    {
        $mail = Contact::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline
        ];

        Notification::send($mail,new SendEmailNotification($details));

        return redirect()->back()->with('success','Mail Send Successfully');
    }
}
