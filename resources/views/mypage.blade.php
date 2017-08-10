@if($displayFilter)
<div class="box-body">
    <div class="row-fluid">
        <form action="" data-id="filter-form" class="ng-pristine ng-valid">
            <div class="col-lg-4">
                    {!! $select !!}
            </div>

            <div class="col-lg-3">
                <button class="btn btn-primary" style="height: 55px;">
                <i class="fa fa-search"></i>
                Фильтровать
                </button>
            </div>
        </form>
    </div>
</div>
@endif



@if (isset($org_name))
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark bold">
<!-- Название организации -->
                <h2 class="font-blue-madison sbold uppercase">{{ $org_name }}</h2>
                <span class="remark">Название организации</span>
        </div>
        <div class="actions">
        <a href="../contracts?organisation_id={{ $org_id }}" class="btn dark btn-sm btn-outline sbold uppercase">
<!-- Договоры -->
<!-- Ссылка на страницу с договорами -->
            <i class="fa fa-share"></i> Смотреть договоры </a>
        </div>
    </div>
    <div class="row">
    <div class="col-md-4">
<!-- Руководитель отдела -->
             <h4 class="font-blue-madison sbold uppercase"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $org_manager }}</h4>
            <span class="remark">Руководитель ИТ отдела</span>
    </div>
    <div class="col-md-4">
<!-- Учетная система -->
             <h4 class="font-blue-madison sbold uppercase"><i class="fa fa-vcard-o"></i>&nbsp;&nbsp;{{ $system }}</h4>
            <span class="remark">Учетная система</span>
    </div>
    <div class="col-md-4">
<!-- Количество сотрудников отдела -->
             <h4 class="font-blue-madison sbold uppercase"><i class="fa fa-users"></i>&nbsp;&nbsp;{{ $num_workplace }}</h4>
            <span class="remark">Сотрудников, согласно штатному расписанию</span>
        </div>
    </div>
</div>
    
   <div class="row">
    <!-- Лицензии -->
    <!-- Привязку к рабочим местам пока исключим -->
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-blue-madison uppercase">
                    Лицензии
                </div>
                @if($is_user_org_manager)
                <div class="tools">
                    <a href="../licenses" class="fa fa-pencil collapse" data-original-title="Изменить информацию" title="Изменить информацию"> </a>
                </div>
                @endif
            </div>
            <div class="table-scrollable">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th><th>Софт</th><th>Кол-во</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach( $licenses as $license )
                        <tr>
                            <td>#</td>
                            <td>{{ $license->name }}</td>
                            <td>{{ $license->quantity }} шт.</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Бюджет АСУ ТП-->
@if(!$budgets_asutp->isEmpty())
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-blue-madison uppercase">
                    Бюджет АСУ ТП
                </div>
                @if($is_user_org_manager)
                    <div class="tools">
                        <a href="../budgets" class="fa fa-pencil collapse" data-original-title="Изменить информацию" title="Изменить информацию"> </a>
                    </div>
                @endif
            </div>
            <div class="table-scrollable">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th><th>Статья расходов</th><th>Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $budgets_asutp as $budget )
                        <tr>
                            <td>#</td>
                            <td>{{ $budget->name }}</td>
                            <td>{{ $budget->value }} руб.</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endif
    </div>

    


        

    <div class="col-md-6">
 
        <!-- Бюджет -->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-blue-madison uppercase">
                    Бюджет ИТ
                </div>
                @if($is_user_org_manager)
                <div class="tools">
                    <a href="../budgets" class="fa fa-pencil collapse" data-original-title="Изменить информацию" title="Изменить информацию"> </a>
                </div>
                @endif
            </div>
            <div class="table-scrollable">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th><th>Статья расходов</th><th>Сумма</th>
                        </tr>
                    </thead>
                   
                    @foreach( $budgets as $budget )
                        <tr>
                            <td>#</td>
                            <td>{{ $budget->name }}</td>
                            <td>{{ $budget->value }} руб.</td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
    </div>
 
   
@else
<p class="m-heading-1 border-blue-madison m-bordered">Выберите организацию, чтобы увидеть отчет</p>
@endif