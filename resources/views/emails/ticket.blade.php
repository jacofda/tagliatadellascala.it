@component('mail::message')
# Il tuo bilgietto

Ciao <b>{{$profile->nome}} {{$profile->cognome}}</b>,<br>
salva questa email nel tuo cellulare così il giorno {{$event->start->format('d/m/Y')}} non dovrai far altro che mostrare il biglietto in allegato.<br>
In alternativa puoi scaricare il bilgietto dalla tua pagina profilo nel sito.

Grazie,<br>
{{ config('app.name') }}
@endcomponent
