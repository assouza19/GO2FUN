<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Events extends Controller
{
    public function index()
    {
        return view('pages.events');
    }

    public function details( $id )
    {
        $event = \App\Models\Events::find( $id );

        return view('pages.event', [
            'event' => $event
        ]);
    }

    public function confirm( Requests $request )
    {
        $fields = $request->all();
    }

    public function store( Requests $request )
    {
        $fields = $request->all();
    }

    public function update( Requests $request, $id )
    {
        $fields = $request->all();
    }

    public function delete( $id )
    {
        $event = \App\Models\Events::find( $id );

        if( $event->delete() ) {
            return redirect('panel/events');
        } else {
            session()->flash('error', 'Não foi possível deletar o evento.');
            return redirect('panel/events');
        }
    }
}
