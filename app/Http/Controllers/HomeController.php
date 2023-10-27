<?php

namespace App\Http\Controllers;

use App\Models\Hotel_Staff;
use App\Models\HR_Project;
use Illuminate\Http\Request;
use PHPUnit\Event\Telemetry\HRTime;

class HomeController extends Controller
{
    public function create()
    {

        return view('create');

    }
    public function store(Request $request)
    {
HR_Project::create($request->all());
return redirect('Index');


    }
    public function Index()
    {
        $data=HR_Project::all();
        return view('Index',compact('data'));
    }
    public function edit($id)
    {
        $data=HR_Project::find($id);
        return view('edit',compact('data'));
    }
    public function update(Request $request, HR_Project $HR_Project)
    {
        $HR_Project->update($request->all());
        return redirect('Index');
    }
    public function delete( HR_Project $HR_Project)
    {

        $HR_Project->delete();
        return redirect('Index');
    }
    public function duplicate(HR_Project $HR_Project){
        $newItem=$HR_Project->replicate();
        $newItem->save();
        return redirect()->back();
    }

}
