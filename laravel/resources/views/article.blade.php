
<form method='post' action='article'
      enctype='multipart/form-data'
      class='form-label'>

    @csrf

    <input name='add_article' type='hidden' value=''>
    Заголовок<br>
    <input type='text' name='title'
           value= ><br>
Текст<br>
    <textarea name='text' rows='4' cols='100'></textarea><br>
Выберите тэги:<br>
    <input type='checkbox' id='tags' name='4' >политика<br><input type='checkbox' id='tags' name='1' >свежее<br><input type='checkbox' id='tags' name='2' >смешное<br><input type='checkbox' id='tags' name='3' >спорт<br>

    <input type='submit' value='Добавить статью' class='btn btn-success'>
</form>

@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>

    </div>
@endif
