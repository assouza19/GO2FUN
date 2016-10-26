<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Events extends Controller
{
    /**
     * Visualiza todos os eventos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.events.index');
    }

    /**
     * Exibe os detalhes de um evento
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id )
    {
        $event = \App\Models\Events::find( $id );

        return view('pages.events.details', [
            'event' => $event
        ]);
    }

    /**
     * Exibe a lista de eventos com os confirmados
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmeds()
    {
        $events = \App\Models\Events::all();
        return view('pages.events.confirmeds', [
            'events' => $events
        ]);
    }

    /**
     * Exibe os confirmados de um evento
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmedsEvent($id )
    {
        $event = \App\Models\Events::find( $id );
        return view('pages.events.confirmed', [
            'event' => $event
        ]);
    }

    /**
     * Exibe a view do formulário de editar
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id )
    {
        $event = \App\Models\Events::find( $id );
        return view('pages.events.update', [
            'event' => $event
        ]);
    }

    /**
     * Exibe a view para criar evento
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.events.create');
    }


    /**
     * Confirma usuário no evento
     * Rota em: routes/api.php
     * Usa-se com ajax
     * @param Requests $request
     */
    public function confirm(Requests $request )
    {
        $fields = $request->all();
    }

    /**
     * Salva o evento (cria)
     * @param Requests $request
     */
    public function store(Requests $request )
    {
        $fields = $request->all();
    }

    /**
     * Atualiza o evento
     * @param Requests $request
     * @param $id
     */
    public function update(Requests $request, $id )
    {
        $fields = $request->all();
    }

    /**
     * Deleta o evento
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id )
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
