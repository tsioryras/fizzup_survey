<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@yield('css')
<!-- Styles -->

</head>
<body>
<div id="app">
    <main class="mdl-grid justify-content-center">
        @yield('content')
    </main>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
<script>
    $(document).ready(function () {
        //datatable for listing
        $('table').DataTable({
            "order": [[3, "desc"]],
            "language": {
                "decimal": "",
                "emptyTable": "aucun avis disponible",
                "info": "_START_ à _END_ parmi _TOTAL_ avis",
                "infoEmpty": "",
                "infoFiltered": "(filtrés parmi _MAX_ avis)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": " Afficher_MENU_ avis",
                "loadingRecords": "chargement...",
                "processing": "chargement...",
                "search": "Rechercher:",
                "zeroRecords": "aucun avis correspondant",
                "paginate": {
                    "first": "<<",
                    "last": ">>",
                    "next": ">",
                    "previous": "<"
                },
            }
        });
    });

    //editor for comments
    tinymce.init({
        selector: 'textarea.comment',
        menubar: false,
        height: 150
    });

</script>
@yield('js')
</body>
</html>
