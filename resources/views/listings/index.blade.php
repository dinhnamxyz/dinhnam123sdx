<x-layout>

@include('partials._hero')
@include('partials._search')

<div class="p-6  border border-b-4 border-t-4 ml-40 mr-40">

    <button class="bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded button border  border-black " ><a href="/">ALL</a></button>
    <button class="bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded button border  border-black " ><a href="/?tag=study">Study</a></button>
    <button class="bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded button border  border-black " ><a href="/?tag=video">Video</a></button>
    <button class="bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded button border  border-black " ><a href="/?tag=social media">Social media</a></button>
    <button class="bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded button border  border-black " ><a href="/?tag=app">App</a></button>

</div>

<div class=" px-8 lg:grid lg:grid-cols-3 gap-4 mx-auto ml-30  w-5/6 ">
    @if (count($listings) == 0)
        <p>No listing found</p>
    @endif

    @foreach ($listings as $listing)
    <x-listing-card :listing="$listing" />
    @endforeach
</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>


</x-layout>
