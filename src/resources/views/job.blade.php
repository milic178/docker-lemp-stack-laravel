<x-layout>
    <x-slot:heading>Job</x-slot:heading>
    <h1>Currently listed</h1>
    <div class="font-bold text-blue-500 text-sm mt-2">{{ $job->employer->name }}</div>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }}: per year.
    </p>
</x-layout>

