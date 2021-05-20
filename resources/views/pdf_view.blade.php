<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: DejaVu Sans;
        }
    </style>
</head>
<body>
<h4>{{ $data['firstname'] . " " . $data['lastname'] }}</h4>
<table class="table table-bordered">
    <thead>
    <tr class="table-danger">
        <td>ID</td>
        <td>ФИО учителя</td>
        <td>Наименование предмета</td>
        <td>Количество кредитов</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($data['courses'] as $course)
        <tr>
            <td>{{ $course['id'] }}</td>
            <td>{{ $course['teacher'] }}</td>
            <td>{{ $course['name'] }}</td>
            <td>{{ $course['credits'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
