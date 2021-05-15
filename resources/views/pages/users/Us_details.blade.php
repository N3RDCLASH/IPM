@extends('layouts.app', [
'class' => '',
'elementActive' => 'cijfers'
])

@section('content')
<div class="content">

    <div class="card">
        <div class="card-body">

            <div class="container table-responsive py-5">
                <table class="table table-bordered table-hover">

                    <tr>
                        <th scope=""><b>User infomatie</b> </th>
                    </tr>
                    <tr>
                        <th scope="">Username </th>
                        <td> {{ $Userid-> user_naam }} </td>
                    </tr>



                    </tr>
                    {{-- <th scope="col">Password</th> --}}
                    {{-- <td> {{ $Userid-> password }} </td> --}}

                    </tr>
                    <th scope="col">Created Date</th>
                    <td> {{ $Userid-> created_at }} </td>

                    </tr>
                    <th scope="col">Updated Date</th>
                    <td> {{ $Userid-> updated_at }}</td>

                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection