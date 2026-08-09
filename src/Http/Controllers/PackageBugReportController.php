<?php

namespace ProcessMaker\Package\PackageBugReport\Http\Controllers;

use Illuminate\Http\Request;
use ProcessMaker\Http\Controllers\Controller;
use ProcessMaker\Http\Resources\ApiCollection;
use ProcessMaker\Package\PackageBugReport\Models\Sample;
use RBAC;
use URL;

class PackageBugReportController extends Controller
{
    public function index()
    {
        return view('package-bug-report::index');
    }

    public function fetch(Request $request)
    {
        $query = Sample::query();

        $filter = $request->input('filter', '');
        if (!empty($filter)) {
            $filter = '%' . $filter . '%';
            $query->where(function ($query) use ($filter) {
                $query->Where('username', 'like', $filter);
            });
        }

        // Only allow sorting by valid columns in the users table
        $allowedColumns = ['id', 'username', 'status', 'created_at', 'updated_at'];
        $order_by = $request->input('order_by', 'id');
        if (!in_array($order_by, $allowedColumns)) {
            $order_by = 'id';
        }
        $order_direction = $request->input('order_direction', 'ASC');

        $response =
            $query->orderBy($order_by, $order_direction)
                ->paginate($request->input('per_page', 10));

        return new ApiCollection($response);
    }

    public function store(Request $request)
    {
        $sample = new Sample();
        $sample->fill($request->json()->all());
        $sample->saveOrFail();

        return $sample;
    }

    public function update(Request $request, $license_generator)
    {
        Sample::where('id', $license_generator)->update([
            'username' => $request->get('username'),
            'status' => $request->get('status'),
        ]);

        return response([], 204);
    }

    public function destroy($license_generator)
    {
        Sample::find($license_generator)->delete();

        return response([], 204);
    }

    public function generate($license_generator)
    {
    }
}
