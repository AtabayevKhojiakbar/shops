@extends('.dashboard')
@section('content')

    <div class="card container-fluid">
        <table class="table table-bordered border-1 mt-3">
            <tr align="center">
                <th>#</th>
                <th>User</th>
                <th>From</th>
                <th>To</th>
                <th>Product</th>
                <th>Price</th>
                <th>Count</th>
                <th>Create time</th>
                <th>Delete time</th>
                <th>Amal</th>
            </tr>
            @foreach($histories as $history)
            <tr align="center">
                <th>{{$history->id}}</th>
                <th>{{$history->users->name}}</th>
                <th>{{$history->form}}</th>
                <th>{{$history->to}}</th>
                <th>{{$history->product->name}}</th>
                <th>{{$history->product->price*$history->count}}</th>
                <th>{{$history->created_at}}</th>
                <th>{{$history->delete_at}}</th>
                <th>
                    <a class="btn btn-warning" href="{{route('history.edit',$history->id)}}"><i class="fas fa-pen"></i></a>
                    <a class="btn btn-danger" href=""><i class="fas fa-archive"></i></a>
                </th>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- Button trigger modal -->
{{--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">--}}
{{--        Launch static backdrop modal--}}
{{--    </button>--}}

{{--    <!-- Modal -->--}}
{{--    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <select name="" id="">--}}
{{--                        <option value="">1</option>--}}
{{--                        <option value="">2</option>--}}
{{--                        <option value="">3</option>--}}
{{--                        <option value="">4</option>--}}
{{--                        <option value="">5</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Understood</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



{{--    <script>--}}
{{--        $('#mySelect2').select2({--}}
{{--            dropdownParent: $('#myModal')--}}
{{--        });--}}
{{--    </script>--}}

@endsection
