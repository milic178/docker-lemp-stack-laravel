<x-mail::message>

    <h2>{{$job->title}}</h2>
    <h1>Congrats your Job was posted. </h1>
    <p>
        <a href="{{url('/jobs/'.$job->id)}}">View Your Job Listing</a>
    </p>
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
