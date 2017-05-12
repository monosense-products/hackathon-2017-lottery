<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Prize;
use Illuminate\Http\Request;

class PrizeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$prizes = Prize::orderBy('id', 'desc')->paginate(10);

		return view('prizes.index', compact('prizes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('prizes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$prize = new Prize();

		

		$prize->save();

		return redirect()->route('prizes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$prize = Prize::findOrFail($id);

		return view('prizes.show', compact('prize'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$prize = Prize::findOrFail($id);

		return view('prizes.edit', compact('prize'));
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
		$prize = Prize::findOrFail($id);

		

		$prize->save();

		return redirect()->route('prizes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$prize = Prize::findOrFail($id);
		$prize->delete();

		return redirect()->route('prizes.index')->with('message', 'Item deleted successfully.');
	}

}
