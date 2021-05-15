@extends('layouts.app', [
'class' => '',
'elementActive' => 'cijfers'
])

@section('content')
<div class="content">

  <div class="card">
    <div class="card-body">
      <div class="container">
        <form action="" method="POST">
          @csrf()
          <h2>Update Admin</h2>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="first">User Naam</label>
                <input type="text" class="form-control" name="user" placeholder="" id=""
                  value="{{ $Updateid-> user_naam }}">
              </div>
            </div>
          </div>
          <!--  col-md-6   -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="last">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="*********" id="" value="">
              </div>
            </div>
          </div>




          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection