<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lotteries = Lottery::orderBy('id', 'desc')->paginate(10);

		return view('lotteries.index', compact('lotteries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lotteries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$lottery = new Lottery();



		$lottery->save();

		return redirect()->route('lotteries.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lottery = Lottery::findOrFail($id);

		return view('lotteries.show', compact('lottery'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lottery = Lottery::findOrFail($id);

		return view('lotteries.edit', compact('lottery'));
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
		$lottery = Lottery::findOrFail($id);



		$lottery->save();

		return redirect()->route('lotteries.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$lottery = Lottery::findOrFail($id);
		$lottery->delete();

		return redirect()->route('lotteries.index')->with('message', 'Item deleted successfully.');
	}

	public function confirm()
	{
		$lotteries = Lottery::orderBy('id', 'desc')->paginate(10);

		return view('lotteries.confirm', compact('lotteries'));
	}

	public function purchase()
	{
		$lotteries = Lottery::orderBy('id', 'desc')->paginate(10);

		return view('lotteries.purchase', compact('lotteries'));
	}

}
