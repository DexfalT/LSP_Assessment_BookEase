<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Carbon\Carbon;
use App\Models\User;
use App\Models\sportsequip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DroneRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $sportsequip = sportsequip::all(); 

        return view('drone-rent', ['users' => $users, 'sportsequip' => $sportsequip]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        $sportsequip = sportsequip::findOrFail($request->equip_id)->only('status');

        if ($sportsequip['status'] != 'in stock') {
            Session::flash('message', 'Cannot Rent, The Drone is in use!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('drone-rent');
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)
                ->count();

            if ($count >= 3) {
                Session::flash('message', 'Cannot Rent, User Has Reached Drone Renting Limit');
                Session::flash('alert-class', 'alert-danger');
                return redirect('drone-rent');
            } else {
                try {
                    DB::beginTransaction();

                    RentLogs::create($request->all());

                    $sportsequip = sportsequip::findOrFail($request->equip_id);
                    $sportsequip->status = 'not available';
                    $sportsequip->save();

                    DB::commit();

                    Session::flash('message', 'Rent Drone Success!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('drone-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }
}
