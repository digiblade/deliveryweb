<script>
async function changeSub(cat){
    var url = "{{url('/company/subcategory/')}}/"
    var res = await fetch(url+cat,{
        method:'GET',
        headers: { 'Content-Type': 'application/json' },
        
    });
    data = await res.json();
    // console.log(data[0].subcategory_name)
    let myCat = ""
    for(i in data){
        selected  = ""
        if(data[i].subcategory_id=={{$subcategory->subcategory_id}}){
            selected = "selected"
        }
       myCat += '<option value="'+data[i].subcategory_id+'" '+selected+' > '+data[i].subcategory_name+'</option>'
    }
    document.getElementById('sub').innerHTML = myCat
}
changeSub("{{$subcategory->category_id}}") 
</script>
<form action="">
    <div class="form-group">
        <label for="">Category</label>
        <select name="" id="" onchange="changeSub(this.value)">
            @foreach ($category as $item)
                <option value="{{$item->id}}" @if ($subcategory->category_id==$item->id )
                    selected
                @endif>{{$item->category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">sub Category</label>
        <select name="" id="sub">
           
        </select>
    </div>
</form>