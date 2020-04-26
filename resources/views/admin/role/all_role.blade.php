@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Admin Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Admin List
  <a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
          </h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Phone</th>
                  <th class="wd-15p">Access</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($user as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>

                  @if($row->category == 1)
                   <span class="badge btn-danger">Category </span> 
                  @else
                  @endif  


                   @if($row->coupon == 1)
                   <span class="badge btn-info">coupon </span> 
                  @else
                  @endif  


                   @if($row->product == 1)
                   <span class="badge btn-warning">product </span> 
                  @else
                  @endif  



                   @if($row->blog == 1)
                   <span class="badge btn-primary">blog </span> 
                  @else
                  @endif  



                   @if($row->order == 1)
                   <span class="badge btn-success">order </span> 
                  @else
                  @endif  



                   @if($row->other == 1)
                   <span class="badge btn-danger">other </span> 
                  @else
                  @endif  


                   @if($row->report == 1)
                   <span class="badge btn-info">report </span> 
                  @else
                  @endif  



                   @if($row->role == 1)
                   <span class="badge btn-warning">role </span> 
                  @else
                  @endif  


                   @if($row->return == 1)
                   <span class="badge btn-primary">return </span> 
                  @else
                  @endif  


                    @if($row->contact == 1)
                   <span class="badge btn-success">contact </span> 
                  @else
                  @endif 


                    @if($row->comment == 1)
                   <span class="badge btn-danger">comment </span> 
                  @else
                  @endif 

                    @if($row->setting == 1)
                   <span class="badge btn-info">setting </span> 
                  @else
                  @endif 

                   @if($row->stock == 1)
                   <span class="badge btn-info">Stock </span> 
                  @else
                  @endif 

                   


                  </td>
                  <td>
                    <a href="{{ URL::to('edit/admin/'.$row->id) }} " class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ URL::to('delete/admin/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                   
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->



 

 

@endsection