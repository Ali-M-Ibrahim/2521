<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{

    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Employee::all();
        $contractData = EmployeeResource::collection($all);
        return $this->successResponse($contractData, 'Employees retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', $validator->errors(), 400);
        }
        Employee::create($request->all());
        return $this->successResponse([], 'Employee created successfully.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Employee::findOrFail($id);
        $dataContract= new EmployeeResource($data);
        return $this->successResponse($dataContract, 'Employee retrieved successfully.', 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Employee::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return $this->successResponse([], 'Employee updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Employee::findOrFail($id);
        $data->delete();
        return $this->successResponse([], 'Employee deleted successfully.', 200);
    }
}
