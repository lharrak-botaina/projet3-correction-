<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}
#trash-icon{
    background: unset;
    border: unset;
}
</style>
<script>
// $(document).ready(function(){
// 	$('[data-toggle="tooltip"]').tooltip();
// });
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Taks</h2></div>

                </div>
                <div class="col-sm-12 d-flex justify-content-between p-3">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('task.create') }}" class="btn btn-primary">+add task</a>
                        
                        
                        <select class="btn btn-secondary dropdown-toggle ml-2" name="filter" id="filter">
                            <option value="">select brief</option>
                            @foreach ($brief as $value)
                            <option value="{{$value->id}}">{{$value->nom_brief}}</option>
                            @endforeach
                        </select>
                        
                    </div>

                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" class="form-control" placeholder="Search&hellip;">
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>

                        <th>Name </th>
                        <th>Duree</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody  class="table1" id="table1">
                    @foreach ($tasks as $task )
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->duree }}</td>
                        <td>
                            {{-- <a  class="btn-link ml-auto">Edit Note</a> --}}
                            <a  href="{{ route('task.edit', $task->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <form action="{{ route('task.destroy', $task->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button id="trash-icon">
                                    <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>

                                </button>

                            </form>

                        </td>
                    </tr>



                    @endforeach


                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    {!! $tasks->links() !!}
                </div>
                <div>
                    <a href="/exportexcel" class="btn btn-outline-secondary" >exporter exel</a>

                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
                       impoter data
                      </button>
                 </div>



                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>

            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
    $('#filter').on('change',function(){
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{route("filter_bief")}}',
            data:{'filter':$value},
            success:function(data){
                console.log(data);
                var task=data.dataTask;
                var html='';
                if(task.length>0){
                    for(let i=0;i<task.length;i++){
                        html+='<tr>\
                        <td>'+task[i]['name']+'</td>\
                        <td>'+task[i]['description']+'</td>\
                        <td>'+task[i]['duree']+'</td>\
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
