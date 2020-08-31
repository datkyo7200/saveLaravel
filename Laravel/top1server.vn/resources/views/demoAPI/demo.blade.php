<form action="{{url('demoAPI')}}" method="POST">
    @csrf
    <label for="name"> Họ Tên: </label>
    <input type="text" name="name" id="name">
    <br>
    <br>
    <label for="mssv">Mã Sinh Viên: </label>
    <input type="text" name="mssv" id="mssv">
    <br>
    <br>
    <label for="age"> Tuổi: </label>
    <input type="text" name="age" id="age">
    <br>
    <br>
    <input type="submit" value="Click me" name="input_submit">

</form>