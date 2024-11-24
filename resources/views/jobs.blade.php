<x-layout>
    <x-slot:heading>Jobs Page</x-slot:heading>
    <h1>Welcome to the Jobs Page</h1><br>
    <ul>
        @foreach ($jobs as $item)
        <li>
            <a href="/jobs/{{$item['id']}}" class="text-blue-500 hover:underline">
                <strong>{{$item['Job_Title']}}</strong> => {{$item['Job_Salary']}} per year
            </a>
        </li>
        @endforeach
    </ul>
</x-layout>