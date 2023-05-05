<x-mail::message>

<strong>Sujet: </strong>{{$form['subject']}} <br>
<strong>Nom Prenom: </strong>{{$form['name']}} <br>
<strong>Email: </strong>{{$form['email']}} <br>
@if (!empty($form['societe'])) <strong>Société: </strong>{{$form['societe']}} <br> @endif
<strong>Telephone: </strong>{{$form['tel']}} <br>
<strong>Message: </strong>{{$form['message']}} <br>

Cordialement,<br>

{{ config('app.name') }}
</x-mail::message>
