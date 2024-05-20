@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Payment Page</div>
  <div class="card-body">
      
      <form action="{{ url('payments/' .$payments->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$payments->id}}" id="id" />
        <label>Batch Name</label></br>
        <input type="text" name="name" id="name" value="{{$payments->name}}" class="form-control"></br>
        <label>Course Name</label></br>
        <input type="text" name="course_id" id="course_id" value="{{$payments->course->name}}" class="form-control"></br>
        <label>Start Date</label></br>
        <input type="text" name="start_date" id="start_date" value="{{$payments->start_date}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop