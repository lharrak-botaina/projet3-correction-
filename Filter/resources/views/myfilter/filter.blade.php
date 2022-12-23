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
        <tbody class="tabel1">
            @foreach ($mytache as $value)
        <tr>
            <td>{{$value->nomtache}}</td>
            <td>{{$value->duree}}</td>
            <td>{{$value->idbrif}}</td>
        </tr>
            @endforeach
        </tbody>
        <tbody id='Content' class="tabel2"></tbody>
    </table>
    <script type="text/javascript">
        $('#filter').on('change',function(){
            $value=$(this).val();
            if($value){
                $('.tabel1').hide();
                $('.tabel2').show();
            }
            else{
                $('.tabel1').show();
                $('.tabel2').hide();
            }
            $.ajax({
                type:'get',
                url:'{{URL::to("Filterb")}}',
                data:{'filter':$value},
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
        </script>
</body>
</html>