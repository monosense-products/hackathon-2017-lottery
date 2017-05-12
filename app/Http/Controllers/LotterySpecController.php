<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\LotterySpec;
use Illuminate\Http\Request;

class LotterySpecController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lottery_specs = LotterySpec::orderBy('id', 'desc')->paginate(10);

		return view('lottery_specs.index', compact('lottery_specs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lottery_specs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$lottery_spec = new LotterySpec();

		

		$lottery_spec->save();

		return redirect()->route('lottery_specs.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lottery_spec = LotterySpec::findOrFail($id);

		return view('lottery_specs.show', compact('lottery_spec'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lottery_spec = LotterySpec::findOrFail($id);

		return view('lottery_specs.edit', compact('lottery_spec'));
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
		$lottery_spec = LotterySpec::findOrFail($id);

		

		$lottery_spec->save();

		return redirect()->route('lottery_specs.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$lottery_spec = LotterySpec::findOrFail($id);
		$lottery_spec->delete();

		return redirect()->route('lottery_specs.index')->with('message', 'Item deleted successfully.');
	}

}
