<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Đăng Ký</h1>
        {!! Form::open(['url' => 'user/store','method'=>'POST']) !!}
            <div class="form-group">
                {!! Form::label('user_name', 'Tên đăng nhập', ['']) !!}
                {!! Form::text('user_name', '', ['class'=>'form-control','placeholder'=>'Nhập tên']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('pass_word', 'Mật khẩu', ['']) !!}
                {!! Form::password('pass_word', ['class'=>'form-control','placeholder'=>'Nhập mật khẩu']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email', ['']) !!}
                {!! Form::email('email', '', ['class'=>'form-control','placeholder'=>'Nhập email']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city', 'Thành phố', ['']) !!}
                {!! Form::select('city',[0=>'Chọn',1=>'Hà Nội', 2=>'TP.HCM', 3=>'Đà nẵng'], '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('gender', 'Giới tính', ['']) !!}
                <div class="form-check">
                    {!! Form::radio('gender', 'male', 'checked', ['class'=>'form-check-input','id'=>'male']) !!}
                    {!! Form::label('male', 'Nam', ['class'=>'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('gender', 'female', '', ['class'=>'form-check-input','id'=>'female']) !!}
                    {!! Form::label('female', 'Nữ', ['class'=>'form-check-label']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('skill', 'Kỹ năng', ['']) !!}
                <div class="form-check">
                    {!! Form::checkbox('skills', 'html', '', ['class'=>'form-check-input','id'=>'html']) !!}
                    {!! Form::label('html', 'HTML', ['class'=>'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('skills', 'css', '', ['class'=>'form-check-input','id'=>'css']) !!}
                    {!! Form::label('css', 'CSS', ['class'=>'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('skills', 'javascript', '', ['class'=>'form-check-input','id'=>'javascript']) !!}
                    {!! Form::label('javascript', 'JavaScript', ['class'=>'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('skills', 'php', '', ['class'=>'form-check-input','id'=>'php']) !!}
                    {!! Form::label('php', 'PHP', ['class'=>'form-check-label']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('birthday', 'Ngày sinh', ['']) !!}
                {!! Form::date('birthday','', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('intro', 'Giới thiệu bản thân', ['']) !!}
                {!! Form::textarea('intro', '', ['class'=>'form-control','id'=>'intro']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Đăng Ký', ['class'=>'btn btn-success','name'=>'sm-reg']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</body>
</html>
