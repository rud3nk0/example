<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Photo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your Photo profile") }}
        </p>

        <form action="{{ route('profile.uploadPhoto') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- <div class="form_group">
                <input class="input__file" type="file" name="photo">
            </div> -->
            <div class="form_group">
                <label for="photo" class="custom-file-upload">
                    <span>Choose a photo</span>
                </label>
                <input class="input__file" type="file" id="photo" name="photo">
            </div>
            <button class="btn" type="submit">Upload</button>
        </form>
    </header>
</section>


<style>
    .image{
        width: 190px;
        height: 150px;
        border-radius: 100%;
    }

    .btn{
        margin-top: 20px;
        width: 100px;
        height: 50px;
        background: transparent;
        border: 1px solid black;
        color: white;
        
    }
    .btn:hover{
        background: white;
        transition: ease-in-out .4s;
    }

    /* Скрываем стандартное поле input[type="file"] */
    .input__file {
        display: none;
    }

    /* Кастомная кнопка */
    .custom-file-upload {
        display: inline-block;
        background-color:rgb(31, 41, 55);  /* Зеленый фон */
        border: 1px solid black;
        color: white;  /* Белый текст */
        padding: 10px 20px;  /* Отступы */
        font-size: 16px;  /* Размер шрифта */
        border-radius: 5px;  /* Скругленные углы */
        cursor: pointer;  /* Курсор в виде руки */
        transition: background-color 0.3s ease;  /* Плавное изменение фона */
    }

    .custom-file-upload:hover {
        background-color: white;  /* Темно-зеленый при наведении */
        color: black;
    }

    .custom-file-upload span {
        font-weight: bold;  /* Сделаем текст жирным */
    }

    /* Для отображения имени выбранного файла (опционально) */
    .input__file:focus + .custom-file-upload span {
        color: #1d1d1d;
    }

    .input__file:focus {
        outline: none;  /* Убираем обводку при фокусе */
    }
</style>