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
    public function confirmedsEvent( $id )
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
    public function confirm(Requests $request)
    {
        $fields = $request->all();

        $event = \App\Models\Events::find( $fields['event'] );
        $user = \App\Models\User::find( $fields['id'] );

        $event->confirmeds()->associate( $user );

        if( $event->save() ) {
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Você está confirmado'
                ], 200);
        } else {
            return response()
                ->json([
                    'success' => false,
                    'message' => 'Não foi possível confirmar'
                ], 402);
        }
    }

    /**
     * Salva o evento (cria)
     * @param Requests $request
     */
    public function store(Requests $request )
    {
        $fields = $request->all();
        if( $fields ) {
            $event = new \App\Models\Events();
            $event->user_id = $fields['author'];
            $event->name = $fields['name'];
            $event->categories = $this->setPreferences( $fields['categories'] );
            $event->status = $fields['status'];
            $event->value = $fields['value'];
            $event->description = $fields['value'];
            $event->address = $fields['address'];
            $event->cep = $fields['cep'];
            $event->bairro = $fields['bairro'];
            $event->city = $fields['city'];
            $event->state = $fields['state'];

            $event->init_at = $fields['init_at'];
            $event->ent_at = $fields['end_at'];

            if( $event->save() ) {
                session()->flash('success', 'Evento criado com sucesso!');
                return redirect('panel/events/edit/' . $event->id);
            } else {
                session()->flash('error', 'Não foi possível criar esse evento.');
                return redirect( 'panel/events/new' )
                    ->withInput( $fields );
            }
        }
    }

    public function setPreferences( $array )
    {
        $string = ',.';
        foreach( $array as $item )
        {
            $string += ",{$item}";
        }

        return str_replace(',.,', '', $string);
    }

    /**
     * Atualiza o evento
     * @param Requests $request
     * @param $id
     */
    public function update(Requests $request, $id )
    {
        $fields = $request->all();

        if( $fields ) {
            $event = \App\Models\Events::find( $id );
            $event->name = $fields['name'];
            $event->categories = $fields['categories'];
            $event->status = $fields['status'];
            $event->value = $fields['value'];
            $event->description = $fields['value'];
            $event->address = $fields['address'];
            $event->cep = $fields['cep'];
            $event->bairro = $fields['bairro'];
            $event->city = $fields['city'];
            $event->state = $fields['state'];

            $event->init_at = $fields['init_at'];
            $event->ent_at = $fields['end_at'];

            if( $event->save() ) {
                session()->flash('success', 'Evento salvado com sucesso!');
                return redirect('panel/events/edit/' . $id);
            } else {
                session()->flash('error', 'Não foi possível salvar esse evento.');
                return edirect('panel/events/edit/' . $id)
                    ->withInput( $fields );
            }
        }
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
