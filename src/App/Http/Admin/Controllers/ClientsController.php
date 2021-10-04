<?php

namespace App\Http\Admin\Controllers;

use App\Http\BaseController as Controller;
use Illuminate\Http\Request;
use Domain\Clients\Models\Client;

class ClientsController extends Controller
{
    public function index(Request $r)
    {
        $clients = Client::paginate();

        return view('admin.clients.index', compact('clients'));
    }

    public function view(Request $r)
    {
        $client = Client::whereId($r->id)->firstOrFail();

        return view('admin.clients.view', compact('client'));
    }

    public function showCreateForm(Request $r)
    {
        return view('admin.clients.create-form');
    }

    public function create(Request $r)
    {
        $r->validate([
            'name' => 'required|min:2|max:100|alpha_dash|unique:clients,name',
            'type' => 'required|min:2|max:100'
        ]);

        Client::create([
            'name'  => strtoupper($r->name),
            'type'  => $r->type,
            'token' => \Str::random(32)
       ]);

        return redirect()
                ->route('admin.client.list');
    }

    public function showUpdateForm(Request $r)
    {
        $client = Client::whereId($r->id)->firstOrFail();

        return view('admin.clients.update-form', compact('client'));
    }

    public function update(Request $r)
    {
        $r->validate([
            'name' => 'required|min:2|max:100|alpha_dash',
            'type' => 'required|min:2|max:100'
        ]);

        $clientExists = Client::whereName($r->name)->where('id', '!=', $r->id)->first();

        if ($clientExists) {
            return back()
                    ->withInput()
                    ->withErrors(['name' => 'name should be unique']);
        }

        $client = Client::whereId($r->id)->firstOrFail();

        $client->name = strtoupper($r->name);
        $client->type = $r->type;
        $client->save();

        return redirect()
                ->route('admin.client.list');
    }

    public function delete(Request $r)
    {
        Client::whereId($r->id)->delete();

        return redirect()
                ->route('admin.client.list')
                ->with("Client successfully deleted");
    }
}
