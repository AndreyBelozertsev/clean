@extends("moonshine::layouts.login")

@section('content')
    <div class="authentication">
        <div class="authentication-content">
            <div class="authentication-header">
                <h1 class="title">
                    Добро пожаловать в BeeSmart
                </h1>

                <p class="description">
                    Для входа введите Ваши учетные данные
                </p>
            </div>

            {!! $form() !!}

        </div>
    </div>
@endsection
