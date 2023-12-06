<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="p-5 md:p-0 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10 items-start ">
                @if(empty($apiData))
                <h1 class="text-3xl my-5">No Record Found</h1>
                @else
                @foreach($apiData as $data)
                <section class="p-5 py-10 <?= $loop->even ? 'bg-green-50' : 'bg-purple-50' ?> text-center transform duration-500 hover:-translate-y-2 cursor-pointer">
                    <div class="w-full h-64">
                        <img src="{{$data->thumbnail}}" class="h-full h-full object-cover mx-auto" alt="">
                    </div>
                    <div class="space-x-1 flex justify-center mt-10">
                            <?php
                            $maxRating = 5; 
                            $rating = $data->rating; 

                            for ($i = 1; $i <= $maxRating; $i++) {
                                $isFilled = $i <= $rating;
                                $fillColorClass = $isFilled ? 'text-orange-600' : 'text-gray-300';
                            ?>
                                <svg class="w-4 h-4 mx-px fill-current <?= $fillColorClass ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                    <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                </svg>
                            <?php
                            }
                            ?>
                        </div>
                        <h1 class="text-3xl my-5">{{$data->title}}</h1>
                        <p class="mb-5">{{$data->description}}</p>
                        <h2 class="font-semibold mb-5">{{$data->price}}</h2>
                    </section>
                    @endforeach
                </section>
                
                <div class="navigation flex justify-center py-20">
                    {{$apiData->links()}}
                </div>
                @endif
</x-app-layout>
