@extends('admin.layouts.index')

@section('tools_buttons')
{{--    <li class="m-portlet__nav-item">--}}
{{--        <a href="#" data-url="{{ route($routeCreate) }}"--}}
{{--           data-type="modal" data-modal="largeModal"--}}
{{--           class="m-portlet__nav-link m-portlet__nav-link--icon handle-click"--}}
{{--           data-container="body"--}}
{{--           data-toggle="m-tooltip"--}}
{{--           data-placement="top"--}}
{{--           title="Создать">--}}
{{--            <i class="la la-plus-circle"></i>--}}
{{--        </a>--}}
{{--    </li>--}}
@endsection

@section('table_head')
    <th>Фамилия</th>
    <th>Имя</th>
    <th>Дата рождения</th>
    <th>Класс</th>
    <th>Школа</th>
    <th>Язык</th>
    <th>Телефон</th>
    <th>Email</th>
    <th>Источник</th>
    <th>ФИО родителя / законного представителя</th>
    <th>Дата получения</th>
@endsection
