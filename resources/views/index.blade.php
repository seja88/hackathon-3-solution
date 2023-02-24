@extends('layout')

@section('content')

    <div id="app"></div>

    <a href="{{ route('animal.create') }}">new patient</a>

    <main>
        <form class="search-form" action="" method="get">

            <label for="">
                Search:<br>
                <input type="text" name="search_string" value="{{ $searchString }}" placeholder="Enter name">
                <br>
                <br>

                <input type="submit" value="Search">

            </label>

            @if (!empty($animals))
                <div class="results">

                    @foreach ($animals as $animal)

                        <a href="{{ route('animal.show', [$animal->id]) }}" class="result">
                            <div class="img">
                                <img src="{{ asset('/images/pets/'.$animal->image->path) }}" alt="{{ $animal->name }} photo" />
                            </div>
                            <div>
                                <div class="name">{{ $animal->name }}</div>
                                <div class="type">{{ $animal->breed }} ({{ $animal->species }})</div>
                                @if ($animal->owner)
                                    <div class="owner"><span>Owned by</span> {{ $animal->owner->first_name . ' ' . $animal->owner->surname }}</div>
                                @endif
                            </div>
                        </a>

                    @endforeach

                </div>

                <div>
                    {{ $animals->links() }}
                </div>
            @endif

        </form>
    </main>

@endsection
