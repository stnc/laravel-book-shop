@if ($category->todolists()->count() > 0)

    <ul>

        @foreach($category->todolists as $list)

            <li>{{ $list->name }}</li>

        @endforeach

    </ul>

@endif

@if ($list->categories->count() > 0)

    <ul>
        {{ $list->name }}
        @foreach($list->categories as $category)

            <li>{{ $category->name }}</li>

        @endforeach

    </ul>

@endif
