<?php
namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        return view('restaurants.create');
    }



    /**
     * Sla een nieuw aangemaakt restaurant op in de database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valideer de binnenkomende aanvraaggegevens.
        // De velden 'name', 'description', en 'address' zijn verplicht.
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        // Maak een nieuw Restaurant object aan met de gegevens uit de aanvraag.
        $restaurant = new Restaurant($request->all());

        // Zet de owner_id van het restaurant op de ID van de momenteel ingelogde gebruiker.
        $restaurant->owner_id = Auth::id();

        // Sla het restaurant object op in de database.
        $restaurant->save();

        // Stuur de gebruiker terug naar de overzichtspagina van restaurants
        // met een succesbericht.
        return redirect()->route('restaurants.index')->with('success', 'Restaurant succesvol aangemaakt.');
    }

    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        $restaurant->update($request->all());
        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully.');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully.');
    }
}
