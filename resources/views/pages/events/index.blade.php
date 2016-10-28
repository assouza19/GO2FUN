@extends('layouts.panel')
@section('title', 'Eventos')
@section('content')
    <div class="content" ng-app="list">
        <table id="dataTable" class="table table-bordered table-striped table-hover table-linked">
            <thead>
            <tr>
                <th class="hidden-sm hidden-xs">ID</th>
                <th class="hidden-sm hidden-xs">Nome</th>
                <th class="hidden-sm hidden-xs">Valor</th>
                <th class="hidden-sm hidden-xs">Status</th>
                <th class="hidden-sm hidden-xs">Início/Fim</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr data-href="{{ $event->edit }}">
                    <td class="linked hidden-sm hidden-xs">{{ $event->id }}</td>
                    <td class="linked hidden-sm hidden-xs">{{ $event->name }}</td>
                    <td class="linked hidden-sm hidden-xs">R$ {{ $event->value }}</td>
                    <td class="linked hidden-sm hidden-xs">{{ $event->status }}</td>
                    <td class="linked hidden-sm hidden-xs">{{ $event->init }} - {{ $event->end }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<style>
    .linked {
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script>
    (function($) {

        $('.linked').click(function() {
            var href = $(this).parent('tr').data('href');
            window.location = href;
        });

        var dataTable = $('#dataTable').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            language: {
                processing:     "Traitement en cours...",
                search:         "Buscar item",
                lengthMenu:    "Mostrando _MENU_ items",
                info:           "Mostrando de _START_ &agrave; _END_, total: _TOTAL_ items.",
                infoEmpty:      "",
                infoFiltered:   "(_MAX_ items)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Nenhum item encontrado.",
                emptyTable:     "Nenhum item.",
                paginate: {
                    first:      "Primeira",
                    previous:   "Anterior",
                    next:       "Próxima",
                    last:       "Última"
                }
            }
        });
    })(jQuery);
</script>
@endpush
