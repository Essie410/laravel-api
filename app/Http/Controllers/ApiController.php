<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;
use App\Http\Requests\ApiRequest;
use App\Http\Resources\ApiResource;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=ApiResource::collection(Api::all());
         return $data? response()->json(['statusCode'=>200,
       'status'=>'Created','data'=> $data],200): response()->json(['statusCode'=>500,
       'status'=>'not Created','data'=>null],500);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiRequest $request)
    {
        $api= new Api();
        $api->name=$request->name;
         $api->stack=$request->stack;
          $api->age=$request->age;
           $api->number=$request->number;
         $api->salary=$request->salary;
       $checking=  $api->save();
       return $checking? response()->json(['statusCode'=>201,
       'status'=>'Created']): response()->json(['statusCode'=>500,
       'status'=>'not Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Api::where('id',$id)->get();
      
         return $data? response()->json(['statusCode'=>200,
       'status'=>'Created','data'=>$data],200): response()->json(['statusCode'=>500,
       'status'=>'not Created','data'=>null],500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   $api=Api::where('id',$id)->get();
        Api::where('id',$id)->update([
            'name'=>$request->name !==''?$request->name:$api->name,
            'stack'=>$request->stack  !==''?$request->stack:$api->stack,
            'age'=>$request->age  !==''?$request->age:$api->age,
            'number'=>$request->number  !==''?$request->number:$api->number,
            'salary'=>$request->salary  !==''?$request->salary:$api->salary,
        ]);
        return response()->json([
            'status'=>'Updated Successfully',
            'statusCode'=>200,
            'data'=>Api::where('id',$id)->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Api::where('id',$id)->delete();
         return response()->json(
            ['statusCode'=>204,'status'=>'Deleted Successfully'],204);

    }
}
