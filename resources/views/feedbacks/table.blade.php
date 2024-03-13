<tr>
    <td>{{ $feedback->title ?? '' }}</td>
    <td>{{ $feedback->category ?? '' }}</td>
    <td>{{ substr_replace($feedback->description, "...", 10) ?? '' }}</td>
    <td>{{ $feedback->voteCount()->count() ?? 0 }}</td>
    @if(Auth::user()->role == 'Admin')
    <td>{{ $feedback->commenting }}</td>
    @endif
    <td>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle for-action_btn" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select
            </button>
            <div class="dropdown-menu for_table_action" aria-labelledby="triggerId">
                @if(Auth::user()->role == 'User')
                <button class="dropdown-item" type="button"><a href="{{ route('feedbacks.show', $feedback->id) }}"><img class="imgFilter px-2" src="{{ asset('images/repoIcon.svg')}}" alt="">View Feedback</a></button>
                @endif
                @if(Auth::user()->role == 'Admin')
                    <div class="card-footer d-flex justify-content-between">
                        <form action="{{ route('feedbacks.comment-status', $feedback->id)}}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit" data-id="{{ $feedback->id }}"><i class="fa-solid fa-eye px-2"></i>{{$feedback->commenting == 'enabled' ? 'Disable' : 'Enable' }}</button>

                        </form>
                    </div>
                @endif
                @if($feedback->user_id == Auth::id() || Auth::user()->role == 'Admin')
                <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="post">
                    @csrf
                    <button class="dropdown-item delete_record" type="button" data-id="{{ $feedback->id }}"><img class="imgFilter px-2" src="{{ asset('images/delIcon.svg')}}" alt="">Delete</button>
                </form>
                @endif
            </div>
        </div>
    </td>
</tr>