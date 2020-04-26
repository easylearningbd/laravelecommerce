@extends('admin.admin_layouts')

 

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Blog Section</span>
      </nav>

      <div class="sl-pagebody">


 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Post ADD
 <a href="{{ route('all.blogpost')}}" class="btn btn-success btn-sm pull-right"> All Post</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">New Post Add From</p>

       <form method="post" action="{{ route('store.post')}}" enctype="multipart/form-data">    
        @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (ENGLISH): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  placeholder="Enter Post Title in English">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (HINDI): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_in"  placeholder="Enter Post Title in Hindi">
                </div>
              </div><!-- col-4 -->
              
               
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label"> Blog Category: <span class="tx-danger">*</span></label>
       <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($blogcategory as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

 
 

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details (ENGLISH): <span class="tx-danger">*</span></label>
  
            <textarea class="form-control" id="summernote"  name="details_en"> 

             </textarea>
                   
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details (HINDI): <span class="tx-danger">*</span></label>
  
            <textarea class="form-control" id="summernote1"  name="details_in"> 

             </textarea>
                   
                </div>
              </div><!-- col-4 -->


               



 <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Image: <span class="tx-danger">*</span></label>
                 <label class="custom-file">
          <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" >
          <span class="custom-file-control"></span>
          <img src="#" id="one">
            </label>

                </div>
              </div><!-- col-4 -->

 

            </div><!-- row -->

  

          </div><!-- end row --> 
<br><br>


            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
               
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        </form> 



        
        </div><!-- row -->

  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
 
 


 <script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

 

 

@endsection
