<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>My Page</title>
</head>
<body>


<!-- Название организации -->
    <p>Название организации: <strong>{{ $org->name }}</strong></p>

<!-- Руководитель отдела -->
    <p>Руководитель ИТ отдела: <strong>{{ App\User::find($org->user_id)->name }}</strong></p>

<!-- Учетная система -->
    <p>Учетная система: <strong>{{  App\System::find($org->system_id)->name }}</strong></p>

<!-- Количество сотрудников отдела -->
    <p>Сотрудников, согласно штатному расписанию: <strong>{{ $org->num_workplace}}</strong></p>

<!-- Бюджет ИТ -->
    <p>Бюджет ИТ:
        <ul>
            @foreach( App\Budget::join('catalogs', 'budgets.catalog_item_id', '=', 'catalogs.id')->where('organisation_id','=',$org->id)->get() as $budget_section)
                <li>{{ $budget_section->name }} - <strong>{{ $budget_section->value }} </strong>руб.</li>
            @endforeach
        </ul>
    </p>

<!-- Договоры -->
<!-- Ссылка на страницу с договорами -->

<!-- Лицензии -->
<!-- Привязку к рабочим местам пока исключим -->
    <p>Лицензии:
        <ul>
            @foreach( App\License::join('catalog_items', 'licenses.catalog_item_id', '=', 'catalog_items.id')->where('organisation_id','=',$org->id)->get() as $budget_section)
                <li>{{ $budget_section->name }} - <strong>{{ $budget_section->quantity }} </strong>шт.</li>
            @endforeach
        </ul>
    </p>











</body>
</html>