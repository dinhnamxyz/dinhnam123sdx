@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() =>show =false, 2000)"
        x-show = "show"
        class="fixed top-0 left-3 transform-translate-x-1/2
     bg-red-600 text-white px-48 py-3 mx-auto  ">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif
