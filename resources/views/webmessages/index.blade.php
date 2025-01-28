@extends('layouts.app')

@section('content')
<div class="header-tareas">
    
    <meta type="hidden" id="user-session-id" value="{{ auth()->user()->id }}">

    <div class="actions">

       


    </div>
</div>

<!-- Contenedor de la notificación unificada -->
<div id="notification" class="notification">
    <div class="notification-content">
        <span class="notification-icon">✔️</span> <!-- Cambia el icono según el tipo -->
        <span class="notification-message">Mensaje de la notificación</span>
    </div>
    <div class="notification-timer"></div> <!-- Barra de tiempo -->
</div>


<!-- Contenedor de la tabla de tareas -->
@include('webmessages.partials.inbox')








@endsection

@section('scripts')

<script src="{{ asset('js/webmessages/webmessages.js') }}"></script>

@endsection