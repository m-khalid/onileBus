<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset=UTF-8>
  <meta name=viewport content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin=anonymous>
  <link rel="stylesheet" href="../../sass/admin.css">
  <title>Admin Dashboard</title>
  <script>
      var checkList = document.getElementById('list1');
checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
  if (checkList.classList.contains('visible'))
    checkList.classList.remove('visible');
  else
    checkList.classList.add('visible');
}
      </script>
</head>

@section('content')
 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
<body>
        <div style="width:50%; margin:auto; font-weight:bold" class="card-header">
<span style="margin-left:40px; font-size: 20px;">Admin</span>
          <a class="btn btn-danger"style="margin-left:75%" href="/admin/logout" >Logout</a>

</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Route') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.add.route') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="From" class="col-md-4 col-form-label text-md-right">{{ ('Start of the road') }}</label>

                            <div class="col-md-6">
                                <input id="from" type="text"  name="from"  >


                            </div>
                        </div>
                    <div class="form-group row">
                            <label for="From" class="col-md-4 col-form-label text-md-right">{{ ('End of the road') }}</label>

                            <div class="col-md-6">
                                <input id="to" type="text"  name="to"  >


                            </div>
                        </div>
                 <div class="form-group row">
                            <label for="From" class="col-md-4 col-form-label text-md-right">{{ ('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text"  name="price"  >


                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="From" class="col-md-4 col-form-label text-md-right">{{ ('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text"  name="description"  >


                            </div>
                        </div>
 <div class="form-group row" style="margin-left:40px">
                            <label for="From" class="col-md-4 col-form-label text-md-right">{{ ('Choose Multiple Time') }}</label>

       <select multiple size="6" style="width:110px" name="times[]">
          <option value="7:00 AM">7:00 AM</option>
           <option value="8:00 AM">8:00 AM</option>
          <option value="9:00 AM">9:00 AM</option>
          <option value="10:00 AM">10:00 AM</option>
          <option value="11:00 AM">11:00 AM</option>
          <option value="12:00 PM">12:00 PM</option>
          <option value="1:00 PM">1:00 PM</option>
          <option value="2:00 PM">2:00 PM</option>
          <option value="3:00 PM">3:00 PM</option>
          <option value="4:00 PM">4:00 PM</option>
          <option value="5:00 PM">5:00 PM</option>
          <option value="6:00 PM">6:00 PM</option>
          <option value="7:00 PM">7:00 PM</option>
          <option value="8:00 PM">8:00 PM</option>
          <option value="9:00 PM">9:00 PM</option>
          <option value="10:00 PM">10:00 PM</option>
          <option value="11:00 PM">11:00 PM</option>
          <option value="12:00 AM">12:00 AM</option>
</select>
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Add Route') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
