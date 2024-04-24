@extends('admin.dashboard.admin_layout',['pagename'=>'Product Create'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Product Create</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','product')
@section('main-content')

<?php 
    $update=false;
    if(isset($product))
    {
        $update=true;
    }
?>

        <form action="{{$update==true? url('/admin/product',[$product->uuid]):url('/admin/product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($update ==true)
                @method('PATCH')
            @endif

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" id="nn" placeholder="Enter Product Name" value="{{$update==true?$product->item_name : '' }}">
            </div>

            <label for="exampleFormControlInput1" class="form-label">Batch Year</label>
            <select class="form-control m-bot15" name="batchuuid" id="roleSelect">
                <option value="{{$update==true?$product->batchuuid : ""}}">{{$update==true?$product->batchcode : "Select Batch Year"}}</option>
                @if($batch->count() > 0)
                @foreach($batch as $b)
                <option value="{{$b->uuid}}">{{$b->manufacturedDate}}</option>
                @endForeach
                @else
                No Record Found
                    @endif   
             </select>

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Price</label>
            <input type="text" class="form-control" name="price" id="nn" placeholder="Enter Price" value="{{$update==true?$product->item_price : '' }}">
            </div>

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Quantity</label>
            <input type="text" class="form-control" name="qty" id="nn"placeholder="Enter Quantity" value="{{$update==true?$product->item_qty : '' }}">
            </div>

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="img" id="nn" value="{{$update==true?$product->item_image : '' }}">
            </div>

            <div class="editorreply form-group mb-3 ">
                    <label for="message-text" class="col-form-label">Description</label>
                    <textarea class="form-control" id="editor" name="desc" >{{$update==true?$product->description : ""}}</textarea>
                    <!-- <input type="text" class ="data form-control" id="replycontent" > -->
                </div>
            
            <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">{{$update==true? "Update":"Save"}}</button>
            </div>
        </form>

@endsection

@section('script')

<script >

    tinymce.init({
            selector: '#editor',
            toolbar: "aligncenter alignjustify alignleft | bold  | italic |underline |fontfamily fontsize forecolor indent | backcolor | language | lineheight |  selectall | strikethrough | subscript superscript | a11ycheck advtablerownumbering typopgraphy anchor restoredraft casechange charmap checklist code codesample addcomment showcomments ltr rtl editimage fliph flipv imageoptions rotateleft rotateright emoticons export footnotes footnotesupdate formatpainter fullscreen help image insertdatetime link openlink unlink bullist numlist media mergetags mergetags_list nonbreaking pagebreak pageembed permanentpen preview quickimage quicklink quicktable cancel save searchreplace spellcheckdialog spellchecker | table tablecellprops tablecopyrow tablecutrow tabledelete tabledeletecol tabledeleterow tableinsertdialog tableinsertcolafter tableinsertcolbefore tableinsertrowafter tableinsertrowbefore tablemergecells tablepasterowafter tablepasterowbefore tableprops tablerowprops tablesplitcells tableclass tablecellclass tablecellvalign tablecellborderwidth tablecellborderstyle tablecaption tablecellbackgroundcolor tablecellbordercolor tablerowheader tablecolheader | tableofcontents tableofcontentsupdate | template typography | insertfile | visualblocks visualchars | wordcount",
        //     setup: function(editor) {
        //     editor.on('change', function() {
        //         var content = tinymce.get("editor").getContent();
        //         // Set the 'name' attribute of the textarea to the content
        //         document.getElementById('editor').setAttribute('name', content);
        //     });
        // }
          });


</script>

@endsection