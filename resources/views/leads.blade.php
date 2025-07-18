@extends('app')

@section('content')
<style>
    .lead-num{
        font-size: 30px;
        font-weight: 700;
        color: white;
    }
    .lead-m{
        font-size: 18px;
        font-weight: 500;
        color: white;
    }
</style>
<div class="container m-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card" style="background: #17A2B8;">
            <div class="card-body">
              <h5 class="card-title lead-num">5</h5>
              <p class="card-text lead-m">Mobile Number</p>
              <hr>
              <a href="#">View All</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background: #28A745">
            <div class="card-body">
                <h5 class="card-title lead-num">5</h5>
                <p class="card-text lead-m">Mobile Number</p>
                <hr>
                <a href="#">View All</a>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background: #FFC107">
            <div class="card-body">
                <h5 class="card-title lead-num">5</h5>
                <p class="card-text lead-m">Mobile Number</p>
                <hr>
                <a href="#">View All</a>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background: #DC3545">
            <div class="card-body">
                <h5 class="card-title lead-num">5</h5>
                <p class="card-text lead-m">Mobile Number</p>
                <hr>
                <a href="#">View All</a>
              </div>
          </div>
        </div>
      </div>
</div>
@endsection