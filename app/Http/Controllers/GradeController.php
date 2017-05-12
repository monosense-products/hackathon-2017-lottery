<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$grades = Grade::orderBy('id', 'desc')->paginate(10);

		return view('grades.index', compact('grades'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('grades.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$grade = new Grade();

		

		$grade->save();

		return redirect()->route('grades.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$grade = Grade::findOrFail($id);

		return view('grades.show', compact('grade'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$grade = Grade::findOrFail($id);

		return view('grades.edit', compact('grade'));
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
		$grade = Grade::findOrFail($id);

		

		$grade->save();

		return redirect()->route('grades.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$grade = Grade::findOrFail($id);
		$grade->delete();

		return redirect()->route('grades.index')->with('message', 'Item deleted successfully.');
	}

}
