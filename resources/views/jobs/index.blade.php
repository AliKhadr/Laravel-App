<x-layout>
    <x-slot:heading>Jobs Page</x-slot:heading>
    <h1>Welcome to the Jobs Page</h1><br>
    <div class="space-y-4">
        @foreach ($jobs as $item)
        <a href="/jobs/{{$item['id']}}" class="block px-4 py-6 border border-grey-200 rounded-lg">
            <div class="font-bold text-blue-500 text-sm">{{$item->employer->name}}</div>
            <div>
                <strong>{{$item['Job_Title']}}</strong> => {{$item['Job_Salary']}} per year
            </div>
            <div>
                @foreach ($item->tags as $tag)
                <span>{{$tag->name}}</span>
                @endforeach
            </div>
        </a>
        @endforeach
        <div>
            {{$jobs->links()}}
        </div>
    </div>
</x-layout>