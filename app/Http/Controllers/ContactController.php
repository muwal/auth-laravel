<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('contact.index', compact('contacts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact Berhasil Ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Contact::find($id)->update($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'Contact Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $contacts = Contact::where('name', 'like', "%" . $keyword . "%")->orWhere('email', 'like', "%" . $keyword . "%")->paginate(5);
        return view('contact.index', compact('contacts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
