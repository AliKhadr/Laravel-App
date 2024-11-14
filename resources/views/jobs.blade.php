<x-layout>
    <x-slot:heading>Jobs Page</x-slot:heading>
    <h1>Welcome to the Jobs Page</h1><br>
    <ul>
        @foreach ($jobs as $item)
        <li>
            <a href="/jobs/{{$item['id']}}" class="text-blue-500 hover:underline">
                <strong>{{$item['title']}}</strong> => {{$item['salary']}} per year
            </a>
        </li>
        @endforeach
    </ul>
</x-layout>