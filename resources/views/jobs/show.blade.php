<x-layout>
    <x-slot:heading>Job</x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job->Job_Title }}</h2>
    <p>
        Salary is {{ $job->Job_Salary }} per year.
    </p>

    @can('edit', $job)
        <div class="mt-6">
            <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
        </div>
    @endcan    
</x-layout>