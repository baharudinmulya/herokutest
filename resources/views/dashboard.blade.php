@extends('partials.master')
@section('content')
<div class="container-fluid">
  <!-- BreadCrumb -->
  <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb adminx-page-breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
  </nav>

  <div class="pb-3">
      <h1>Dashboard</h1>
  </div>

  @include('common.alert')

  <div class="row">
      @if($users->role !== 'Asisten')
        <div class="col-lg-6">
          <form  method="get" action="{{route('generateKodeDash', ["fromdashboard" => "fromdashboard"])}}" enctype="multipart/form-data">
              <div class="card">
                  <div class="card-header">
                      Buat Kode Absen
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col text-center">
                              <button type="submit" class="btn btn-danger">Generate Kode Absen</button>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
        </div>
      @endif

      @if($users->role !== 'Asisten')
              <div class="col-lg-6  ">
      @else
                <div class="col-lg-12  ">
      @endif
          <div class="card">
              <div class="card-header">
                  Form Absen
              </div>
              <br>
              <div class="row">
                  <div class="col text-center">
                      <h4>Selamat Datang {{$users->name}}</h4>
                      <div class="digital_clock_wrapper">
                          <div id="digit_clock_time"></div>
                          <div id="digit_clock_date"></div>
                      </div>
                  </div>
              </div>
              @if(empty($cekAbsen))
                        <form method="post" action="{{route('storeAbsen')}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Id Asisten </label>
                                    <input value="{{$users->id}}"  name="id_asisten" class="form-control mb-2 input-credit-card" type="text" readonly="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kelas </label>
                                    <select name="kelas" class="form-control">
                                        <option disabled="" selected="">Silahkan Dipilih</option>
                                        @foreach($kelas as $kel)
                                        <option value="{{$kel->id}}">{{$kel->kelas}}</option>
                                        @endforeach
                                                                        
                                                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Materi </label>
                                    <select name="materi" class="form-control">
                                        <option disabled="" selected="">Silahkan Dipilih</option>
                                        @foreach($materi as $mat)
                                        <option value="{{$mat->id}}">{{$mat->nama_materi}}</option>
                                        @endforeach
                                                                        
                                                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Peran Jaga </label>
                                    <select name="peran_jaga" class="form-control">
                                        <option disabled="" selected="">Silahkan Dipilih</option>
                                        <option value="Asisten Baris">Asisten Baris</option>
                                        <option value="Ketua">Ketua</option>
                                        <option value="Tutor">Tutor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kode Absen </label>
                                    <input name="kode" class="form-control mb-2 input-credit-card" type="text" placeholder="Ex: 87ADsds0">
                                    <a>*Silahkan minta PJ atau Staff untuk kode absennya</a>
                                </div>
                                <div class="row">
                                                <div class="col text-center">
                                    <button type="submit" class="btn btn-info">Absen</button>
                                </div>
                                                    </div>
                            </div>
                        </form>
              @endif
              @if(!empty($cekAbsen))
                        <form method="get" action="{{route('updateAbsen')}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Id Asisten </label>
                                    <input value="{{$users->id}}"  name="id_asisten" class="form-control mb-2 input-credit-card" type="text" readonly="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kelas </label>
                                    <select name="kelas" class="form-control" disabled>
                                        <option disabled="" selected="">Silahkan Dipilih</option>
                                        @foreach($kelas as $kel)
                                        <option value="{{$kel->id}}">{{$kel->kelas}}</option>
                                        @endforeach      
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Materi </label>
                                    <select name="materi" class="form-control" disabled>
                                        <option  selected="" disabled>Silahkan Dipilih</option>
                                        @foreach($materi as $mat)
                                        <option value="{{$mat->id}}">{{$mat->nama_materi}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Peran Jaga </label>
                                    <select name="peran_jaga" class="form-control" disabled>
                                        <option disabled="" selected="">Silahkan Dipilih</option>
                                        <option value="Asisten Baris">Asisten Baris</option>
                                        <option value="Ketua">Ketua</option>
                                        <option value="Tutor">Tutor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kode Absen </label>
                                    <input name="kode" class="form-control mb-2 input-credit-card" type="text" placeholder="Ex: 87ADsds0" disabled>
                                    <a>*Silahkan minta PJ atau Staff untuk kode absennya</a>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-warning">Clock Out</button>
                                    </div>
                                </div>
                            </div>
                        </form>
              @endif
            </div>
      </div>
  </div>
</div>@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function currentTime() {
        var date = new Date(); /* creating object of Date class */
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
        var midday = "AM";
        midday = hour >= 12 ? "PM" : "AM"; /* assigning AM/PM */
        hour = hour == 0 ? 12 : hour > 12 ? hour - 12 : hour; /* assigning hour in 12-hour format */
        hour = changeTime(hour);
        min = changeTime(min);
        sec = changeTime(sec);
        document.getElementById("digit_clock_time").innerText = hour + " : " + min + " : " + sec + " " + midday; /* adding time to the div */

        var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

        var curWeekDay = days[date.getDay()]; // get day
        var curDay = date.getDate(); // get date
        var curMonth = months[date.getMonth()]; // get month
        var curYear = date.getFullYear(); // get year
        var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
        document.getElementById("digit_clock_date").innerHTML = date;

        var t = setTimeout(currentTime, 1000); /* setting timer */
    }

    function changeTime(k) {
        /* appending 0 before time elements if less than 10 */
        if (k < 10) {
            return "0" + k;
        } else {
            return k;
        }
    }

    currentTime();
</script>
@endsection
