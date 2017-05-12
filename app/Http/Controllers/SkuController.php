<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sku;
use Illuminate\Http\Request;

class SkuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$skus = Sku::orderBy('id', 'desc')->paginate(10);

		return view('skus.index', compact('skus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('skus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$sku = new Sku();

		

		$sku->save();

		return redirect()->route('skus.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$sku = Sku::findOrFail($id);

		return view('skus.show', compact('sku'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sku = Sku::findOrFail($id);

		return view('skus.edit', compact('sku'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$sku = Sku::findOrFail($id);

		

		$sku->save();

		return redirect()->route('skus.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sku = Sku::findOrFail($id);
		$sku->delete();

		return redirect()->route('skus.index')->with('message', 'Item deleted successfully.');
	}

}
