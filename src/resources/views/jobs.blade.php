<x-layout>
    <x-slot:heading>Available jobs</x-slot:heading>
    <h1>Currently listed</h1>

    @foreach($jobs as $job)
        <li class="mt-1">
            <a href="/jobs/{{$job['id']}}" class="text-blue-500 hover:underline">
            <strong>{{ $job['title'] }}:</strong> Pays ${{ $job['salary'] }}: per year
            </a>
        </li class="mt-1">
    @endforeach
</x-layout>

