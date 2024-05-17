<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //home page
    public function index()
    {
        $rooms = Room::orderBy('created_at', 'DESC')->take(4)->get();
        $gallaries = Gallery::orderBy('created_at', 'DESC')->take(8)->get();
        return view('layout.app', [
            'rooms' => $rooms,
            'gallaries' => $gallaries
        ]);
    }

    //room details
    public function roomDetail(Request $request, $id)
    {
        $room = Room::find($id);
        return view('layout.room_detail', [
            'room' => $room
        ]);
    }

    public function aboutPage(Request $request)
    {
        $room = Room::all();
        return view('layout.about_page', [
            'room' => $room
        ]);
    }

    //user booking rooms
    public function addBooking(Request $request, $id)
    {
        $rules = [
            'email' => 'required|email',
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $booking = new Booking();
        $booking->room_id = $id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $isBooking = Booking::where('room_id', $id)->where('start_date', '<=', $endDate)->where('end_date', '>=', $startDate)->exists();

        if ($isBooking) {
            return redirect()->back()->with('error', 'Room is already booked please try different date');
        } else {
            $booking->start_date = $request->startDate;
            $booking->end_date = $request->endDate;
            $booking->save();
            return redirect()->back()->with('success', 'Booking added successfully');
        }
    }

    //user feedback
    public function storeContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Contact send successfully');
    }

    //ourRooms page header
    public function ourRooms()
    {
        $rooms = Room::orderBy('created_at', 'DESC')->get();
        return view('layout.our_rooms', [
            'rooms' => $rooms
        ]);
    }
    //gallary page header
    public function ourGallaries()
    {
        $gallaries = Gallery::orderBy('created_at', 'DESC')->get();
        return view('layout.our_gallaries', [
            'gallaries' => $gallaries
        ]);
    }
    //gallary page header
    public function ourContacts(Request $request)
    {
        return view('layout.our_contact');
    }
}
