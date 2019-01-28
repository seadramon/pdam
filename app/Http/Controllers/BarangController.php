<?php

namespace pdam\Http\Controllers;

use pdam\Models\Barang;
use pdam\Models\Category;

use Illuminate\Http\Request;

use DB;
use Html;
use Validator;
use Redirect;
use Session;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$data = Barang::paginate(20);

    	return view('pages.barang.index')
            ->with('data', $data);  
    }

    public function create()
    {
    	$cat = Category::get()->pluck('nama', 'id');

    	return view('pages.barang.create')
    		->with('cats', $cat);;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = Barang::create([
                'nama' => $request->nama,
                'category_id' => $request->category_id,
                'jumlah' => $request->jumlah,
                'pic' => 'damar',
            ]);

            DB::commit();

            Session::flash('success', 'Successfully created row!');
            return redirect::route('barang.create');
        } catch(Exception $e) {
            DB::rollback();
            Session::flash('failed', 'Failed! '.$e->getMessage());

            return redirect::route('barang.create');
        }
    }
}
