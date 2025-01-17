<?php

namespace App\Http\Controllers;

use App\Jobs\RunCommandJob;
use App\Mail\BookingScheduleEmail;
use App\Mail\ErrorNotification;
use App\Models\ConsultationBooking;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BookConsultationController extends Controller
{
    //
    public function bookConsultation(Request $request) {
        if ($request->isMethod('post')) {
            // Validate the request data
            try{
                $validator = Validator::make($request->all(), [
                    'address' => 'required|string|max:255',
                    'firstname' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'phone' => 'required|string|max:20|regex:/^[0-9]+$/',
                    'full-phone' => 'regex:/^[+0-9]+$/',
                    'product' => 'required',
                    'date'  => 'required|string|max:10|after:' . Carbon::now()->addDays(1)->format('m/d/Y').'|before:' . Carbon::now()->addDays(2)->addWeek()->format('m/d/Y'),
                    'time_slot' => 'required|string',
                    'g-recaptcha-response' => 'required|recaptcha'
                ], [
                    'date' => 'Please select the date of appointment',
                    'time_slot' => 'Please select the time slot of appointment',
                    'g-recaptcha-response.required' => 'Please verify that you are not a robot.'
                ]);

                if ($validator->fails()) {
                    // Handle the failed validation, e.g., redirect back with errors
                    return redirect('/book-consultation')->withErrors($validator)->withInput();
                }

                $formattedDate = Carbon::parse($request->get('date'))->format('Y-m-d');

                // Create a new booking entry
                $booking = new ConsultationBooking();
                $booking->product = $request->get('product');
                $booking->firstname = $request->get('firstname');
                $booking->lastname = $request->get('lastname');
                $booking->email = $request->get('email');
                $booking->phone = $request->get('full-phone').$request->get('phone');
                $booking->newsletter = $request->get('newsletter', 0);
                $booking->address = $request->get('address');
                $booking->date = $formattedDate;//$request->get('date');
                $booking->time_slot = $request->get('time_slot');
                $booking->timezone = $request->get('timezone');
                $booking->save();

                $booking = ConsultationBooking::find($booking->id);

                // Dispatch Job to enquiry on Go High Level
                RunCommandJob::dispatch('ghl:consultation-booking')->onQueue('default');

                if (app()->environment('production')) {
                    // Mail::to($booking->email)->send(new BookingScheduleEmail($booking));
                }
                // For demonstration purposes, let's just redirect back with a success message
                // return redirect('/booking-success/'.Crypt::encrypt($booking->id))->with('success', 'Form submitted successfully!');
                Session::put('bookingId', Crypt::encrypt($booking->id));
                return redirect('/booking-success');

            } catch(\Exception $e) {
                Log::error($e->getMessage());
                if (app()->environment('production')) {
                    // Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
                }
                return redirect('/book-consultation')->with('error', 'Some error has occured! Please allow us some time to fix it.')->withErrors($validator)->withInput();
            }
        }
        //$country = Country::get();
        return view('home.book-consultation');
    }

    public function bookingSuccess() {
        if (Session::has('bookingId')) {
            $bookingId = Session::get('bookingId');
        };
        if(empty($bookingId)) {
            abort(404);
        }
        $booking = ConsultationBooking::find(Crypt::decrypt($bookingId));
        return view('home.booking-success', ['booking'=>$booking]);
    }
}
