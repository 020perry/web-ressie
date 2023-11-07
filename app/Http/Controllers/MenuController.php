<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }
    public function fetchMenus()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }
    /**
     * Sla een nieuw aangemaakt menu op in de database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valideer de binnenkomende aanvraaggegevens.
        // De velden 'name', 'description' en 'address' zijn verplicht.
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        // Maak een nieuw Menu object aan met de gegevens uit de aanvraag.
        $menu = new Menu($request->all());

        // Zet de owner_id van het menu op de ID van de momenteel ingelogde gebruiker.
        $menu->owner_id = Auth::id();

        // Sla het menu object op in de database.
        $menu->save();

        // Stuur de gebruiker terug naar de overzichtspagina van menu's
        // met een succesbericht.
        return redirect()->route('menus.index')->with('success', 'Menu succesvol aangemaakt.');
    }

    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        // You might want to return a JSON response if this is an API
        return response()->json($menu);
    }

//    public function update(Request $request, Menu $menu)
//    {
//        $request->validate([
//            'name' => 'required',
//            'description' => 'required',
//            'address' => 'required',
//        ]);
//
//        $menu->update($request->all());
//        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
//    }
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return response()->json(['message' => 'Menu deleted successfully.']);
    }
//    public function destroy(Menu $menu)
//    {
//        $menu->delete();
//        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
//    }
}
