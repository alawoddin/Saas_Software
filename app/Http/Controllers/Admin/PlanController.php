<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function AllPlan() {
        $plan = Plan::latest()->get();
        return view('admin.backend.plan.all_plan' , compact('plan'));
    }

    //end method

    public function AddPlan() {
        return view('admin.backend.plan.add_plan');
    }

    //end method 

       public function StorePlan(Request $request){

        Plan::create([
            'name' => $request->name,
            'token_limit' => $request->token_limit,
            'template_limit' => $request->template_limit,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Plans Store successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.plan')->with($notification);  
    }
     // End Method 

      public function EditPlan($id){
        $plans = Plan::find($id);
        return view('admin.backend.plan.edit_plan',compact('plans'));

     }
     // End Method 

      public function UpdatePlan(Request $request){
        $plan_id = $request->id;

        Plan::find($plan_id)->update([
            'name' => $request->name,
            'token_limit' => $request->token_limit,
            'template_limit' => $request->template_limit,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Plans Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.plan')->with($notification);  
    }
     // End Method

         public function DeletePlan($id){
        Plan::find($id)->delete();

        $notification = array(
            'message' => 'Plans Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

     }
     // End Method 

     
     



  

}
