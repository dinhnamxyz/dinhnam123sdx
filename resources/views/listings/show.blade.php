<div class=" p-8 ">
<x-layout>
<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded  ">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-20 ml-6 mb-6"
                            src="{{$listing->logo ? asset('storage/'.$listing->logo):asset('images/no-image.png')}}"
                            alt=""
                        />

                        <h3 class="text-5xl mb-2 font-bold">{{$listing->name}}</h3>
                        <img class="w-30 ml-6 mb-6"
                            src="{{$listing->screenshot ? asset('storage/'.$listing->screenshot):asset('images/no-image.png')}}"

                        />
                        <div class="text-xl font-bold mb-4">{{$listing->minides}}</div>

                        <x-listing-tags : tagsCsv="{{$listing->tags}}" />

                            <div class=" text-3xl text-black  py-1 px-3 mr-2 ">Pricing :
                                @if ($listing['price']=="0")
                                    <a>Free</a>
                                @else
                                    <a>Paid</a>
                                @endif
                            </div>

                        </ul>

                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>

                            <div class="text-lg space-y-6">
                                <p>
                                   {{$listing->description}}
                                </p>

                                <a
                                    href="{{$listing->website}}"
                                    target="_blank"
                                    class="block bg-sky-500/100 text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Try
                                    {{$listing->name}}</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                    <div>
                        <a href="/listings/{{$listing->id}}/edit">
                            <i class="fa-solid fa-pencil"></i>
                            Edit
                        </a>
                        <form method="POST" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                        </form>
                    </div>
            </div>
</x-layout>
</div>
