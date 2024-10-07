<x-layout>
    <x-slot:heading>Job</x-slot:heading>
    <h1>Currently listed</h1>

    <h2 class="font-bold text-lg mt-2">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }}: per year.
    </p>
</x-layout>

