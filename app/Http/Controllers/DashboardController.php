<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\sportsequip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $equipmentsCount = sportsequip::count();
        $categoryCount = Category::count();
        $userCount = user::count();
        
        return view('dashboard', [
            'equipment_count' => $equipmentsCount,
            'category_count' => $categoryCount,
            'user_count' => $userCount,
        ]);
    }
}
