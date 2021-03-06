@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Brand Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.message')
<!-- /. ROW  --> 
<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
    <thead>
    <a href="{{ route('admin.brand.create') }}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new brands</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Brand Title</th>
            <th class="text-center">Brand Desc</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    @foreach($brand as $item)
    @php
        $editUrl = route('admin.brand.edit',['id'=>$item->id]);
        $delUrl = route('admin.brand.destroy',['id'=>$item->id]);
    @endphp
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->brand_name }}</td>
                <td>{{ $item->brand_desc }}</td>
                <td class="text-center">
                <a class='btn btn-info btn-xs' href="{{ $editUrl }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                <form class="del-form" action="{{ $delUrl }}" method="POST">{{ csrf_field() }}{{ method_field('DELETE') }}<button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</button></form>
                </td>
            </tr>
         @endforeach
    </table>
    </div>
</div>   
<div class="row">
    <div class="col-lg-12">
            {{ $brand->links() }}
    </div>
</div>
</div>
@stop