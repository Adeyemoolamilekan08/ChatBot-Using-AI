
<!DOCTYPE html>
<html lang="en">
<head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        ::-webkit-scrollbar{
            width: 5px;
        }
        ::-webkit-scrollbar-track{
            background: #13254c;
        }
        ::-webkit-scrollbar-thumb{
            background: #061128;
        }
    </style>
</head>
<body style="background:#05113b;">
    <div>
        <div class="container-fluid m-0 d-flex p-2">
<div class="pl-2" style="width:40px;height:50px;font-size:180%;">
<i class="fa fa-angle-double-left text-white mt-2"></i>
</div>
<div style="width:50px;height:50px;">
<img src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png?f=webp&w=256" height="100%" width="100%" style="border-radius:50%;">
</div>
<div class="text-white font-weight-bold ml-2 mt-2">
    ChatBot
</div>
        </div>
        <div style="background:#061128;height:2px;"></div>
        <div id="content-box" class="container-fluid p-2" style="height: calc(100vh - 130px); overflow-y:scroll;">
    
{{-- doing --}}

    
    </div> 
        <div class="container-fluid w-100 px-3 d-flex" style="background: #131f45;height:62px;">
          <div class="mr-2 pl-2" style="background: #ffffff1c;width:calc(100% - 45px);border-radius:5px;">
        <input type="text" class="text-white" name="input" id="input" style="background:none;width:100%;height:100%;border:0;outline:none ">
        </div>
         <div id="button-submit" class="button-submit" style="background: #4acfee;height:100%;width:50px;border-radius:5px;">
        <i class="fa fa-paper-plain text-white" aria-hidden="true" style="line-height: 45px;"></i>
        </div>
        </div>
    </div>
    
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

$('#button-submit').on('click', function(){
$value = $('#input').val();
$('#content-box').append(`<div class="mb-2">
            <div class="float-right px-3 py-2" style="width: 270px; background: #4acfee;border-radius: 10px;float: right;font-size: 85%;">
            `+$value+`
            </div>
            <div style="clear: both; "></div>
        </div>`);


        $.ajax({
            type: 'post',
            url: '{{url('send')}}',
            data: {
               'input': $value
            },
            success: function(data){
                $('#content-box').append(`<div class="d-flex mb-2">
        <div class="mr-2" style="width:45px; height:45px;">
            <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png?f=webp&w=256" height="100%" width="100%" style="border-radius:50%;">
        </div>
        <div class="text-white px-3 py-2" style="width:270px; background:#13254b;border-radius:10px; font-size:85%;">
           `+data+`
        </div>
        </div>`)
        $value = $('#input').val('');
            }
        })
})
</script>