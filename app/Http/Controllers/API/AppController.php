<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Reminder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function settings()
    {
        $data = Setting::orderBy('id','desc')->first();
        
        $data->about_us = Page::where('id', 1)->first();
        $data->privacy = Page::where('id', 2)->first();
        $data->terms_conditions = Page::where('id', 3)->first();
        $data->services = Page::where('id', 4)->first();
        $data->price_details = Page::where('id', 5)->first();
        $data->service_details = Page::where('id', 6)->first();
        $data->orders = Page::where('id', 7)->first();

        $data->payment_methods = PaymentMethod::active()->get();        

        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'settings' => $data ]);
    }


    public function search(Request $request)
    {
        $items = Service::query();

        if ($request->has('text') && $request->text != '') {
            $search=$request->get('text');
            $products=Service::whereTranslationLike('name', '%'. $search.'%')->paginate(222222);
                  
                $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'products' => $products]);
 

        }


    }
    

    public function filter(Request $request)
    {
        $services = Service::where('status','active');

           if ($request->has('offers') ) {
            if ($request->get('offers') ==1)
            {   
             $productoffer=Productoffer::where('offer_from','<=',now()->toDateString())->where('offer_to' ,'>=', now()->toDateString())->pluck('product_id')->toArray();
              $products =  $products->whereIn('id',$productoffer);      
            }
        }
        
       if ($request->has('category_id') ) {
            if ($request->get('category_id') != null)
            {   
              $services =  $services->where('category_id', $request->get('category_id'));      
            }
        }

          
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'services' => $services]);


    }


    public function getMyNotifications(Request $request)
    {
        $notifications = Notification::where('user_id', auth('api')->id())->latest('id')->paginate(30000000);
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'notifications' => $notifications]);
    }
    
    public function pageDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_id' => 'required',
        ]);
            
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'validator' => implode("\n", $validator->messages()->all())]);
        }

        $page = Page::where('id', $request->page_id)->first();
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'page' => $page]);
    }



}
