<?php

namespace App\Http\Controllers;



use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
class AdminController extends Controller
{
    public function index()
    {

        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $room = Room::all();
                $gallary = Gallary::all();
                return view('home.index', compact('room', 'gallary'));
            }
            if ($usertype == 'admin') {
                $data = Booking::all();
                return view('admin.booking', compact('data'));
            } else {
                return redirect()->back();

            }
        }
    }
    public function home()
    {

        $deluxeRooms = Room::where('room_type', 'deluxe')
            ->inRandomOrder()
            ->limit(3)
            ->get();


        $premiumRooms = Room::where('room_type', 'premium')
            ->inRandomOrder()
            ->limit(3)
            ->get();


        $regularRooms = Room::where('room_type', 'regular')
            ->inRandomOrder()
            ->limit(3)
            ->get();


        $room = $deluxeRooms->merge($premiumRooms)->merge($regularRooms);


        if ($room->count() < 9) {
            $remainingRooms = Room::whereNotIn('id', $room->pluck('id'))
                ->inRandomOrder()
                ->limit(9 - $room->count())
                ->get();
            $room = $room->merge($remainingRooms);
        }

        $gallary = Gallary::all();
        return view('home.index', compact('room', 'gallary'));
    }


    public function create_room()
    {
        return view('admin.create_room');
    }


    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));

    }


    public function room_delete($id)
    {
        $data = Room::find($id);
        Booking::where('room_id', $id)->delete();
        $data->delete();
        return redirect()->back();
    }

    public function booking_delete($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function room_update($id)
    {
        $data = Room::find($id);
        return view('admin.update_room', compact('data'));
    }


    public function add_room(Request $request)
    {
        $data = new Room();
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->max_guest = $request->max_guest;
        $data->room_type = $request->type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }

    public function edit_room(Request $request, $id)
    {

        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->max_guest = $request->max_guest;
        $data->room_type = $request->type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->route('view_room');
    }
    public function booking()
    {
        $data = Booking::all();
        return view('admin.booking', compact('data'));

    }
    public function approve_book($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approve';
        $booking->save();
        return redirect()->back();
    }
    public function reject_book($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->save();
        return redirect()->back();
    }
    public function view_gallary()
    {
        $gallary = Gallary::all();
        return view('admin.view_gallary', compact('gallary'));
    }
    public function upload_gallary(Request $request)
    {
        $data = new Gallary;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('gallary', $imagename);
            $data->image = $imagename;
            $data->save();
            return redirect()->back();
        }
    }

    public function delete_gallary($id)
    {
        $data = Gallary::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function view_contact()
    {
        $contact = Contact::all();
        return view('admin.view_contact', compact('contact'));
    }
    public function delete_contact($id)
    {
        $data = Contact::find($id);
        $data->delete();
        return redirect()->back();
    }
}
