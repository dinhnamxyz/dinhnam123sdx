@props(['listing'])


<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block "
        src="{{$listing->logo ? asset('storage/'.$listing->logo):asset('images/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}" class="font-bold">{{$listing['name']}}</a>
            </h3>
            <div class="text-xl">{{$listing['minides']}}</div>
            <x-listing-tags : tagsCsv="{{$listing->tags}}" />

            <li class="flex items-center font-bold justify-center  text-black rounded-xl py-1 px-3 mr-2 text-xs">
                    @if ($listing['price']=="0")
                        <a>Free</a>
                    @else
                        <a>Paid</a>
                    @endif
            </li>
        </div>
    </div>
</x-card>
