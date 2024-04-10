@extends('layouts.main')

@section('content')
    <div class="bg-gray-800 py-12 px-20">
        <h2 class=" font-bold text-xl text-orange-500 uppercase">Popular Actors</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 mt-3">
            @foreach($popularActors as $actor)
                <div class="actor flex flex-col space-y-1 ">
                    <div>
                        <a href="{{ route('actors.show',$actor['id']) }}" class="cursor-pointer">
                            <img class="rounded shadow-gray-700 hover:shadow-gray-900 transition-all shadow-2xl"
                                 src="{{ $actor['profile_path'] }}"
                                 alt="{{ $actor['name'] }}">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('actors.show',$actor['id']) }}" class="cursor-pointer">
            <span class="text-gray-200">
               {{ $actor['name'] }}
            </span>
                            <br>
                            <span class="text-gray-400">
                            {{ $actor['known_for'] }}
                        </span>
                        </a>

                    </div>
                </div>
            @endforeach
        </div> <!-- end popular actors -->
        <div class="page-load-status my-8 text-gray-200">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll(elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            status: '.page-load-status',
            // history: false,
        });
    </script>
@endsection
