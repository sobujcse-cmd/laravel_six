@extends('welcome')
@section('sobuj')
 <div class="container">
<div class="row">
      <div class="col-lg-12 mx-auto">
        
        <a href="{{route('write.post')}}" class="btn btn-info">Write Post</a>
        	
        
        <hr>
        <table class="table table-responsive">
        	<tr>
        		<th>SL</th>
        		<th>Category </th>
        		<th>Title </th>
        		<th>Image</th>
        		<th>Action</th>
        	</tr>
        	@foreach($post as $row)
        	<tr>
        		<td>{{$row->id}}</td>
        		<td>{{$row->name}}</td>
        		<td>{{$row->title}}</td>
        		<td><img src="{{URL::to($row->image)}}" style="height:40px; width:70px;"></td>
        		<td>
        		    <a href="{{url('edit/post/'.$row->id)}}" class="btn btn-sm btn-info">
        		     Edit</a>
        			<a href="{{url('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger" 
                        id="delete">Delete</a>
        			<a href="{{url('view/post/'.$row->id)}}" class="btn btn-sm btn-success">
        			 View</a>
        		</td>
        	</tr>
        	@endforeach
        	
        </table>
        
        
      </div>
    </div>
</div>
@endsection