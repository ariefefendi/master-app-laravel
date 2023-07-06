<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @param  \Throwable  $exception
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// $sess = $request->session()->get('name');
		// if ($sess !== null) {
		return view('products.index');
		// } else {
		// 	return redirect('/sigin');
		// }
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	// done
	public function getDataAll(Request $request)
	{
		$filtervalue = $request->input('filtervalue');
		$filtertext = $request->input('filtertext');
		$start = $request->input('start');
		$length = $request->input('length');
		// FILTERED DATA IN LIST DATA - FRONT END
		// main Query.		
		$sql = DB::table('products')
			->select(DB::raw('id,name,price,stock,email,description'))
			->where($filtervalue, 'like', '%' . $filtertext . '%')
			->limit($length, $start);

		$queryall = $sql->get();
		$data = $queryall;
		$total = $sql->count();
		$dataRecord = array(
			"RecordsTotal" => $total,
			"RecordsFiltered" => $total,
			"Data" => $data,
		);
		return json_encode($dataRecord);
	}

	// done
	public function GetDataSelect(Request $request)
	{
		$data = $request->input('id');
		// main Query.
		$sql = DB::table('products')
			->select(DB::raw('products.*'))
			->where('products.id', '=', $data['id']);
		$res = $sql->get();
		return json_decode($res);
	}

	// done
	public function Insert(Request $request)
	{
		$current_time = Carbon::now();
		// main data insert.
		$Data = [
			'name' => $request->input('name'),
			'price' => $request->input('price'),
			'stock' => $request->input('stock'),
			'email' => $request->input('email'),
			'hoby_id' => $request->input('hoby_id'),
			'description' => $request->input('description'),
			'created_at' => $current_time,
		];

		try {
			// going to insert if unerror.
			DB::table("products")->insert($Data);
			$status = "successfully inserted";
		} catch (Throwable $e) {
			report($e);
		}
		return json_encode(array("result" => $status));
	}

	public function Update(Request $request)
	{
		$d = $request->input('id');
		// main data insert.
		$Data = [
			'name' => $request->input('name'),
			'price' => $request->input('price'),
			'stock' => $request->input('stock'),
			'email' => $request->input('email'),
			'hoby_id' => $request->input('hoby_id'),
			'description' => $request->input('description'),
		];

		// UPDATE - if Mode == "Update"
		DB::table('products')->where('id', $d)->update($Data);
		$status = "Updated";
		return json_encode(array("result" => $status));
	}

	// done
	public function destroy(Request $request)
	{
		$id = $request->input('id');
		DB::table('products')->where('id', '=', $id)->delete();
		return json_encode(array("result" => "OK"));
	}

	// done. Fitur Select data hobies.
	public function selectHobies()
	{
		$sql = DB::table('hobies')->select(DB::raw('hobies.id as hoby_id, hobies.name'));
		$res = $sql->get();
		return $res;
	}

	// done. Fitur Select data hobies for token input.
	public function filterHobies(Request $request)
	{
		$data = $request->input('q');
		print_r($data);
		die();
		$sql = DB::table('hobies as tb')
			->select(DB::raw('tb.*, tb.name'))
			->where('tb.name', 'like', '%' . $data . '%');
		$res = $sql->get();
		return json_encode($res);
	}

}