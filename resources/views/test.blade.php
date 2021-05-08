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
       myCat += '<option value="'+data[i].subcategory_id+'"> '+data[i].subcategory_name+'</option>'
    }
    document.getElementById('sub').innerHTML = myCat
}

</script>
<form action="">
    <div class="form-group">
        <label for="">Category</label>
        <select name="" id="" onchange="changeSub(this.value)">
            @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="" id="sub">
           
        </select>
    </div>
</form>