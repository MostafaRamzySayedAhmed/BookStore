<?php

namespace App\Http\Controllers;
use App\Models\Detail;
use App\Models\User;
use App\Http\Requests\DetailsRequest;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function insert_details(DetailsRequest $request)
    {
        // Starting The Validation Phase
        
        $user_id = session('ID');
        $user = User::find($user_id);
        $fullname = $user->full_name;
        $address = $request->input('address');
        $postal_code = $request->input('postal_code');
        $city = $request->input('city');
        $state = $request->input('state');
        $street = $request->input('street');
        $phone = $request->input('phone');
        
        // Starting The Filtration Phase
        
        $filtered_address = filter_var($address, FILTER_SANITIZE_STRING);
        $filtered_postal_code = filter_var($postal_code, FILTER_SANITIZE_NUMBER_INT);
        $filtered_city = filter_var($city, FILTER_SANITIZE_STRING);
        $filtered_state = filter_var($state, FILTER_SANITIZE_STRING);
        $filtered_street = filter_var($street, FILTER_SANITIZE_STRING);
        $filtered_phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        
         Detail::create([
             'name' => $fullname,
             'address' => $filtered_address,
             'postal_code' => $filtered_postal_code,
             'city' => $filtered_city,
             'state' => $filtered_state,
             'street' => $filtered_street,
             'phone' => $filtered_phone,
             'user_id' => $user_id
         ]);
        
        return redirect()->route('payment_options')
                         ->with(['success' => 'Your Personal Details were Successfully Submitted']);
    }
}
