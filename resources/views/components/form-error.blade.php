@props(['name'])
@error($name)
    <p class="text-red-500 italic mt-5">{{$message}}</p>
@enderror