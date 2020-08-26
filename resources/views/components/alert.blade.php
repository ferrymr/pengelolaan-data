<div class="row">
    <div class="main-content col">
        <div class="alert alert-{{ $type }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @if(is_array($message) && count($message) > 0)
                <ul>
                    @foreach ($message->all() as $item)
                        <li> {{ $item }} </li>
                    @endforeach
                </ul>
            @else
                {{ $message }}
            @endif
        </div>
    </div>
</div>