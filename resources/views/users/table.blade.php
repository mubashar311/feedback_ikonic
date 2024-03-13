<tr>
    <td>{{ $user->name ?? '' }}</td>
    <td>{{ $user->email ?? '' }}</td>
    <td>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle for-action_btn" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-display="static">
                Select
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                    @csrf
                    <button class="dropdown-item delete_record" type="button" data-id="{{ $user->id }}"><img class="imgFilter px-2" src="{{ asset('images/delIcon.svg')}}" alt="">Delete</button>
                </form>

            </div>
        </div>
    </td>
</tr>