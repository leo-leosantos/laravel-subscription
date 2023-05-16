@component('mail::message')
# Novo Contato



Nome: {{ $data['name'] }}
Email: {{ $data['email'] }}

Messagem: {{ $data['message'] }}

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
