<x-mail::message>
Hello , you have got an enquiry!

<h3>Name : {{ $data['first_name'].' '.$data['last_name'] }}</h3>

<h3>Phone : {{ $data['phone'] }}</h3>

<h3>Message : {{ $data['message'] }}</h3>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
