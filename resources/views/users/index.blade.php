@extends('layouts.app')
@section('title', __('All Users'))
@section('header')
{{ __('All Users') }}
@endsection
@section('content')
<div class="row gy-3 mt-2 for_padding">

    <div class="head_flex">
        <div class="tit_bag_flex my-auto mb-0 ">
            <h2 class="title">{{ __('Users') }}</h2>
        </div>

    </div>
    <!--Table start here-->
    <div class="col-12 viewtable  " data-aos="zoom-in" data-aos-duration="1000">
        <div class="table-responsive text-nowrap ">
            <table id="listPage" class=" table border-0">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    @include('users.table')
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content moda">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Delete Record</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-exclamation-triangle"></i>
                    <p class="perm-del">Are you sure you want to delete this Record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger">Yes</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <!--Table ends here-->
</div>
</div>

@endsection
@section('scripts')

<script>
    $(document).on('click', '.delete_record', function() {
        var id = $(this).data('id');
        let url = "{{ route('admin.user.destroy', ':id') }}";
        url = url.replace(':id', id);
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0076a4',
            cancelButtonColor: '#2ad5cd',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.value) {

                $.ajax({
                        url: url,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    })
                    .done(function(response) {
                        swal.fire({
                            title: "Deleted!",
                            text: "Your Record Deleted Successfully!",
                            icon: "success",
                            showConfirmButton: false, // Remove the OK button
                            timer: 2000 // Timer in milliseconds
                        });

                        // Add timer after successful deletion
                        setTimeout(function() {
                            location.reload(true); // Reload the page after 2 seconds
                        }, 2000);
                    })
                    .fail(function(error) {
                        console.log(error);
                        swal.fire('Oops...', 'Something went wrong!', 'error');
                    });
            }
        });
    });
</script>

@endsection