@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Search Report</h5>
         
        </div><!-- sl-page-title -->

  <div class="row">
    <div class="col-lg-4">

             <div class="card pd-20 pd-sm-40"> 
              <div class="table-wrapper"> 
           <form method="post" action="{{ route('search.by.date') }}" >
            @csrf
             <div class="modal-body pd-20"> 
            <div class="form-group">
              <label for="exampleInputEmail1">Search By Date</label>
              <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date">
              
            </div> 
                  </div><!-- modal-body -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                     
                  </div>
                    </form> 
              </div><!-- table-wrapper -->
            </div><!-- card -->


    </div>



     <div class="col-lg-4">

             <div class="card pd-20 pd-sm-40"> 
              <div class="table-wrapper"> 
           <form method="post" action="{{ route('search.by.month') }}" >
            @csrf
             <div class="modal-body pd-20"> 
            <div class="form-group">
              <label for="exampleInputEmail1">Search By Month</label>
              
              <select class="form-control" name="month">
               <option value="january">january</option>
               <option value="february">February</option> 
               <option value="march">March</option> 
               <option value="april">April</option> 
               <option value="may">May</option> 
               <option value="jun">Jun</option> 
               <option value="july">July</option> 
               <option value="august">August</option> 
               <option value="september">September</option> 
               <option value="october">October</option>  
               <option value="november">November</option> 
               <option value="december">December</option> 
               
              </select>
              
            </div> 
                  </div><!-- modal-body -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                     
                  </div>
                    </form> 
              </div><!-- table-wrapper -->
            </div><!-- card -->


    </div>



     <div class="col-lg-4">

             <div class="card pd-20 pd-sm-40"> 
              <div class="table-wrapper"> 
           <form method="post" action="{{ route('search.by.year') }}" >
            @csrf
             <div class="modal-body pd-20"> 
            <div class="form-group">
              <label for="exampleInputEmail1">Search By Year</label>
              
               <select class="form-control" name="year">

                 <option value="2018">2018</option>
                 <option value="2019">2019</option>
                 <option value="2020">2020</option>
                 <option value="2021">2021</option>
                 <option value="2022">2022</option>
                 <option value="2023">2023</option>
                 <option value="2024">2024</option>
                 <option value="2025">2025</option>
                 
                
              </select>
              
            </div> 
                  </div><!-- modal-body -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                     
                  </div>
                    </form> 
              </div><!-- table-wrapper -->
            </div><!-- card -->


    </div>


    
  </div>







     

        

 
    </div><!-- sl-mainpanel -->


 
 

@endsection