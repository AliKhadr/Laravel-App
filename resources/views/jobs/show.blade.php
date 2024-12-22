<x-layout>
    <x-slot:heading>Job</x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['Job_Title'] }}</h2>
    <p>
        Salary is {{ $job['Job_Salary'] }} per year.
    </p>
</x-layout>