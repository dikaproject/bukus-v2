<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reduce;
use Illuminate\Http\Request;

class ReducesController extends Controller
{
    public function index()
    {
        $reduces = Reduce::all();
        return view('admin.reduce.index', compact('reduces'));
    }

    public function create()
    {
        return view('admin.reduce.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'poin_min' => 'required|integer',
            'poin_max' => 'required|integer',
            'reducepoin_prestasi' => 'required|integer',
            'reducepoin_pelanggaran' => 'required|integer'
        ]);

        Reduce::create($request->all());

        return redirect()->route('reduces.index')->with('success', 'Reduction rule added successfully.');
    }

    public function edit(Reduce $reduce)
    {
        return view('admin.reduce.edit', compact('reduce'));
    }

    public function update(Request $request, Reduce $reduce)
    {
        $request->validate([
            'poin_min' => 'required|integer',
            'poin_max' => 'required|integer',
            'reducepoin_prestasi' => 'required|integer',
            'reducepoin_pelanggaran' => 'required|integer'
        ]);

        $reduce->update($request->all());

        return redirect()->route('reduce.index')->with('success', 'Reduction rule updated successfully.');
    }

    public function destroy(Reduce $reduce)
    {
        $reduce->delete();
        return back()->with('success', 'Reduction rule deleted successfully.');
    }
}
