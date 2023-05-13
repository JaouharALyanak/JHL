<x-mail::message>

<strong>Sujet: </strong>{{'Demand meet'}} <br>
<strong>Nom Prenom: </strong>{{$form['name']}} <br>
<strong>Email: </strong>{{$form['email']}} <br>
<strong>Telephone: </strong>{{$form['tel']}} <br>

Cordialement,<br>

{{ config('app.name') }}
</x-mail::message>
