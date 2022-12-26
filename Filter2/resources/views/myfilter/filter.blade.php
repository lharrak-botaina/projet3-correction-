<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <select name="filter" id="filter">
        <option value="">select brief</option>
        @foreach ($mybridf as $value)
        <option value="{{$value->id}}">{{$value->nombrif}}</option>
        @endforeach
    </select>
   <table>
    <th>
        
    </th>
        <tbody class="tabel1" id="table1">
            @foreach ($mytache as $value)
        <tr>
            <td>{{$value->nomtache}}</td>
            <td>{{$value->duree}}</td>
            <td>{{$value->idbrif}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        $('#filter').on('change',function(){
            $value=$(this).val();
            $.ajax({
                type:'get',
                url:'{{route("Filterb")}}',
                data:{'filter':$value},
                success:function(data){
                    console.log(data);
                    var mytache=data.tache11;
                    var html='';
                    if(mytache.length>0){
                        for(let i=0;i<mytache.length;i++){
                            html+='<tr>\
                            <td>'+mytache[i]['nomtache']+'</td>\
                            <td>'+mytache[i]['duree']+'</td>\
                            <td>'+mytache[i]['idbrif']+'</td>\
                            </tr>';
                        }
                    }
                    else{
                        html+='<tr>\
                        <td>no tache</td>\
                        </tr>';
                    }
                    $('#table1').html(html);
                }
            });
        })
        </script>
</body>
</html>