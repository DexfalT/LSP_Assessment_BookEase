<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\sportsequip;
use Illuminate\Http\Request;

class SportEquipController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equip_code' => 'required|unique:sportsequip|max:255',
            'title' => 'required|max:255'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $sportsequip = sportsequip::create($request->all());
        $sportsequip->categories()->sync($request->categories);
        return redirect('sportsequip')->with('status', 'Drone added successfully!');
    }

    public function update(Request $request, $slug)
    {
        $newName = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $sportsequip = sportsequip::where('slug', $slug)->first();
        $sportsequip->update($request->all());

        if ($request->categories) {
            $sportsequip->categories()->sync($request->categories);
        }

        return redirect('sportsequip')->with('status', 'Drone updated successfully!');
    }

    public function edit($slug)
    {
        $sportsequip = sportsequip::where('slug', $slug)->first();
        $categories = Category::all();
        return view('drone-edit', ['categories' => $categories, 'sportsequip' => $sportsequip]);
    }

    public function index()
    {
        $sportsequip = sportsequip::all();
        return view('sportsequip', ['sportsequip' => $sportsequip]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('drone-add', ['categories' => $categories]);
    }

    public function delete($slug)
    {
        $sportsequip = sportsequip::where('slug', $slug)->first();
        return view('drone-delete', ['sportsequip' => $sportsequip]);
    }

    public function destroy($slug)
    {
        $sportsequip = sportsequip::where('slug', $slug)->first();
        $sportsequip->delete();
        return redirect('sportsequip')->with('status', 'Drone Deleted Successfully');
    }

    public function deleteDrone()
    {
        $deletedDrones = sportsequip::onlyTrashed()->get();
        return view('drone-deleted-list', ['deletedDrones' => $deletedDrones]);
    }

    public function restore($slug)
    {
        $sportsequip = sportsequip::withTrashed()->where('slug', $slug)->first();
        $sportsequip->restore();
        return redirect('sportsequip')->with('status', 'Drone Data Restored Successfully');
    }
}
