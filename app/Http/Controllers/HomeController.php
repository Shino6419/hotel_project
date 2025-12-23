<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;

use App\Models\Contact;

class HomeController extends Controller
{
    public function index_gallary()
    {
        $gallary = Gallary::all();
        return view('home.index_gallary', compact('gallary'));
    }

    public function index_room(Request $request)
    {
        $query = Room::query();

        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('room_title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%');
            });
        }

        $room_type = $request->input('room_type');
        if ($room_type) {
            $query->where('room_type', $room_type);
        }

        $max_guest = $request->input('max_guest');
        if ($max_guest) {
            $query->where('max_guest', '=', $max_guest);
        }

        $room = $query->get();
        return view('home.index_room', compact('room'));
    }
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }


    public function add_booking(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);
        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)->exists();
        if ($isBooked) {
            return redirect()->back()->with('error', 'Phòng đã được đặt trước, hãy thử đặt phòng vào ngày khác');
        }
        $data->start_date = $request->startDate;
        $data->end_date = $request->endDate;
        $data->save();
        return redirect()->back()->with('success', 'Đặt phòng thành công');

    }

    public function contact(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Gửi thành công');
    }

    public function booking_history()
    {
        $bookings = Booking::where('email', auth()->user()->email)->get();
        return view('home.booking_history', compact('bookings'));
    }

    public function edit_booking($id)
    {
        $booking = Booking::find($id);
        if ($booking->email != auth()->user()->email) {
            return redirect()->back()->with('error', 'Không có quyền chỉnh sửa đơn đặt này');
        }
        return view('home.edit_booking', compact('booking'));
    }

    public function update_booking(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);

        $booking = Booking::find($id);
        if ($booking->email != auth()->user()->email) {
            return redirect()->back()->with('error', 'Không có quyền chỉnh sửa đơn đặt này');
        }

        // Kiểm tra xem phòng có bị trùng không
        $isBooked = Booking::where('room_id', $booking->room_id)
            ->where('id', '!=', $id)
            ->where('start_date', '<=', $request->endDate)
            ->where('end_date', '>=', $request->startDate)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'Phòng đã được đặt trước, hãy thử đặt phòng vào ngày khác');
        }

        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->start_date = $request->startDate;
        $booking->end_date = $request->endDate;
        $booking->save();

        return redirect()->route('booking_history')->with('success', 'Cập nhật đơn đặt thành công');
        ;

    }

    public function cancel_booking($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Không tìm thấy đơn đặt');
        }

        if ($booking->email != auth()->user()->email) {
            return redirect()->back()->with('error', 'Không có quyền hủy đơn đặt này');
        }

        if ($booking->status === 'confirmed') {
            return redirect()->back()->with('error', 'Không thể hủy đơn đặt đã được xác nhận');
        }

        $booking->delete();
        return redirect()->route('booking_history')->with('success', 'Hủy đơn đặt thành công');
    }
}

